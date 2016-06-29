<?php
class CarreraController extends BaseController
{
	public function postCargar()
	{
		if ( Request::ajax() ) {
			$aData = Carrera::getCargar();
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

    public function postListar()
    {
        if ( Request::ajax() ) {
            $array['where']='';
            if( Input::has('carrera_tipo_id') ){
                $array['where']=" AND c.carrera_tipo_id=".Input::get('carrera_tipo_id')." ";
            }
            $aData = Carrera::getListar($array);
            $aParametro['rst'] = 1;
            $aParametro['aData'] = $aData;
            return Response::json($aParametro);
        }
    }

	public function postListartipo()
	{
		if ( Request::ajax() ) {
			$aData = Carrera::getListartipo();
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
				'carrera' => $required.'|'.$regex
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

			$opciones = new Carrera;
			$opciones['nombre'] = Input::get('carrera');
			$opciones['carrera_tipo_id'] = Input::get('tipo_id');
			$opciones['estado'] = Input::get('estado');
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
				'carrera' => $required.'|'.$regex
			);

			$mensaje= array(
				'required' => ':attribute Es requerido',
				'regex' => ':attribute Solo debe ser Texto'
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
			$opciones = Carrera::find($opcionId);
			$opciones['nombre'] = Input::get('carrera');
			$opciones['carrera_tipo_id'] = Input::get('tipo_id');
			$opciones['estado'] = Input::get('estado');
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
			$opcion = Carrera::find(Input::get('id'));
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
