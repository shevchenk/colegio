<?php
class VisitaController extends BaseController
{
    public function postCargar()
    {
        if ( Request::ajax() ) {
            $array=array();
            $array['where']=' WHERE 1=1 ';$array['usuario']=Auth::user()->id;
            $array['limit']='';$array['order']='';

            if( Input::has("colegio") ){
                $array['where'].=" AND c.nombre LIKE '%".Input::get("colegio")."%' ";
            }

            if( Input::has("telefono") ){
                $array['where'].=" AND c.telefono LIKE '%".Input::get("telefono")."%' ";
            }

            if( Input::has("fecha_visita") ){
                $array['where'].=" AND DATE(v.fecha_visita)='".Input::get("fecha_visita")."' ";
            }

            if( Input::has("distrito") ){
                $array['where'].=" AND d.nombre LIKE '%".Input::get("distrito")."%' ";
            }

            if( Input::has("persona_id") ){
                $array['where'].=" AND CONCAT(pv.paterno,' ',pv.materno,', ',pv.nombre) LIKE '%".Input::get("persona_id")."%' ";
            }

            if( Input::has("personat_id") ){
                $array['where'].=" AND CONCAT(pt.paterno,' ',pt.materno,', ',pt.nombre) LIKE '%".Input::get("personat_id")."%' ";
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

	public function postCargarvisita()
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
			if( Input::has("contesta") ){
				$array['where'].=" AND a.contesta LIKE '%".Input::get("contesta")."%' ";
			}
			if( Input::has("recibe") ){
				$array['where'].=" AND a.recibe LIKE '%".Input::get("recibe")."%' ";
			}
			if( Input::has("direccion") ){
				$array['where'].=" AND a.direccion LIKE '%".Input::get("direccion")."%' ";
			}
			if( Input::has("localidad") ){
				$array['where'].=" AND a.localidad LIKE '%".Input::get("localidad")."%' ";
			}
			if( Input::has("referencia") ){
				$array['where'].=" AND a.referencia LIKE '%".Input::get("referencia")."%' ";
			}
			if( Input::has("distrito") ){
				$array['where'].=" AND a.distrito LIKE '%".Input::get("distrito")."%' ";
			}
			if( Input::has("ugel") ){
				$array['where'].=" AND a.ugel LIKE '%".Input::get("ugel")."%' ";
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
			if( Input::has("convenio") ){
				$array['where'].=" AND a.convenio='".Input::get("convenio")."' ";
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

			$cant  = Visita::getCargaVisitaColegioCount( $array );
			$aData = Visita::getCargaVisitaColegio( $array );

			$aParametro['rst'] = 1;
			$aParametro["recordsTotal"]=$cant;
			$aParametro["recordsFiltered"]=$cant;
			$aParametro['data'] = $aData;
			$aParametro['msj'] = "No hay visitas programadas aún";
			return Response::json($aParametro);
		}
	}

	public function postCargardata()
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
			if( Input::has("nivel_cole") ){
				$array['where'].=" AND a.nivel_cole LIKE '%".Input::get("nivel_cole")."%' ";
			}
			if( Input::has("genero") ){
				$array['where'].=" AND a.genero LIKE '%".Input::get("genero")."%' ";
			}
			if( Input::has("turno") ){
				$array['where'].=" AND a.turno LIKE '%".Input::get("turno")."%' ";
			}
			if( Input::has("director") ){
				$array['where'].=" AND a.director LIKE '%".Input::get("director")."%' ";
			}
			if( Input::has("telefono") ){
				$array['where'].=" AND a.telefono LIKE '%".Input::get("telefono")."%' ";
			}
			if( Input::has("email") ){
				$array['where'].=" AND a.email LIKE '%".Input::get("email")."%' ";
			}
			if( Input::has("direccion") ){
				$array['where'].=" AND a.direccion LIKE '%".Input::get("direccion")."%' ";
			}
			if( Input::has("localidad") ){
				$array['where'].=" AND a.localidad LIKE '%".Input::get("localidad")."%' ";
			}
			if( Input::has("referencia") ){
				$array['where'].=" AND a.referencia LIKE '%".Input::get("referencia")."%' ";
			}
			if( Input::has("distrito") ){
				$array['where'].=" AND a.distrito LIKE '%".Input::get("distrito")."%' ";
			}
			if( Input::has("provincia") ){
				$array['where'].=" AND a.provincia LIKE '%".Input::get("provincia")."%' ";
			}
			if( Input::has("departamento") ){
				$array['where'].=" AND a.departamento LIKE '%".Input::get("departamento")."%' ";
			}
			if( Input::has("ugel") ){
				$array['where'].=" AND a.ugel LIKE '%".Input::get("ugel")."%' ";
			}
			if( Input::has("contesta") ){
				$array['where'].=" AND a.contesta LIKE '%".Input::get("contesta")."%' ";
			}
			if( Input::has("recibe") ){
				$array['where'].=" AND a.recibe LIKE '%".Input::get("recibe")."%' ";
			}
			if( Input::has("tele_nombre") ){
				$array['where'].=" AND a.tele_nombre LIKE '%".Input::get("tele_nombre")."%' ";
			}
			if( Input::has("tele_fecha") ){
				$array['where'].=" AND a.tele_fecha LIKE '%".Input::get("tele_fecha")."%' ";
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
			if( Input::has("contacto") ){
				$array['where'].=" AND a.contacto='".Input::get("contacto")."' ";
			}
			if( Input::has("cargo") ){
				$array['where'].=" AND a.cargo='".Input::get("cargo")."' ";
			}
			if( Input::has("c_email") ){
				$array['where'].=" AND a.c_email='".Input::get("c_email")."' ";
			}
			if( Input::has("c_telefono") ){
				$array['where'].=" AND a.c_telefono='".Input::get("c_telefono")."' ";
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

			$cant  = Visita::getCargaDataColegioCount( $array );
			$aData = Visita::getCargaDataColegio( $array );

			$aParametro['rst'] = 1;
			$aParametro["recordsTotal"]=$cant;
			$aParametro["recordsFiltered"]=$cant;
			$aParametro['data'] = $aData;
			$aParametro['msj'] = "No hay visitas programadas aún";
			return Response::json($aParametro);
		}
	}

	public function postCargarindice()
	{
		if ( Request::ajax() )
		{
			$array=array();
			$array['where']=' WHERE 1=1 ';
			$array['usuario']=Auth::user()->id;
			$array['limit']='';
			$array['order']='';
			if( Input::has("fecha_actual") ){
				$array['fecha_actual']=Input::get("fecha_actual");
			} else {
				$array['fecha_actual']=date("Y-m-d");
			}

			if( Input::has("ode") ){
				$array['where'].=" AND c.ode LIKE '%".Input::get("ode")."%' ";
			}
			if( Input::has("nacional") ){
				$array['where'].=" AND c.nacional LIKE '%".Input::get("nacional")."%' ";
			}
			if( Input::has("particular") ){
				$array['where'].=" AND c.particular LIKE '%".Input::get("particular")."%' ";
			}
			if( Input::has("visitados") ){
				$array['where'].=" AND c.visitados LIKE '%".Input::get("visitados")."%' ";
			}
			if( Input::has("por_visitar") ){
				$array['where'].=" AND c.por_visitar LIKE '%".Input::get("por_visitar")."%' ";
			}
			if( Input::has("meta") ){
				$array['where'].=" AND c.meta LIKE '%".Input::get("meta")."%' ";
			}
			if( Input::has("inicio") ){
				$array['where'].=" AND c.inicio LIKE '%".Input::get("inicio")."%' ";
			}
			if( Input::has("termino") ){
				$array['where'].=" AND c.termino LIKE '%".Input::get("termino")."%' ";
			}
			if( Input::has("d1") ){
				$array['where'].=" AND c.d1 LIKE '%".Input::get("d1")."%' ";
			}
			if( Input::has("d2") ){
				$array['where'].=" AND c.d2 LIKE '%".Input::get("d2")."%' ";
			}
			if( Input::has("d3") ){
				$array['where'].=" AND c.d3 LIKE '%".Input::get("d3")."%' ";
			}
			if( Input::has("d4") ){
				$array['where'].=" AND c.d4 LIKE '%".Input::get("d4")."%' ";
			}
			if( Input::has("d5") ){
				$array['where'].=" AND c.d5 LIKE '%".Input::get("d5")."%' ";
			}
			if( Input::has("d6") ){
				$array['where'].=" AND c.d6 LIKE '%".Input::get("d6")."%' ";
			}
			if( Input::has("d7") ){
				$array['where'].=" AND c.d7 LIKE '%".Input::get("d7")."%' ";
			}
			if( Input::has("total_cole") ){
				$array['where'].=" AND c.total_cole LIKE '%".Input::get("total_cole")."%' ";
			}
			if( Input::has("dia_camp") ){
				$array['where'].=" AND c.dia_camp LIKE '%".Input::get("dia_camp")."%' ";
			}
			if( Input::has("dia_falta_camp") ){
				$array['where'].=" AND c.dia_falta_camp LIKE '%".Input::get("dia_falta_camp")."%' ";
			}
			if( Input::has("total_dia_camp") ){
				$array['where'].=" AND c.total_dia_camp LIKE '%".Input::get("total_dia_camp")."%' ";
			}
			if( Input::has("indice_diario") ){
				$array['where'].=" AND c.indice_diario LIKE '%".Input::get("indice_diario")."%' ";
			}
			if( Input::has("inicio_proyectado") ){
				$array['where'].=" AND c.inicio_proyectado LIKE '%".Input::get("inicio_proyectado")."%' ";
			}
			if( Input::has("total_fin_camp") ){
				$array['where'].=" AND c.total_fin_camp LIKE '%".Input::get("total_fin_camp")."%' ";
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

			$cant  = Visita::getCargaIndiceColegioCount( $array );
			$aData = Visita::getCargaIndiceColegio( $array );

			$aParametro['rst'] = 1;
			$aParametro["recordsTotal"]=$cant;
			$aParametro["recordsFiltered"]=$cant;
			$aParametro['data'] = $aData;
			$aParametro['msj'] = "No hay visitas programadas aún";
			return Response::json($aParametro);
		}
	}

	public function postCargarindicedata()
	{
		if ( Request::ajax() )
		{
			$array=array();
			$array['where']=' WHERE 1=1 ';
			$array['usuario']=Auth::user()->id;
			$array['limit']='';
			$array['order']='';
			if( Input::has("fecha_actual") ){
				$array['fecha_actual']=Input::get("fecha_actual");
			} else {
				$array['fecha_actual']=date("Y-m-d");
			}

			if( Input::has("ode") ){
				$array['where'].=" AND c.ode LIKE '%".Input::get("ode")."%' ";
			}
			if( Input::has("g1") ){
				$array['where'].=" AND c.g1 LIKE '%".Input::get("g1")."%' ";
			}
			if( Input::has("g2") ){
				$array['where'].=" AND c.g2 LIKE '%".Input::get("g2")."%' ";
			}
			if( Input::has("g3") ){
				$array['where'].=" AND c.g3 LIKE '%".Input::get("g3")."%' ";
			}
			if( Input::has("g4") ){
				$array['where'].=" AND c.g4 LIKE '%".Input::get("g4")."%' ";
			}
			if( Input::has("g5") ){
				$array['where'].=" AND c.g5 LIKE '%".Input::get("g5")."%' ";
			}
			if( Input::has("recopilada") ){
				$array['where'].=" AND c.recopilada LIKE '%".Input::get("recopilada")."%' ";
			}
			if( Input::has("por_recopilar") ){
				$array['where'].=" AND c.por_recopilar LIKE '%".Input::get("por_recopilar")."%' ";
			}
			if( Input::has("meta") ){
				$array['where'].=" AND c.meta LIKE '%".Input::get("meta")."%' ";
			}
			if( Input::has("inicio") ){
				$array['where'].=" AND c.inicio LIKE '%".Input::get("inicio")."%' ";
			}
			if( Input::has("termino") ){
				$array['where'].=" AND c.termino LIKE '%".Input::get("termino")."%' ";
			}
			if( Input::has("d1") ){
				$array['where'].=" AND c.d1 LIKE '%".Input::get("d1")."%' ";
			}
			if( Input::has("d2") ){
				$array['where'].=" AND c.d2 LIKE '%".Input::get("d2")."%' ";
			}
			if( Input::has("d3") ){
				$array['where'].=" AND c.d3 LIKE '%".Input::get("d3")."%' ";
			}
			if( Input::has("d4") ){
				$array['where'].=" AND c.d4 LIKE '%".Input::get("d4")."%' ";
			}
			if( Input::has("d5") ){
				$array['where'].=" AND c.d5 LIKE '%".Input::get("d5")."%' ";
			}
			if( Input::has("d6") ){
				$array['where'].=" AND c.d6 LIKE '%".Input::get("d6")."%' ";
			}
			if( Input::has("d7") ){
				$array['where'].=" AND c.d7 LIKE '%".Input::get("d7")."%' ";
			}
			if( Input::has("total_cole") ){
				$array['where'].=" AND c.total_cole LIKE '%".Input::get("total_cole")."%' ";
			}
			if( Input::has("dia_camp") ){
				$array['where'].=" AND c.dia_camp LIKE '%".Input::get("dia_camp")."%' ";
			}
			if( Input::has("dia_falta_camp") ){
				$array['where'].=" AND c.dia_falta_camp LIKE '%".Input::get("dia_falta_camp")."%' ";
			}
			if( Input::has("total_dia_camp") ){
				$array['where'].=" AND c.total_dia_camp LIKE '%".Input::get("total_dia_camp")."%' ";
			}
			if( Input::has("indice_diario") ){
				$array['where'].=" AND c.indice_diario LIKE '%".Input::get("indice_diario")."%' ";
			}
			if( Input::has("inicio_proyectado") ){
				$array['where'].=" AND c.inicio_proyectado LIKE '%".Input::get("inicio_proyectado")."%' ";
			}
			if( Input::has("total_fin_camp") ){
				$array['where'].=" AND c.total_fin_camp LIKE '%".Input::get("total_fin_camp")."%' ";
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

			$cant  = Visita::getCargaIndiceDataCount( $array );
			$aData = Visita::getCargaIndiceData( $array );

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
