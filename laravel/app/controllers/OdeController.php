<?php

class OdeController extends \BaseController
{

    public function postCargar()
    {
        if ( Request::ajax() ) {
            $odes = Ode::get(Input::all());
            return Response::json(
                array(
                'rst'=>1,
                'datos'=>$odes
                )
            );
        }
    }

    public function postListar()
    {
        if ( Request::ajax() ) {
            $r = Ode::Listar();
            return Response::json(
                array(
                'rst'=>1,
                'datos'=>$r
                )
            );
        }
    }

	public function postGrilla()
	{
		if ( Request::ajax() ) {
			$aData = Ode::getGrilla();
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
            );

            $mensaje= array(
                'required'    => ':attribute Es requerido',
                'regex'        => ':attribute Solo debe ser Texto',
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

            $odes = new Ode;
            $odes['nombre'] = Input::get('nombre');
            $odes['estado'] = Input::get('estado');
            $odes['usuario_created_at'] = Auth::user()->id;
            $odes->save();

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
            );

            $mensaje= array(
                'required'    => ':attribute Es requerido',
                'regex'        => ':attribute Solo debe ser Texto',
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
            $odeId = Input::get('id');
            $ode = Ode::find($odeId);
            $ode['nombre'] = Input::get('nombre');
            $ode['estado'] = Input::get('estado');
            $ode['usuario_updated_at'] = Auth::user()->id;
            $ode->save();
            
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

            $ode = Ode::find(Input::get('id'));
            $ode->estado = Input::get('estado');
            $ode->usuario_updated_at = Auth::user()->id;
            $ode->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );

        }
    }

	public function postListardistrito()
	{
		if ( Request::ajax() ) {
			$nIdPadre = Input::get('id_padre');
			$aData = Ode::getListardistrito($nIdPadre);
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

}
