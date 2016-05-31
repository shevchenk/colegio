<?php

class Campana extends Base
{
    public $table = "campañas";
    public static $where =['id', 'nombre', 'estado'];
    public static $selec =['id', 'nombre', 'estado'];

    public static function Listar( $array ){
        $sql="  SELECT id,nombre
                FROM campañas
                WHERE estado=1 ".
                $array['ode'];

        $r=DB::select($sql);

        return $r;
    }

}
