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

	public static function getCargaVisitaColegio($aParametro)
	{
		$sSql = <<<EOT
		SELECT
			a.id, a.ode, a.tipo_colegio, a.colegio, a.telefono, a.contesta, a.recibe, a.direccion
			, a.localidad, a.referencia, a.distrito, a.ugel, a.fecha_visita, a.hora, a.tiempo
			, a.sec_1, a.sec_2, a.sec_3, a.sec_4, a.sec_5, (a.sec_1 + a.sec_2 + a.sec_3 + a.sec_4 + a.sec_5) AS total_sec
			, a.dat_1, a.dat_2, a.dat_3, a.dat_4, a.dat_5, (a.dat_1 + a.dat_2 + a.dat_3 + a.dat_4 + a.dat_5) AS total_dat
			, a.observacion, a.promotor, a.convenio
		FROM (
			SELECT
				v.id, o.nombre AS ode, LEFT(ct.nombre,1) AS tipo_colegio, c.nombre AS colegio, c.telefono
				, v.personac AS contesta, v.personacr AS recibe, c.direccion, '' AS localidad, c.referencia
				, d.nombre AS distrito, c.ugel, DATE(v.fecha_visita) AS fecha_visita
				, TIME(v.fecha_visita) AS hora, tiempo_programado AS tiempo
				, fn_visita_grados(v.id,1) AS sec_1, fn_visita_grados(v.id,2) AS sec_2
				, fn_visita_grados(v.id,3) AS sec_3, fn_visita_grados(v.id,4) AS sec_4
				, fn_visita_grados(v.id,5) AS sec_5, fn_visita_alumnos(v.id,1) AS dat_1
				, fn_visita_alumnos(v.id,2) AS dat_2, fn_visita_alumnos(v.id,3) AS dat_3
				, fn_visita_alumnos(v.id,4) AS dat_4, fn_visita_alumnos(v.id,5) AS dat_5
				, v.observacion, CONCAT_WS(' ', p.paterno, p.materno, p.nombre) AS promotor
				, '' AS convenio
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

	public static function getCargaVisitaColegioCount( $array )
	{
		$sSql = <<<EOT
		SELECT
			COUNT(a.id) AS cant
		FROM (
			SELECT
				v.id, o.nombre AS ode, LEFT(ct.nombre,1) AS tipo_colegio, c.nombre AS colegio, c.telefono
				, v.personac AS contesta, v.personacr AS recibe, c.direccion, '' AS localidad, c.referencia
				, d.nombre AS distrito, c.ugel, DATE(v.fecha_visita) AS fecha_visita
				, TIME(v.fecha_visita) AS hora, tiempo_programado AS tiempo
				, fn_visita_grados(v.id,1) AS sec_1, fn_visita_grados(v.id,2) AS sec_2
				, fn_visita_grados(v.id,3) AS sec_3, fn_visita_grados(v.id,4) AS sec_4
				, fn_visita_grados(v.id,5) AS sec_5, fn_visita_alumnos(v.id,1) AS dat_1
				, fn_visita_alumnos(v.id,2) AS dat_2, fn_visita_alumnos(v.id,3) AS dat_3
				, fn_visita_alumnos(v.id,4) AS dat_4, fn_visita_alumnos(v.id,5) AS dat_5
				, v.observacion, CONCAT_WS(' ', p.paterno, p.materno, p.nombre) AS promotor
				, '' AS convenio
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

	public static function getCargaDataColegio($aParametro)
	{
		$sSql = <<<EOT
		SELECT
			a.id, a.ode, a.tipo_colegio, a.colegio, a.nivel_cole, a.genero, a.turno, a.director, a.telefono, a.email
			, a.direccion, a.localidad, a.referencia, a.distrito, a.provincia, a.departamento, a.ugel, a.contesta, a.recibe
			, a.tele_nombre, a.tele_fecha, a.fecha_visita, a.hora, a.tiempo
			, a.sec_1, a.sec_2, a.sec_3, a.sec_4, a.sec_5, (a.sec_1 + a.sec_2 + a.sec_3 + a.sec_4 + a.sec_5) AS total_sec
			, a.dat_1, a.dat_2, a.dat_3, a.dat_4, a.dat_5, (a.dat_1 + a.dat_2 + a.dat_3 + a.dat_4 + a.dat_5) AS total_dat
			, a.observacion, a.promotor, a.contacto, a.cargo, a.c_email, a.c_telefono
		FROM (
			SELECT
				v.id, o.nombre AS ode, LEFT(ct.nombre,1) AS tipo_colegio, c.nombre AS colegio, cn.nombre AS nivel_cole
				, CASE c.genero WHEN "M" THEN "Masculino" WHEN "F" THEN "Femenino" WHEN "X" THEN "Mixto" ELSE "" END AS genero
				, c.turno, c.director, c.telefono, c.email, c.direccion, '' AS localidad, c.referencia, d.nombre AS distrito
				, pro.nombre AS provincia, de.nombre AS departamento, c.ugel, v.personac AS contesta, v.personacr AS recibe
				, CONCAT_WS(' ', pte.paterno, pte.materno, pte.nombre) AS tele_nombre, v.fechat AS tele_fecha
				, DATE(v.fecha_visita) AS fecha_visita, TIME(v.fecha_visita) AS hora, tiempo_programado AS tiempo
				, fn_visita_grados(v.id,1) AS sec_1, fn_visita_grados(v.id,2) AS sec_2
				, fn_visita_grados(v.id,3) AS sec_3, fn_visita_grados(v.id,4) AS sec_4
				, fn_visita_grados(v.id,5) AS sec_5, fn_visita_alumnos(v.id,1) AS dat_1
				, fn_visita_alumnos(v.id,2) AS dat_2, fn_visita_alumnos(v.id,3) AS dat_3
				, fn_visita_alumnos(v.id,4) AS dat_4, fn_visita_alumnos(v.id,5) AS dat_5
				, v.observacion, CONCAT_WS(' ', p.paterno, p.materno, p.nombre) AS promotor
				, v.contacto, v.cargo, v.email AS c_email, v.telefono AS c_telefono
			FROM colegios c 
				LEFT JOIN visitas v ON c.id = v.colegio_id
				LEFT JOIN colegios_niveles cn ON c.colegio_nivel_id=cn.id
				LEFT JOIN odes o ON c.ode_id=o.id
				LEFT JOIN colegios_tipos ct ON c.colegio_tipo_id=ct.id
				LEFT JOIN distritos d ON c.distrito_id=d.id
				LEFT JOIN provincias pro ON d.provincia_id=pro.id
				LEFT JOIN departamentos de ON pro.departamento_id=de.id
				LEFT JOIN personas p ON v.persona_id=p.id
				LEFT JOIN personas pte ON v.personat_id=pte.id
		) a
EOT;
		$sSql .= $aParametro['where'].$aParametro['limit'];
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getCargaDataColegioCount( $array )
	{
		$sSql = <<<EOT
		SELECT
			COUNT(a.id) AS cant
		FROM (
			SELECT
				v.id, o.nombre AS ode, LEFT(ct.nombre,1) AS tipo_colegio, c.nombre AS colegio, cn.nombre AS nivel_cole
				, CASE c.genero WHEN "M" THEN "Masculino" WHEN "F" THEN "Femenino" WHEN "X" THEN "Mixto" ELSE "" END AS genero
				, c.turno, c.director, c.telefono, c.email, c.direccion, '' AS localidad, c.referencia, d.nombre AS distrito
				, pro.nombre AS provincia, de.nombre AS departamento, c.ugel, v.personac AS contesta, v.personacr AS recibe
				, CONCAT_WS(' ', pte.paterno, pte.materno, pte.nombre) AS tele_nombre, v.fechat AS tele_fecha
				, DATE(v.fecha_visita) AS fecha_visita, TIME(v.fecha_visita) AS hora, tiempo_programado AS tiempo
				, fn_visita_grados(v.id,1) AS sec_1, fn_visita_grados(v.id,2) AS sec_2
				, fn_visita_grados(v.id,3) AS sec_3, fn_visita_grados(v.id,4) AS sec_4
				, fn_visita_grados(v.id,5) AS sec_5, fn_visita_alumnos(v.id,1) AS dat_1
				, fn_visita_alumnos(v.id,2) AS dat_2, fn_visita_alumnos(v.id,3) AS dat_3
				, fn_visita_alumnos(v.id,4) AS dat_4, fn_visita_alumnos(v.id,5) AS dat_5
				, v.observacion, CONCAT_WS(' ', p.paterno, p.materno, p.nombre) AS promotor
				, v.contacto, v.cargo, v.email AS c_email, v.telefono AS c_telefono
			FROM colegios c 
				LEFT JOIN visitas v ON c.id = v.colegio_id
				LEFT JOIN colegios_niveles cn ON c.colegio_nivel_id=cn.id
				LEFT JOIN odes o ON c.ode_id=o.id
				LEFT JOIN colegios_tipos ct ON c.colegio_tipo_id=ct.id
				LEFT JOIN distritos d ON c.distrito_id=d.id
				LEFT JOIN provincias pro ON d.provincia_id=pro.id
				LEFT JOIN departamentos de ON pro.departamento_id=de.id
				LEFT JOIN personas p ON v.persona_id=p.id
				LEFT JOIN personas pte ON v.personat_id=pte.id
		) a
EOT;
		$sSql.= $array['where'];
		$oData = DB::select($sSql);
		return $oData[0]->cant;
	}

	public static function getCargaIndiceColegio($aParametro)
	{
		$sCadenaFecha = DateTime::createFromFormat('Y-m-d', $aParametro["fecha_actual"]);
		$sAno = $sCadenaFecha->format('Y');
		$sFechaActual = $sCadenaFecha->format('Y-m-d');
		$sSql = <<<EOT
		SELECT *
		FROM (
			SELECT 
				b.id, b.ode, b.nacional, b.particular, b.visitados, b.por_visitar, b.meta, b.inicio, b.termino
				, b.d1, b.d2, b.d3, b.d4, b.d5, b.d6, b.d7, b.total_cole
				, b.dia_camp, b.dia_falta_camp, (b.dia_camp + b.dia_falta_camp) AS total_dia_camp
				, FORMAT(b.total_cole / b.dia_camp, 2) AS indice_diario
				, FORMAT( (b.meta - b.total_cole) / b.dia_falta_camp, 2) AS inicio_proyectado
				, FORMAT( (b.dia_camp + b.dia_falta_camp) * (b.total_cole / b.dia_camp), 2) AS total_fin_camp
			FROM (
				SELECT 
					a.id, a.ode, a.nacional, a.particular, (a.nacional + a.particular) AS visitados
					, ( a.meta - (a.nacional + a.particular)) AS por_visitar, a.meta
					, a.inicio, a.termino, a.d1, a.d2, a.d3, a.d4, a.d5, a.d6, a.d7
					, (a.d1 + a.d2 + a.d3 + a.d4 + a.d5 + a.d6 + a.d7) AS total_cole
					, DATEDIFF('{$sFechaActual}', a.inicio) AS dia_camp, DATEDIFF(a.termino, '{$sFechaActual}') AS dia_falta_camp
				FROM (
					SELECT o.id, o.nombre AS ode, fn_ode_visita(o.id, 1, '{$sAno}') AS nacional
						, fn_ode_visita(o.id, 2, '{$sAno}') AS particular
						, (SELECT COUNT(*) FROM colegios r_c WHERE r_c.ode_id=o.id) AS meta
						, DATE('2016-05-28') AS inicio, DATE(ADDDATE('2016-11-28', INTERVAL 1 DAY)) AS termino
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',0) AS 'd7'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',1) AS 'd6'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',2) AS 'd5'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',3) AS 'd4'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',4) AS 'd3'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',5) AS 'd2'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',6) AS 'd1'
					FROM odes o
				) a
			) b
		) c
EOT;
		$sSql .= $aParametro['where'].$aParametro['limit'];
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getCargaIndiceColegioCount( $array )
	{
		$sCadenaFecha = DateTime::createFromFormat('Y-m-d', $array["fecha_actual"]);
		$sAno = $sCadenaFecha->format('Y');
		$sFechaActual = $sCadenaFecha->format('Y-m-d');
		$sSql = <<<EOT
		SELECT COUNT(c.id) AS cant
		FROM (
			SELECT 
				*
			FROM (
				SELECT 
					a.id, a.ode, a.nacional, a.particular, (a.nacional + a.particular) AS visitados
					, ( a.meta - (a.nacional + a.particular)) AS por_visitar, a.meta
					, a.inicio, a.termino, a.d1, a.d2, a.d3, a.d4, a.d5, a.d6, a.d7
					, (a.d1 + a.d2 + a.d3 + a.d4 + a.d5 + a.d6 + a.d7) AS total_cole
					, DATEDIFF('{$sFechaActual}', a.inicio) AS dia_camp, DATEDIFF(a.termino, '{$sFechaActual}') AS dia_falta_camp
				FROM (
					SELECT o.id, o.nombre AS ode, fn_ode_visita(o.id, 1, '{$sAno}') AS nacional
						, fn_ode_visita(o.id, 2, '{$sAno}') AS particular
						, (SELECT COUNT(*) FROM colegios r_c WHERE r_c.ode_id=o.id) AS meta
						, DATE('2016-05-28') AS inicio, DATE(ADDDATE('2016-11-28', INTERVAL 1 DAY)) AS termino
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',0) AS 'd7'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',1) AS 'd6'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',2) AS 'd5'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',3) AS 'd4'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',4) AS 'd3'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',5) AS 'd2'
						, fn_ode_visita_fecha(o.id, '{$sFechaActual}',6) AS 'd1'
					FROM odes o
				) a
			) b
		) c
EOT;
		$sSql.= $array['where'];
		$oData = DB::select($sSql);
		return $oData[0]->cant;
	}

}
?>
