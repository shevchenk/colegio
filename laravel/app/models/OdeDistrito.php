<?php

class OdeDistrito extends Base
{
    public $table = "odes_distritos";

    public static function Listar(){
        $r = DB::table('odes_distritos as od')
            ->join(
                'distritos as d',
                'd.id','=','od.distrito_id'
            )
            ->select('d.id', 'd.nombre')
            ->where('d.estado', '=', '1')
            ->where('od.estado', '=', '1')
            ->where('od.ode_id', '=', Input::get('ode'))
            ->orderBy('d.nombre')
            ->get();

        return $r;
    }

}
