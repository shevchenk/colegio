<?php
class VisitaController extends BaseController
{
    public function postCargar()
    {
        if ( Request::ajax() ) {
            $array=array();
            $array['where']='';$array['usuario']=Auth::user()->id;
            $array['limit']='';$array['order']='';

            if( Input::has("colegio") ){
                $array['where'].=" AND c.nombre LIKE '%".Input::get("colegio")."%' ";
            }

            if( Input::has("fecha_visita") ){
                $array['where'].=" AND v.fecha_visita='".Input::get("fecha_visita")."' ";
            }

            if( Input::has("ode") ){
                $array['where'].=" AND o.nombre LIKE '%".Input::get("ode")."%' ";
            }

            if( Input::has("persona") ){
                $array['where'].=" AND CONCAT(pv.paterno,' ',pv.materno,', ',pv.nombre) LIKE '%".Input::get("persona")."%' ";
            }

            if( Input::has("personac") ){
                $array['where'].=" AND CONCAT(pc.paterno,' ',pc.materno,', ',pc.nombre) LIKE '%".Input::get("personac")."%' ";
            }

            if( Input::has("nro_tel") ){
                $array['where'].=" AND v.nro_tel LIKE '%".Input::get("nro_tel")."%' ";
            }

            if (Input::has('draw')) {
                if (Input::has('order')) {
                    $inorder=Input::get('order');
                    $incolumns=Input::get('columns');
                    $array['order']=  ' ORDER BY '.
                                      $incolumns[ $inorder[0]['column'] ]['name'].' '.
                                      $inorder[0]['dir'];
                }

                $array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
                $retorno["draw"]=Input::get('draw');
            }

            $cant  = Visita::getCargarCount( $array );
            $aData = Visita::getCargar( $array );

            $aParametro['rst'] = 1;
            $aParametro["recordsTotal"]=$cant;
            $aParametro["recordsFiltered"]=$cant;
            $aParametro['data'] = $aData;
            $aParametro['msj'] = "No hay visitas programadas aún";
            return Response::json($aParametro);
        }
    }

    public function postCrear()
    {
        if ( Request::ajax() ) {
            DB::beginTransaction();
            $visita = new Visita;
            $visita['colegio_id'] = Input::get('colegio_id');
            $visita['fecha_visita'] = Input::get('fecha_visita');
            $visita['persona_id'] = Input::get('persona_id');
            $visita['personac_id'] = Input::get('personac_id');
            $visita['nro_tel'] = Input::get('nro_tel');
            $visita['usuario_created_at'] = Auth::user()->id;
            $visita->save();

            $colegioDetalle= Input::get('colegio_detalle');
            $colegioDetalleTa= Input::get('colegio_detalle_ta');
            for ($i=0; $i < count($colegioDetalle); $i++) { 
                $visitaDetalle=new VisitaDetalle;
                $visitaDetalle['visita_id']=$visita->id;
                $visitaDetalle['colegio_detalle_id']=$colegioDetalle[$i];
                $visitaDetalle['alumnos_total']=$colegioDetalleTa[$i];
                $visitaDetalle['usuario_created_at'] = Auth::user()->id;
                $visitaDetalle->save();
            }
            //DB::rollback();

            DB::commit();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                )
            );
        }
    }

    public function postCargardetalle()
    {
        if ( Request::ajax() ) {
            $array=array();
            $array['where']='';
            if( Input::has("visita_id") ){
                $array['where']=" AND vd.visita_id=".Input::get("visita_id")." ";
            }

            $aData=VisitaDetalle::Cargar( $array );
            $aParametro['rst'] = 1;
            $aParametro['data'] = $aData;
            $aParametro['msj'] = "No hay visitas programadas aún";
            return Response::json($aParametro);
        }
    }

    public function postCargaralumno()
    {
        if ( Request::ajax() ) {
            $array=array();
            $array['where']='';
            if( Input::has("visita_detalle_id") ){
                $array['where']=" AND a.visita_detalle_id=".Input::get("visita_detalle_id")." ";
            }

            $aData=Alumno::Cargar( $array );
            $aParametro['rst'] = 1;
            $aParametro['data'] = $aData;
            $aParametro['msj'] = "No hay alumnos aún";
            return Response::json($aParametro);
        }
    }

    public function postCargaralumnodetalle()
    {
        if ( Request::ajax() ) {
            $array=array();
            $array['where']='';
            if( Input::has("alumno_id") ){
                $array['where']=" AND ad.alumno_id=".Input::get("alumno_id")." ";
            }

            $aData=Alumno::CargarDetalle( $array );
            $aParametro['rst'] = 1;
            $aParametro['data'] = $aData;
            $aParametro['msj'] = "No hay detalle aún";
            return Response::json($aParametro);
        }
    }
}
?>
