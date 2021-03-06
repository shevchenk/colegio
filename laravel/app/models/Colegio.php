<?php
class Colegio extends Base
{
	public $table = "colegios";

	public static function getCargarDetalle($array)
	{
		$sSql = <<<EOT
			SELECT 
				cd.id, cd.grado, cd.seccion, cd.nivel AS nivel_id, cd.turno AS turno_id, cd.total_alumnos,
				CASE cd.nivel 
					WHEN 2 THEN 'Primaria'
					WHEN 3 THEN 'Secundaria'
				END nivel,
				CASE cd.turno 
					WHEN 'M' THEN 'Mañana'
					WHEN 'T' THEN 'Tarde'
					WHEN 'N' THEN 'Noche'
				END turno
			FROM colegios c
				INNER JOIN colegios_detalle cd ON cd.colegio_id=c.id AND cd.estado=1
EOT;
		$sSql.= $array['colegio_id'];
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getCargar($array)
	{
		$sSql = <<<EOT
			SELECT 
				c.id, c.ode_id, o.nombre AS ode, c.nombre, c.colegio_tipo_id, ct.nombre AS tipo
				, c.colegio_nivel_id, cn.nombre AS nivel, c.distrito_id, d.nombre AS distrito, IFNULL(c.email,'') AS email
				, d.provincia_id, p.nombre AS provincia, p.departamento_id, de.nombre AS departamento
				, c.direccion, c.referencia, c.director
				, c.telefono, c.celular, c.estado, IFNULL(c.ugel,'') AS ugel, c.genero AS genero_id, c.turno AS turno_id
				, CASE c.genero WHEN 'M' THEN 'Masculino' WHEN 'F' THEN 'Femenino' WHEN 'X' THEN 'Mixto' ELSE '' END genero
				-- , CASE c.turno WHEN 'M' THEN 'Mañana' WHEN 'T' THEN 'Tarde' WHEN 'MT' THEN 'Mañana y Tarde' ELSE '' END turno
				,c.turno
			FROM colegios c
				INNER JOIN distritos d ON c.distrito_id=d.id
				INNER JOIN provincias p ON d.provincia_id=p.id
				INNER JOIN departamentos de ON p.departamento_id=de.id
				LEFT JOIN odes o ON c.ode_id=o.id
				LEFT JOIN colegios_tipos ct ON c.colegio_tipo_id=ct.id
				LEFT JOIN colegios_niveles cn ON c.colegio_nivel_id=cn.id
EOT;
		$sSql.=	$array['where'].
				$array['distrito'].
				$array['ode'];
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListarcolegio()
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM colegios WHERE estado=1
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListarode()
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM odes WHERE estado=1
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListartipo()
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM colegios_tipos WHERE estado=1
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListarnivel()
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM colegios_niveles WHERE estado=1
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListardepartamento()
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM departamentos ORDER BY nombre
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListarpersona()
	{
		$sSql = <<<EOT
			SELECT id, CONCAT_WS(' ',paterno, materno, nombre) AS nombre FROM personas
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListarprovincia($nIdPadre)
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM provincias WHERE departamento_id={$nIdPadre}  ORDER BY nombre
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListardistrito($nIdPadre)
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM distritos WHERE provincia_id={$nIdPadre}  ORDER BY nombre
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getEstadodetalle($nIdColegio)
	{
		$aParametro = array($nIdColegio);
		$bData = DB::update('UPDATE colegios_detalle SET estado = 0 WHERE colegio_id = ?', $aParametro);
		return $bData;
	}

	public static function getListarSeminario($colegio_id){
		$sql=" 	SELECT persona,cargo,horario,IFNULL(fecha,'') fecha,celular,id,colegio_id
				FROM colegios_seminarios
				WHERE estado=1
				AND colegio_id='".$colegio_id."'";
		$r=DB::select($sql); 

		return $r;
	}

	public static function getListarConvenio($colegio_id){
		$sql=" 	SELECT cc.fecha_inicio,cc.fecha_termino,cc.suscribe,cc.cargo,cc.trabajador_id,cc.id,
				cc.colegio_id,CONCAT(p.paterno,' ',p.materno,', ',p.nombre,' | DNI:',p.dni) trabajador
				FROM colegios_convenio cc
				LEFT JOIN personas p ON p.id=cc.trabajador_id
				WHERE cc.estado=1
				AND cc.colegio_id='".$colegio_id."'";
		$r=DB::select($sql); 

		return $r;
	}

}
?>
