<?php
class ProduccionController extends BaseController
{

    public function postCargar()
    {
        if ( Request::ajax() )
        {
            $array=array();
            $array['where']='';
            $array['usuario']=Auth::user()->id;
            $array['limit']='';
            $array['order']='';
            $array['finit']='';$array['ffint']='';
            $array['fini1']='';$array['ffin1']='';
            $array['fini2']='';$array['ffin2']='';
            $array['fini3']='';$array['ffin3']='';

            if( Input::has("mes") AND Input::has("año") ){
                $año=Input::get("año");
                $mes=Input::get("mes");
                $array['finit']=date($año."-".str_pad(($mes-2),2,0,0)."-01");
                $array['ffint']=date($año."-".str_pad($mes,2,0,0)."-t");
                $array['fini1']=date($año."-".str_pad($mes,2,0,0)."-01");
                $array['ffin1']=date($año."-".str_pad($mes,2,0,0)."-t");$mes--;
                $array['fini2']=date($año."-".str_pad($mes,2,0,0)."-01");
                $array['ffin2']=date($año."-".str_pad($mes,2,0,0)."-t");$mes--;
                $array['fini3']=date($año."-".str_pad($mes,2,0,0)."-01");
                $array['ffin3']=date($año."-".str_pad($mes,2,0,0)."-t");
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

            $cant  = Produccion::getCargarCount( $array );
            $aData = Produccion::getCargar( $array );

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
