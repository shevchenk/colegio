<?php
class SeminarioController extends BaseController
{

    public function postCargar()
    {
        if ( Request::ajax() )
        {
            $array=array();
            $array['where']=' WHERE 1=1 ';
            $array['usuario']=Auth::user()->id;
            $array['limit']='';
            $array['order']='';

            if( Input::has("ode") ){
                $array['where'].=" AND a.ode LIKE '%".Input::get("ode")."%' ";
            }
            if( Input::has("tipo_colegio") ){
                $array['where'].=" AND ct.nombre LIKE '%".Input::get("tipo_colegio")."%' ";
            }
            if( Input::has("colegio") ){
                $array['where'].=" AND co.nombre LIKE '%".Input::get("colegio")."%' ";
            }
            if( Input::has("telefono") ){
                $array['where'].=" AND co.telefono LIKE '%".Input::get("telefono")."%' ";
            }
            if( Input::has("direccion") ){
                $array['where'].=" AND co.direccion LIKE '%".Input::get("direccion")."%' ";
            }
            if( Input::has("distrito") ){
                $array['where'].=" AND d.nombre LIKE '%".Input::get("distrito")."%' ";
            }
            if( Input::has("persona") ){
                $array['where'].=" AND cs.persona LIKE '%".Input::get("persona")."' ";
            }
            if( Input::has("cargo") ){
                $array['where'].=" AND cs.cargo LIKE '%".Input::get("cargo")."' ";
            }
            if( Input::has("celular") ){
                $array['where'].=" AND cs.celular LIKE '%".Input::get("celular")."' ";
            }
            if( Input::has("horario") ){
                $array['where'].=" AND cs.horario LIKE '%".Input::get("horario")."' ";
            }

            if (Input::has('draw'))
            {
                if (Input::has('order'))
                {
                    $inorder=Input::get('order');
                    $incolumns=Input::get('columns');
                    $array['order']=  ' ORDER BY '.$incolumns[ $inorder[0]['column'] ]['name'].' '.$inorder[0]['dir'];
                }

                $array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
                $retorno["draw"]=Input::get('draw');
            }

            $cant  = Seminario::getCargarCount( $array );
            $aData = Seminario::getCargar( $array );

            $aParametro['rst'] = 1;
            $aParametro["recordsTotal"]=$cant;
            $aParametro["recordsFiltered"]=$cant;
            $aParametro['data'] = $aData;
            $aParametro['msj'] = "No hay visitas programadas aún";
            return Response::json($aParametro);
        }
    }
}
?>
