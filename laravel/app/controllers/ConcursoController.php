<?php

class ConcursoController extends \BaseController
{
    public function getSedes()
    {
        $sql="  SELECT id,nombre
                FROM concurso_sedes";
        $r=DB::select($sql);
        $rst['sedes']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getCarreras()
    {
        $sedes=implode(",",Input::get('sedes'));
        $sql="  SELECT csc.id,cc.id carrera_id,cc.nombre,cs.nombre area
                FROM concurso_carreras cc 
                INNER JOIN concurso_sedes_carreras csc ON csc.carrera_id=cc.id
                INNER JOIN concurso_sedes cs ON cs.id=csc.sede_id
                WHERE csc.sede_id IN (".$sedes.")
                ORDER BY area,cc.nombre";
        $r=DB::select($sql);
        $rst['carreras']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getCursos()
    {
        $carreras=implode(",",Input::get('carreras'));
        $sql="  SELECT ccc.id,cc.id curso_id,cc.nombre,cca.nombre carrera
                FROM concurso_cursos cc 
                INNER JOIN concurso_cursos_carreras ccc ON ccc.curso_id=cc.id
                INNER JOIN concurso_carreras cca ON cca.id=ccc.carrera_id
                WHERE ccc.carrera_id IN (".$carreras.")
                ORDER BY carrera,cc.nombre";
        $r=DB::select($sql);
        $rst['cursos']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getDepartamentos()
    {
        $sql="  SELECT id,nombre
                FROM departamentos";
        $r=DB::select($sql);
        $rst['departamentos']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getProvincias()
    {
        $departamento=Input::get('departamentos');
        $sql="  SELECT id,nombre
                FROM provincias
                WHERE departamento_id IN (".$departamento.")";
        $r=DB::select($sql);
        $rst['provincias']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function getDistritos()
    {
        $provincia=Input::get('provincias');
        $sql="  SELECT id,nombre
                FROM distritos
                WHERE provincia_id IN (".$provincia.")";
        $r=DB::select($sql);
        $rst['distritos']=$r;
        $rst['msj']='Listado correctamente';
        return Response::json($rst); 
    }

    public function postRegistrar()
    {
        $ok=2;
        $rst['rst']='2';
        $rst['msj']='Verifique falta validar';
        if($ok==1){
            $rst['rst']='1';
            $rst['msj']='Registro realizado correctamente';
        }
        
        return Response::json($rst);
    }

}
