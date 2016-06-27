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

	public static function getListardetalle($nIdOde)
	{
		$sSql = <<<EOT
			SELECT od.id, od.ode_id, od.distrito_id, d.nombre AS distrito
				, d.provincia_id, p.nombre AS provincia
				, p.departamento_id, de.nombre AS departamento
			FROM odes_distritos od
				INNER JOIN distritos d ON od.distrito_id=d.id
				INNER JOIN provincias p ON d.provincia_id=p.id
				INNER JOIN departamentos de ON p.departamento_id=de.id
			WHERE od.ode_id={$nIdOde} AND od.estado = 1
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getEstadodetalle($nIdUser, $nIdDistrito)
	{
		$aParametro = array($nIdUser, $nIdDistrito);
		$bData = DB::update('UPDATE odes_distritos SET estado = 0, usuario_updated_at = ? WHERE distrito_id = ?', $aParametro);
		return $bData;
	}

}
