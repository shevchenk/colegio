<?php
class Colegio extends Base
{
	public $table = "colegios";

	public static function getCargar()
	{
		$sSql = <<<EOT
			SELECT 
				c.id, c.ode_id, o.nombre AS ode, c.nombre, c.colegio_tipo_id, ct.nombre AS tipo
				, c.colegio_nivel_id, cn.nombre AS nivel, c.distrito_id, d.nombre AS distrito
				, d.provincia_id, p.nombre AS provincia, p.departamento_id, de.nombre AS departamento
				, c.direccion, c.referencia, IFNULL(c.persona_id,0) AS persona_id, IFNULL(pe.nombre,'') AS persona
				, c.telefono, c.celular, c.estado
			FROM colegios c
				LEFT JOIN odes o ON c.ode_id=o.id
				LEFT JOIN colegios_tipos ct ON c.colegio_tipo_id=ct.id
				LEFT JOIN colegios_niveles cn ON c.colegio_nivel_id=cn.id
				LEFT JOIN distritos d ON c.distrito_id=d.id
				LEFT JOIN provincias p ON d.provincia_id=p.id
				LEFT JOIN departamentos de ON p.departamento_id=de.id
				LEFT JOIN personas pe ON c.persona_id=pe.id
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
			SELECT id, nombre FROM departamentos
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
			SELECT id, nombre FROM provincias WHERE departamento_id={$nIdPadre}
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListardistrito($nIdPadre)
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM distritos WHERE provincia_id={$nIdPadre}
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

}
?>
