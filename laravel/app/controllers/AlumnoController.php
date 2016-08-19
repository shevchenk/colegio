<?php

class AlumnoController extends \BaseController
{

    public function postCrear()
    {
        if ( Request::ajax() )
        {
            $visita_detalle_id=Input::get('visita_detalle_id');
            $persona_id=Input::get('persona_id');
            $alumno=new Alumno;
            $alumno->persona_id=$persona_id;
            $alumno->convenio=0;
            $alumno->año=date("Y");
            $alumno->visita_detalle_id=$visita_detalle_id;
            $alumno->usuario_created_at=Auth::user()->id;
            $alumno->save();

            $aParametro['rst'] = 1;
            $aParametro['id'] = $alumno->id;
            $aParametro['msj'] = "Alumno correctamente registrado";
            return Response::json($aParametro);
        }
    }

    public function postCreardetalle()
    {
        if ( Request::ajax() )
        {
            // Falta validar q no se repita
            $alumnoDetalle=new AlumnoDetalle;
            $alumnoDetalle->alumno_id=Input::get('alumno_id');
            $alumnoDetalle->carrera_id=Input::get('carrera');
            $alumnoDetalle->monto=Input::get('monto');
            $alumnoDetalle->usuario_created_at=Auth::user()->id;
            $alumnoDetalle->save();

            $aParametro['rst'] = 1;
            $aParametro['id'] = $alumnoDetalle->id;
            $aParametro['msj'] = "Detalle del Alumno correctamente registrado";
            return Response::json($aParametro);
        }
    }

    public function postEliminar()
    {
        if ( Request::ajax() )
        {
            $alumno_id=Input::get('alumno_id');
            $alumno=Alumno::find($alumno_id);
            $alumno->estado=0;
            $alumno->usuario_updated_at=Auth::user()->id;
            $alumno->save();

            $aParametro['rst'] = 1;
            $aParametro['msj'] = "Alumno correctamente eliminado";
            return Response::json($aParametro);
        }
    }

    public function postEliminardetalle()
    {
        if ( Request::ajax() )
        {
            $alumno_detalle_id=Input::get('alumno_detalle_id');
            $alumnoDetalle=AlumnoDetalle::find($alumno_detalle_id);
            $alumnoDetalle->estado=0;
            $alumnoDetalle->usuario_updated_at=Auth::user()->id;
            $alumnoDetalle->save();

            $aParametro['rst'] = 1;
            $aParametro['msj'] = "Alumno correctamente eliminado";
            return Response::json($aParametro);
        }
    }

    public function postConvenio()
    {
        if ( Request::ajax() )
        {
            $alumno_id=Input::get('alumno_id');
            $convenio=Input::get('convenio');
            $alumno=Alumno::find($alumno_id);
            $alumno->convenio=$convenio;
            $alumno->usuario_updated_at=Auth::user()->id;
            $alumno->save();

            $aParametro['rst'] = 1;
            $aParametro['msj'] = "Convenio actualizado";
            return Response::json($aParametro);
        }
    }

}
