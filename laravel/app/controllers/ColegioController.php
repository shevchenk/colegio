<?php
class ColegioController extends BaseController
{
	public function postCargardetalle()
	{
		if ( Request::ajax() ) {
			$array=array();
			$array['colegio_id']='';
			if( Input::has("colegio_id") ){
				$array['colegio_id']=' WHERE c.id='.Input::get("colegio_id");
			}
			$aData = Colegio::getCargarDetalle($array);
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postCargar()
	{
		if ( Request::ajax() ) {
			ini_set('memory_limit','1024M');
			$array=array();
			$array['where']=' WHERE c.estado=1 ';
			$array['distrito']='';
			$array['ode']='';
			if( Input::has("distrito") ){
				$array['distrito']=' AND c.distrito_id='.Input::get("distrito");
			}
			elseif( Input::has("ode") ){
				$array['ode']=' AND c.ode_id='.Input::get("ode");
			}
			$aData = Colegio::getCargar($array);
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postListarcolegio()
	{
		if ( Request::ajax() ) {
			$aData = Colegio::getListarcolegio();
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postListarode()
	{
		if ( Request::ajax() ) {
			$aData = Colegio::getListarode();
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postListartipo()
	{
		if ( Request::ajax() ) {
			$aData = Colegio::getListartipo();
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postListarnivel()
	{
		if ( Request::ajax() ) {
			$aData = Colegio::getListarnivel();
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postListardepartamento()
	{
		if ( Request::ajax() ) {
			$aData = Colegio::getListardepartamento();
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postListarpersona()
	{
		if ( Request::ajax() ) {
			$aData = Colegio::getListarpersona();
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postListarprovincia()
	{
		if ( Request::ajax() ) {
			$nIdPadre = Input::get('id_padre');
			$aData = Colegio::getListarprovincia($nIdPadre);
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postListardistrito()
	{
		if ( Request::ajax() ) {
			$nIdPadre = Input::get('id_padre');
			$aData = Colegio::getListardistrito($nIdPadre);
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

	public function postCrear()
	{
		if ( Request::ajax() ) {
			$regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
			$required='required';
			$reglas = array(
				'nombre' => $required.'|'.$regex,
				'ode_id' => $required,
				'colegio_tipo_id' => $required,
				'colegio_nivel_id' => $required,
				'distrito_id' => $required,
				'direccion' => $required,
				'referencia' => $required,
			);

			$mensaje= array(
				'required' => ':attribute Es requerido',
				'regex' => ':attribute Solo debe ser Texto',
			);

			$validator = Validator::make(Input::all(), $reglas, $mensaje);

			if ( $validator->fails() ) {
				return Response::json(
					array(
					'rst'=>2,
					'msj'=>$validator->messages(),
					)
				);
			}

			$opciones = new Colegio;
			$opciones['ode_id'] = Input::get('ode_id');
			$opciones['nombre'] = Input::get('nombre');
			$opciones['colegio_tipo_id'] = Input::get('colegio_tipo_id');
			$opciones['colegio_nivel_id'] = Input::get('colegio_nivel_id');
			$opciones['distrito_id'] = Input::get('distrito_id');
			$opciones['direccion'] = Input::get('direccion');
			$opciones['referencia'] = Input::get('referencia');
			$opciones['director'] = Input::get('director');
			$opciones['telefono'] = Input::get('telefono');
			$opciones['celular'] = Input::get('celular');
			$opciones['email'] = Input::get('email');
			$opciones['estado'] = Input::get('estado');
			$opciones['ugel'] = Input::get('ugel');
			$opciones['genero'] = Input::get('genero');
			$opciones['turno'] = Input::get('turno');
			$opciones['usuario_created_at'] = Auth::user()->id;
			$opciones->save();

			return Response::json(
				array(
				'rst'=>1,
				'msj'=>'Registro realizado correctamente',
				)
			);
		}
	}

	public function postEditar()
	{
		if ( Request::ajax() ) {
			$regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
			$required='required';
			$reglas = array(
				'nombre' => $required.'|'.$regex,
				'ode_id' => $required,
				'colegio_tipo_id' => $required,
				'colegio_nivel_id' => $required,
				'distrito_id' => $required,
				'direccion' => $required,
				'referencia' => $required,
			);

			$mensaje= array(
				'required' => ':attribute Es requerido',
				'regex' => ':attribute Solo debe ser Texto',
			);

			$validator = Validator::make(Input::all(), $reglas, $mensaje);

			if ( $validator->fails() ) {
				return Response::json(
					array(
					'rst'=>2,
					'msj'=>$validator->messages(),
					)
				);
			}

			$opcionId = Input::get('id');
			$opciones = Colegio::find($opcionId);
			$opciones['ode_id'] = Input::get('ode_id');
			$opciones['nombre'] = Input::get('nombre');
			$opciones['colegio_tipo_id'] = Input::get('colegio_tipo_id');
			$opciones['colegio_nivel_id'] = Input::get('colegio_nivel_id');
			$opciones['distrito_id'] = Input::get('distrito_id');
			$opciones['direccion'] = Input::get('direccion');
			$opciones['referencia'] = Input::get('referencia');
			$opciones['director'] = Input::get('director');
			$opciones['telefono'] = Input::get('telefono');
			$opciones['celular'] = Input::get('celular');
			$opciones['email'] = Input::get('email');
			$opciones['estado'] = Input::get('estado');
			$opciones['ugel'] = Input::get('ugel');
			$opciones['genero'] = Input::get('genero');
			$opciones['turno'] = Input::get('turno');
			$opciones['usuario_updated_at'] = Auth::user()->id;
			$opciones->save();

			return Response::json(
				array(
				'rst'=>1,
				'msj'=>'Registro actualizado correctamente',
				)
			);
		}
	}

	public function postCambiarestado()
	{
		if ( Request::ajax() ) {
			$opcion = Colegio::find(Input::get('id'));
			$opcion->estado = Input::get('estado');
			$opcion->save();
			return Response::json(
				array(
				'rst'=>1,
				'msj'=>'Registro actualizado correctamente',
				)
			);

		}
	}

	public function postModificardetalle()
	{
		if ( Request::ajax() ) {

			if(Input::has('colegio_id'))
			{
				$colegio_id = Input::get('colegio_id');
				$bEstado = Colegio::getEstadodetalle($colegio_id);
				$aAccion = Input::get('accion');
				foreach ($aAccion as $nKey => $mVal) 
				{
					if($aAccion[$nKey] == "I")
					{
						$oColegioDetalle = new ColegioDetalle;
						$oColegioDetalle['colegio_id'] = $colegio_id;
						$oColegioDetalle['grado'] = Input::get('grado.'.$nKey);
						$oColegioDetalle['seccion'] = Input::get('seccion.'.$nKey);
						$oColegioDetalle['nivel'] = Input::get('nivel.'.$nKey);
						$oColegioDetalle['turno'] = Input::get('turno.'.$nKey);
						$oColegioDetalle['total_alumnos'] = Input::get('total_alumnos.'.$nKey);
						$oColegioDetalle['estado'] = 1;
						$oColegioDetalle['usuario_created_at'] = Auth::user()->id;
						$oColegioDetalle->save();
					} else if($aAccion[$nKey] == "U")
					{
						$oColegioDetalle = ColegioDetalle::find(Input::get('id.'.$nKey));
						$oColegioDetalle['colegio_id'] = $colegio_id;
						$oColegioDetalle['grado'] = Input::get('grado.'.$nKey);
						$oColegioDetalle['seccion'] = Input::get('seccion.'.$nKey);
						$oColegioDetalle['nivel'] = Input::get('nivel.'.$nKey);
						$oColegioDetalle['turno'] = Input::get('turno.'.$nKey);
						$oColegioDetalle['total_alumnos'] = Input::get('total_alumnos.'.$nKey);
						$oColegioDetalle['estado'] = 1;
						$oColegioDetalle['usuario_updated_at'] = Auth::user()->id;
						$oColegioDetalle->save();
					}
				}
			}
			return Response::json(
				array(
				'rst'=>1,
				'msj'=>'Registro actualizado correctamente',
				)
			);

		}
	}

}
?>
