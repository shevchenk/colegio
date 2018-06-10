<?php
class VisitaDetalle extends Base
{
    public $table = "visitas_detalle";

    public static function Cargar( $array ){
        $sSql = <<<EOT
            SELECT vd.id, cd.grado, cd.seccion, cd.turno, vd.alumnos_total, vd.alumnos_registrados,
            IF(cd.nivel=1,'Inicio',
                IF(
                    cd.nivel=2,'Primaria',
                    IF(
                    cd.nivel=3,'Secundaria',''
                    )
                )
            ) nivel,
            CONCAT(p.paterno, ' ', p.materno, ', ', p.nombre, ' | ', p.dni) AS promotor
            FROM visitas_detalle vd
            INNER JOIN colegios_detalle cd ON cd.id=vd.colegio_detalle_id
            LEFT JOIN personas p ON p.id=vd.persona_id
            WHERE vd.estado=1
EOT;
        $sSql.= $array['where'];
        $oData = DB::select($sSql);
        return $oData;
    }
}
?>
