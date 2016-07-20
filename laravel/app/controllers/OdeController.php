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
            $odes['responsable'] = Input::get('responsable');
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
            $ode['responsable'] = Input::get('responsable');
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

	public function postAgregar()
	{
		if ( Request::ajax() )
		{
			$regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
			$required='required';
			$reglas = array(
				'nombre' => $required.'|'.$regex,
				'departamento_id' => $required,
				'provincia_id' => $required,
				'distrito_id' => $required,
				'direccion' => $required,
				'telefono' => $required,
				'email' => 'required|email'
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

			$oOde = new Ode;
			$oOde['nombre'] = Input::get('nombre');
            $oOde['responsable'] = Input::get('responsable');
			$oOde['departamento_id'] = Input::get('departamento_id');
			$oOde['provincia_id'] = Input::get('provincia_id');
			$oOde['distrito_id'] = Input::get('distrito_id');
			$oOde['direccion'] = Input::get('direccion');
			$oOde['telefono'] = Input::get('telefono');
			$oOde['email'] = Input::get('email');
			$oOde['estado'] = Input::get('estado');
			$oOde['usuario_created_at'] = Auth::user()->id;
			$oOde->save();
			$nIdOde = $oOde->id;

			if(Input::has('accion'))
			{
				$aAccion = Input::get('accion');
				$nIdUser = Auth::user()->id;
				foreach ($aAccion as $nKey => $mVal) 
				{
					if($aAccion[$nKey] == "I")
					{
						$nOdeDistritoId = Input::get('ode_distrito_id.'.$nKey);
						OdeDistrito::getEstadodetalle($nIdUser, $nOdeDistritoId);
						$oOdeDistrito = new OdeDistrito;
						$oOdeDistrito['ode_id'] = $nIdOde;
						$oOdeDistrito['distrito_id'] = $nOdeDistritoId;
						$oOdeDistrito['año'] = date("Y");
						$oOdeDistrito['estado'] = 1;
						$oOdeDistrito['usuario_created_at'] = $nIdUser;
						$oOdeDistrito->save();
					}
				}
			}

			return Response::json(
				array(
				'rst'=>1,
				'msj'=>'Registro actualizado correctamente ',
				)
			);

		}
	}

	public function postActualizar()
	{
		if ( Request::ajax() )
		{
			if(Input::has('id'))
			{
				$regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
				$required='required';
				$reglas = array(
					'nombre' => $required.'|'.$regex,
					'departamento_id' => $required,
					'provincia_id' => $required,
					'distrito_id' => $required,
					'direccion' => $required,
					'telefono' => $required,
					'email' => 'required|email'
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

				$nIdOde = Input::get('id');
				$oOde = Ode::find($nIdOde);
				$oOde['nombre'] = Input::get('nombre');
				$oOde['responsable'] = Input::get('responsable');
                $oOde['departamento_id'] = Input::get('departamento_id');
				$oOde['provincia_id'] = Input::get('provincia_id');
				$oOde['distrito_id'] = Input::get('distrito_id');
				$oOde['direccion'] = Input::get('direccion');
				$oOde['telefono'] = Input::get('telefono');
				$oOde['email'] = Input::get('email');
				$oOde['estado'] = Input::get('estado');
				$oOde['usuario_created_at'] = Auth::user()->id;
				$oOde->save();

				$bEstado = Ode::getEstadodetalle($nIdOde);
				if(Input::has('accion'))
				{
					$aAccion = Input::get('accion');
					$nIdUser = Auth::user()->id;
					foreach ($aAccion as $nKey => $mVal) 
					{
						$nOdeDistritoId = Input::get('ode_distrito_id.'.$nKey);
						OdeDistrito::getEstadodetalle($nIdUser, $nOdeDistritoId);
						if($aAccion[$nKey] == "I")
						{
							$oOdeDistrito = new OdeDistrito;
							$oOdeDistrito['ode_id'] = $nIdOde;
							$oOdeDistrito['distrito_id'] = $nOdeDistritoId;
							$oOdeDistrito['año'] = date("Y");
							$oOdeDistrito['estado'] = 1;
							$oOdeDistrito['usuario_created_at'] = $nIdUser;
							$oOdeDistrito->save();
						} else if($aAccion[$nKey] == "U")
						{
							$oOdeDistrito = OdeDistrito::find(Input::get('id_detalle.'.$nKey));
							$oOdeDistrito['ode_id'] = $nIdOde;
							$oOdeDistrito['distrito_id'] = $nOdeDistritoId;
							$oOdeDistrito['año'] = date("Y");
							$oOdeDistrito['estado'] = 1;
							$oOdeDistrito['usuario_updated_at'] = $nIdUser;
							$oOdeDistrito->save();
						}
					}
				}
			}
			return Response::json(
				array(
				'rst'=>1,
				'msj'=>'Registro actualizado correctamente ',
				)
			);

		}
	}


}
