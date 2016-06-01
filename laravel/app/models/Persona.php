<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Persona extends Base implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "personas";
    
    public static $where =[
                        'id', 'paterno','materno','nombre','email','dni',
                        'password','fecha_nacimiento','sexo', 'estado'
                        ];
    public static $selec =[
                        'id', 'paterno','materno','nombre','email','dni',
                        'password','fecha_nacimiento','sexo', 'estado'
                        ];
    /**
     * Cargos relationship
     */
    public function cargos()
    {
        return $this->belongsToMany('Cargo');
    }

    public static function getCargarp()
    {
        $sql="  SELECT p.id ,a.id area_id,r.id rol_id,p.dni,
                    p.paterno,p.materno,p.nombre,a.nombre area,r.nombre rol
                FROM personas p
                INNER JOIN areas a ON a.id=p.area_id 
                INNER JOIN roles r ON r.id=p.rol_id 
                WHERE p.estado=1
                AND p.area_id='".Input::get('area_id')."'";
        $personas = DB::select($sql);

        return $personas;
    }

    public static function getPersonas()
    {
        $sql="  SELECT CONCAT(p.id,'-',a.id) id,
                    p.paterno,p.materno,p.nombre nombres,p.dni,a.nombre area,
                    CONCAT(p.paterno,' ',substr(p.materno,1,4),'. ',substr(p.nombre,1,7),'. |',a.nombre) nombre
                FROM personas p
                INNER JOIN areas a ON a.id=p.area_id 
                WHERE p.estado=1
                GROUP BY p.id,a.id
                ORDER BY p.paterno,p.materno,p.nombre";

        $personas= DB::select($sql);
        return $personas;
    }

    public static function getApellidoNombre()
    {
        $sql="  SELECT p.id id,
                    CONCAT_WS(' ',p.paterno,p.materno,p.nombre) nombre,p.dni
                FROM personas p
                WHERE p.estado=1
                ORDER BY p.paterno,p.materno,p.nombre";

        $personas= DB::select($sql);
        return $personas;
    }

    public static function get(array $data =array()){

        //recorrer la consulta
        $personas = parent::get( $data);

        foreach ($personas as $key => $value) {
            if ($key=='password') {
                $personas[$key]['password']='';
            }
        }

        return $personas;
    }

    public static function getCargos($personaId)
    {
        //subconsulta
        $r = DB::table('cargo_persona')
                ->select(
                    "cargo_id as id"
                )
                ->whereRaw("persona_id=$personaId AND estado=1")
                ->get();

        return $r;
    }

}


