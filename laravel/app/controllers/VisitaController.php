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
            $visita['tiempo_programado'] = Input::get('tiempo_programado');
            /******************Persona Contacto********************************/
            $visita['personac'] = Input::get('personac');
            $visita['personacr'] = Input::get('personacr');
            /******************************************************************/
            /******************Trabajador Visitará*****************************/
            if( Input::has('persona_id') ){
                $visita['persona_id'] = Input::get('persona_id');
            }
            /******************************************************************/
            /******************Trabajador Telecita*****************************/
            $visita['personat_id'] = Input::get('personat_id');
            $visita['fechat'] = Input::get('fechat');
            $visita['observacion'] = Input::get('observacion');
            /******************************************************************/
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

	public function postCargardistribucion()
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
				$array['where'].=" AND a.tipo_colegio LIKE '%".Input::get("tipo_colegio")."%' ";
			}
			if( Input::has("colegio") ){
				$array['where'].=" AND a.colegio LIKE '%".Input::get("colegio")."%' ";
			}
			if( Input::has("telefono") ){
				$array['where'].=" AND a.telefono LIKE '%".Input::get("telefono")."%' ";
			}
			if( Input::has("distrito") ){
				$array['where'].=" AND a.distrito LIKE '%".Input::get("distrito")."%' ";
			}
			if( Input::has("fecha_visita") ){
				$array['where'].=" AND a.fecha_visita LIKE '%".Input::get("fecha_visita")."%' ";
			}
			if( Input::has("hora") ){
				$array['where'].=" AND a.hora LIKE '%".Input::get("hora")."%' ";
			}
			if( Input::has("tiempo") ){
				$array['where'].=" AND a.tiempo LIKE '%".Input::get("tiempo")."%' ";
			}
			if( Input::has("sec_1") ){
				$array['where'].=" AND a.sec_1='".Input::get("sec_1")."' ";
			}
			if( Input::has("sec_2") ){
				$array['where'].=" AND a.sec_2='".Input::get("sec_2")."' ";
			}
			if( Input::has("sec_3") ){
				$array['where'].=" AND a.sec_3='".Input::get("sec_3")."' ";
			}
			if( Input::has("sec_4") ){
				$array['where'].=" AND a.sec_4='".Input::get("sec_4")."' ";
			}
			if( Input::has("sec_5") ){
				$array['where'].=" AND a.sec_5='".Input::get("sec_5")."' ";
			}
			if( Input::has("total_sec") ){
				$array['where'].=" AND a.total_sec='".Input::get("total_sec")."' ";
			}
			if( Input::has("dat_1") ){
				$array['where'].=" AND a.dat_1='".Input::get("dat_1")."' ";
			}
			if( Input::has("dat_2") ){
				$array['where'].=" AND a.dat_2='".Input::get("dat_2")."' ";
			}
			if( Input::has("dat_3") ){
				$array['where'].=" AND a.dat_3='".Input::get("dat_3")."' ";
			}
			if( Input::has("dat_4") ){
				$array['where'].=" AND a.dat_4='".Input::get("dat_4")."' ";
			}
			if( Input::has("dat_5") ){
				$array['where'].=" AND a.dat_5='".Input::get("dat_5")."' ";
			}
			if( Input::has("total_dat") ){
				$array['where'].=" AND a.total_dat='".Input::get("total_dat")."' ";
			}
			if( Input::has("observacion") ){
				$array['where'].=" AND a.observacion LIKE '%".Input::get("observacion")."%' ";
			}
			if( Input::has("promotor") ){
				$array['where'].=" AND a.promotor LIKE '%".Input::get("promotor")."' ";
			}
			if( Input::has("realizada") ){
				$array['where'].=" AND a.realizada='".Input::get("realizada")."' ";
			}
			if( Input::has("pendiente") ){
				$array['where'].=" AND a.pendiente='".Input::get("pendiente")."' ";
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

			$cant  = Visita::getCargaDistribucionCount( $array );
			$aData = Visita::getCargaDistribucion( $array );

			$aParametro['rst'] = 1;
			$aParametro["recordsTotal"]=$cant;
			$aParametro["recordsFiltered"]=$cant;
			$aParametro['data'] = $aData;
			$aParametro['msj'] = "No hay visitas programadas aún";
			return Response::json($aParametro);
		}
	}

    public function postActualizartrabajador()
    {
        if ( Request::ajax() ) {
            DB::beginTransaction();
            $id=Input::get('id');
            $persona_id=Input::get('persona_id');
            $visita = Visita::find($id);
            $visita['persona_id'] = $persona_id;
            $visita['usuario_updated_at'] = Auth::user()->id;
            $visita->save();
            DB::commit();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                )
            );
        }
    }

    public function postActualizarcontactop()
    {
        if ( Request::ajax() ) {
            DB::beginTransaction();
            $id=Input::get('id');
            $visita = Visita::find($id);
            $visita[Input::get('campo')] = Input::get('valor');
            $visita['usuario_updated_at'] = Auth::user()->id;
            $visita->save();
            DB::commit();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                )
            );
        }
    }

    public function postActualizaralumnor()
    {
        if ( Request::ajax() ) {
            DB::beginTransaction();
            $id=Input::get('id');
            $visita = VisitaDetalle::find($id);
            $visita[Input::get('campo')] = Input::get('valor');
            $visita['usuario_updated_at'] = Auth::user()->id;
            $visita->save();
            DB::commit();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                )
            );
        }
    }

    public function postCargarcontactos()
    {
        if ( Request::ajax() ) {
            $aData=Visita::find( Input::get('visita_id') );
            $aParametro['rst'] = 1;
            $aParametro['data'] = $aData;
            $aParametro['msj'] = "No hay detalle aún";
            return Response::json($aParametro);
        }
    }
}
?>
