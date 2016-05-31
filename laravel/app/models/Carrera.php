<?php
class Carrera extends Base
{
	public $table = "carreras";

	public static function getCargar()
	{
		$sSql = <<<EOT
			SELECT 
				c.id, c.nombre AS carrera, ct.nombre AS tipo_carrera, c.estado
			FROM carreras c
				LEFT JOIN carreras_tipo ct ON c.carrera_tipo_id=ct.id
EOT;
		$oData = DB::select($sSql);
		return $oData;
	}

}
?>
