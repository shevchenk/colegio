<?php
class Visita extends Base
{
    public $table = "visitas";

    public static function getCargarCount( $array ){
        $sSql = <<<EOT
            SELECT COUNT(v.id) cant
            FROM visitas v
            INNER JOIN colegios c ON c.id=v.colegio_id AND c.estado=1
            INNER JOIN distritos d ON d.id=c.distrito_id AND d.estado=1
            INNER JOIN odes_distritos od ON od.distrito_id=d.id AND od.estado=1
            INNER JOIN odes o ON o.id=od.ode_id AND o.estado=1
            INNER JOIN personas pt ON pt.id=v.personat_id
            LEFT JOIN personas pv ON pv.id=v.persona_id
EOT;
        $sSql.= $array['where'];
        $oData = DB::select($sSql);
        return $oData[0]->cant;
    }

    public static function getCargar($array)
    {
        $sSql = <<<EOT
            SELECT v.id, v.fecha_visita, c.nombre colegio, o.nombre ode,
            CONCAT(pv.paterno,' ',pv.materno,', ',pv.nombre) persona_id,
            CONCAT(pt.paterno,' ',pt.materno,', ',pt.nombre) personat_id,
            personac,IFNULL(pv.id,'') pvid,d.nombre distrito,c.telefono
            FROM visitas v
            INNER JOIN colegios c ON c.id=v.colegio_id AND c.estado=1
            INNER JOIN distritos d ON d.id=c.distrito_id AND d.estado=1
            INNER JOIN odes_distritos od ON od.distrito_id=d.id AND od.estado=1
            INNER JOIN odes o ON o.id=od.ode_id
            INNER JOIN personas pt ON pt.id=v.personat_id
            LEFT JOIN personas pv ON pv.id=v.persona_id
EOT;
        $sSql.= $array['where'].
                $array['limit'];
        $oData = DB::select($sSql);
        return $oData;
    }

	public static function getCargaDistribucion($aParametro)
	{
		$sSql = <<<EOT
		SELECT
			a.id, a.ode, a.tipo_colegio, a.colegio, a.telefono, a.distrito, a.fecha_visita, a.hora, a.tiempo
			, a.sec_1, a.sec_2, a.sec_3, a.sec_4, a.sec_5, (a.sec_1 + a.sec_2 + a.sec_3 + a.sec_4 + a.sec_5) AS total_sec
			, a.dat_1, a.dat_2, a.dat_3, a.dat_4, a.dat_5, (a.dat_1 + a.dat_2 + a.dat_3 + a.dat_4 + a.dat_5) AS total_dat
			, a.observacion, a.promotor, a.realizada, ((a.sec_1 + a.sec_2 + a.sec_3 + a.sec_4 + a.sec_5) - a.realizada) AS pendiente
			, a.motivo, a.direccion, a.referencia
		FROM (
			SELECT
				v.id, o.nombre AS ode, ct.nombre AS tipo_colegio, c.nombre AS colegio, c.telefono
                , c.direccion, c.referencia
				, d.nombre AS distrito, DATE(v.fecha_visita) AS fecha_visita
				, TIME(v.fecha_visita) AS hora, tiempo_programado AS tiempo
                , fn_visita_grados(v.id,1) AS sec_1, fn_visita_grados(v.id,2) AS sec_2
				, fn_visita_grados(v.id,3) AS sec_3, fn_visita_grados(v.id,4) AS sec_4
				, fn_visita_grados(v.id,5) AS sec_5, fn_visita_alumnos(v.id,1) AS dat_1
				, fn_visita_alumnos(v.id,2) AS dat_2, fn_visita_alumnos(v.id,3) AS dat_3
				, fn_visita_alumnos(v.id,4) AS dat_4, fn_visita_alumnos(v.id,5) AS dat_5
				, v.observacion, CONCAT_WS(' ', p.paterno, p.materno, p.nombre) AS promotor
				, (SELECT SUM(r_vd.alumnos_registrados) FROM visitas_detalle r_vd WHERE r_vd.visita_id=v.id) AS realizada
				, '' AS motivo
			FROM visitas v
				INNER JOIN colegios c ON v.colegio_id=c.id
				INNER JOIN odes o ON c.ode_id=o.id
				INNER JOIN colegios_tipos ct ON c.colegio_tipo_id=ct.id
				INNER JOIN distritos d ON c.distrito_id=d.id
				LEFT JOIN personas p ON v.persona_id=p.id
		) a
EOT;
		$sSql .= $aParametro['where'].$aParametro['limit'];
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getCargaDistribucionCount( $array )
	{
		$sSql = <<<EOT
		SELECT
			COUNT(a.id) AS cant
		FROM (
			SELECT
				v.id, o.nombre AS ode, ct.nombre AS tipo_colegio, c.nombre AS colegio, c.telefono
				, d.nombre AS distrito, v.fecha_visita
				, '' AS hora, '' AS tiempo, fn_visita_grados(v.id,1) AS sec_1, fn_visita_grados(v.id,2) AS sec_2
				, fn_visita_grados(v.id,3) AS sec_3, fn_visita_grados(v.id,4) AS sec_4
				, fn_visita_grados(v.id,5) AS sec_5, fn_visita_alumnos(v.id,1) AS dat_1
				, fn_visita_alumnos(v.id,2) AS dat_2, fn_visita_alumnos(v.id,3) AS dat_3
				, fn_visita_alumnos(v.id,4) AS dat_4, fn_visita_alumnos(v.id,5) AS dat_5
				, '' AS observacion, CONCAT_WS(' ', p.paterno, p.materno, p.nombre) AS promotor
				, (SELECT SUM(r_vd.alumnos_registrados) FROM visitas_detalle r_vd WHERE r_vd.visita_id=v.id) AS realizada
				, '' AS motivo
			FROM visitas v
				INNER JOIN colegios c ON v.colegio_id=c.id
				INNER JOIN odes o ON c.ode_id=o.id
				INNER JOIN colegios_tipos ct ON c.colegio_tipo_id=ct.id
				INNER JOIN distritos d ON c.distrito_id=d.id
				LEFT JOIN personas p ON v.persona_id=p.id
		) a
EOT;
		$sSql.= $array['where'];
		$oData = DB::select($sSql);
		return $oData[0]->cant;
	}

}
?>
