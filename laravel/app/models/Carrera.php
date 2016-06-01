<?php
class Carrera extends Base
{
	public $table = "carreras";

	public static function getCargar()
	{
		$sSql = <<<EOT
			SELECT 
				c.id, c.nombre AS carrera, ct.nombre AS tipo_carrera, c.estado, ct.id AS tipo_id
			FROM carreras c
				LEFT JOIN carreras_tipo ct ON c.carrera_tipo_id=ct.id
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

	public static function getListartipo()
	{
		$sSql = <<<EOT
			SELECT id, nombre FROM carreras_tipo WHERE estado=1
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

}
?>
