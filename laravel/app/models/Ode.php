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

	public static function getListardistrito($nIdPadre)
	{
		$sSql = <<<EOT
			SELECT d.id, CONCAT(d.nombre, IF(o.nombre IS NULL, '', CONCAT(' - [ ',o.nombre,' ]'))) AS nombre
				, IFNULL(o.nombre, 'No') AS pintar
			FROM distritos d
				LEFT JOIN odes_distritos od ON d.id=od.distrito_id AND od.estado=1
				LEFT JOIN odes o ON od.ode_id=o.id
			WHERE d.provincia_id={$nIdPadre}
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getEstadodetalle($nIdOde)
	{
		$aParametro = array($nIdOde);
		$bData = DB::update('UPDATE odes_distritos SET estado = 0 WHERE ode_id = ?', $aParametro);
		return $bData;
	}

}
