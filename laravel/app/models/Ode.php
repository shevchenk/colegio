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

	public static function getGrilla()
	{
		$sSql = <<<EOT
			SELECT
				o.id, o.nombre, o.departamento_id, d.nombre AS departamento
				, o.provincia_id, p.nombre AS provincia, o.distrito_id, di.nombre AS distrito
				, o.direccion, o.telefono, o.estado
			FROM odes o
				INNER JOIN departamentos d ON o.departamento_id=d.id
				INNER JOIN provincias p ON o.provincia_id=p.id
				INNER JOIN distritos di ON o.distrito_id=di.id
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

}
