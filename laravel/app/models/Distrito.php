<?php

class Distrito extends Base
{
    public $table = "distritos";
    public static $where =['id', 'nombre', 'estado'];
    public static $selec =['id', 'nombre', 'estado'];

    public static function Listar(){
        $r = DB::table('distritos as d')
            ->join( 'zonas as z','z.id','=','d.zona_id')
            ->select('d.id', DB::raw('CONCAT(z.zona," - ",d.nombre) as nombre') )
            ->where('d.estado', '=', '1')
            ->orderBy('d.nombre')
            ->get();

        return $r;
    }

}
