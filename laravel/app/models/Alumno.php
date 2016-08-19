<?php
class Alumno extends Base
{
    public $table = "alumnos";

    public static function Cargar( $array )
    {
        $sSql = <<<EOT
            SELECT a.id, p.nombre, p.paterno, p.materno, a.convenio, p.dni, p.id persona_id
            FROM alumnos a
            INNER JOIN personas p ON p.id=a.persona_id
            WHERE a.estado=1
EOT;
        $sSql.= $array['where'];
        $oData = DB::select($sSql);
        return $oData;
    }

    public static function CargarDetalle( $array )
    {
        $sSql = <<<EOT
            SELECT ad.id, c.nombre carrera, ad.monto
            FROM alumnos_detalle ad
            INNER JOIN carreras c ON c.id=ad.carrera_id
            WHERE ad.estado=1
EOT;
        $sSql.= $array['where'];
        $oData = DB::select($sSql);
        return $oData;
    }
}
?>
