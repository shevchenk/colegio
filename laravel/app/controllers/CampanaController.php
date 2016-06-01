<?php
class CampanaController extends \BaseController
{

    public function postCargar()
    {
        if ( Request::ajax() ) {
            $campanas = Campana::get(Input::all());
            return Response::json(
                array(
                'rst'=>1,
                'datos'=>$campanas
                )
            );

        }
    }

    public function postListar()
    {
        if ( Request::ajax() ) {
            $array=array();
            $array['ode']='';

            if( Input::has('ode') ){
                $array['ode']=Input::get('ode');
                $array['ode']=" AND ode_id=".$array['ode'];
            }

            $r = Campana::Listar($array);
            return Response::json(
                array(
                'rst'=>1,
                'datos'=>$r
                )
            );
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

            $campanas = new Campana;
            $campanas['nombre'] = Input::get('nombre');
            $campanas['estado'] = Input::get('estado');
            $campanas['usuario_created_at'] = Auth::user()->id;
            $campanas->save();

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
            $campanaId = Input::get('id');
            $campana = Campana::find($campanaId);
            $campana['nombre'] = Input::get('nombre');
            $campana['estado'] = Input::get('estado');
            $campana['usuario_updated_at'] = Auth::user()->id;
            $campana->save();
            
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

            $campana = Campana::find(Input::get('id'));
            $campana->estado = Input::get('estado');
            $campana->usuario_updated_at = Auth::user()->id;
            $campana->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );

        }
    }

}
