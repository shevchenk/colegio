<?php
class ColegioController extends BaseController
{
	public function postCargar()
	{
		if ( Request::ajax() ) {
			$aData = Colegio::getCargar();
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
				'direccion' => $required,
				'referencia' => $required,
				'telefono' => $required,
				'celular' => $required
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
			$opciones['persona_id'] = Input::get('persona_id');
			$opciones['telefono'] = Input::get('telefono');
			$opciones['celular'] = Input::get('celular');
			$opciones['estado'] = Input::get('estado');
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
				'direccion' => $required,
				'referencia' => $required,
				'telefono' => $required,
				'celular' => $required
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
			$opciones['persona_id'] = Input::get('persona_id');
			$opciones['telefono'] = Input::get('telefono');
			$opciones['celular'] = Input::get('celular');
			$opciones['estado'] = Input::get('estado');
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

}
?>
