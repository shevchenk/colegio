<?php

class Ode extends Base
{
    public $table = "odes";
    public static $where =['id', 'nombre', 'estado'];
    public static $selec =['id', 'nombre', 'estado'];

    public static function Listar(){
        $r = DB::table('odes')
            ->select('id', 'nombre')
            ->where('estado', '=', '1')
            ->orderBy('nombre')
            ->get();

        return $r;
    }

}
