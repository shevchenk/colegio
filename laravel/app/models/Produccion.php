<?php
class Produccion extends Base
{
    public $table = "visitas";

    public static function getCargarCount( $array ){
        $sSql = <<<EOT
            SELECT COUNT(p.id) cant
            FROM personas p
            INNER JOIN cargo_persona cp ON p.id=cp.persona_id AND cp.cargo_id=4 AND cp.estado=1
            WHERE p.estado=1
EOT;
        $sSql.= $array['where'];
        $oData = DB::select($sSql);
        return $oData[0]->cant;
    }

    public static function getCargar($array)
    {
        $finit=$array['finit'];
        $ffint=$array['ffint'];
        $fini1=$array['fini1'];
        $ffin1=$array['ffin1'];
        $fini2=$array['fini2'];
        $ffin2=$array['ffin2'];
        $fini3=$array['fini3'];
        $ffin3=$array['ffin3'];
        $sSql = "
            SELECT p.paterno, p.materno, p.nombre, p.horario, p.codigo,
            p.fecha_ingreso, p.fecha_retiro, '' fecha_campaña,
            t.datast, t.colegiost ,t.seminariost conveniost, '' matriculadost,
            t1.datast1, t1.colegiost1 ,t1.seminariost1 conveniost1, '' matriculadost1,
            t2.datast2, t2.colegiost2 ,t2.seminariost2 conveniost2, '' matriculadost2,
            COUNT(DISTINCT(a.id)) datacole, COUNT(DISTINCT(IF(cd.id IS NULL,NULL,a.id))) c5, COUNT(DISTINCT(IF(cd2.id IS NULL,NULL,a.id))) c4, 
            COUNT(DISTINCT(IF(cd3.id IS NULL,NULL,a.id))) c3, COUNT(DISTINCT(IF(cd4.id IS NULL,NULL,a.id))) c2, COUNT(DISTINCT(IF(cd5.id IS NULL,NULL,a.id))) c1,
            COUNT(DISTINCT(v.colegio_id)) colegios,
            COUNT(DISTINCT(IF( c.colegio_tipo_id=1,v.colegio_id,NULL ))) particular, COUNT(DISTINCT(IF( c.colegio_tipo_id=2,v.colegio_id,NULL ))) nacional,
            '' citas, COUNT(DISTINCT(cs.id)) convenios, '' matriculas
            FROM personas p
            INNER JOIN cargo_persona cp ON p.id=cp.persona_id AND cp.cargo_id=4 AND cp.estado=1
            /********************************************************************/
            LEFT JOIN (
            SELECT COUNT(DISTINCT(c.id)) colegiost, COUNT(DISTINCT(cs.id)) seminariost, COUNT(DISTINCT(a.id)) datast, v.persona_id
            FROM visitas v 
            LEFT JOIN colegios c ON c.id=v.colegio_id AND c.estado=1
            LEFT JOIN colegios_seminarios cs ON cs.colegio_id=c.id AND cs.estado=1
            LEFT JOIN visitas_detalle vd ON vd.visita_id=v.id AND v.estado=1
            LEFT JOIN alumnos a ON a.visita_detalle_id=vd.id AND a.estado=1
            WHERE DATE(v.fecha_visita) BETWEEN '$finit' AND '$ffint'
            AND v.estado=1
            GROUP BY v.persona_id
            ) t ON t.persona_id=p.id
            /********************************************************************/
            /********************************************************************/
            LEFT JOIN (
            SELECT COUNT(DISTINCT(c.id)) colegiost1, COUNT(DISTINCT(cs.id)) seminariost1, COUNT(DISTINCT(a.id)) datast1, v.persona_id
            FROM visitas v 
            LEFT JOIN colegios c ON c.id=v.colegio_id AND c.estado=1
            LEFT JOIN colegios_seminarios cs ON cs.colegio_id=c.id AND cs.estado=1
            LEFT JOIN visitas_detalle vd ON vd.visita_id=v.id AND v.estado=1
            LEFT JOIN alumnos a ON a.visita_detalle_id=vd.id AND a.estado=1
            WHERE DATE(v.fecha_visita) BETWEEN '$fini3' AND '$ffin3'
            AND v.estado=1
            GROUP BY v.persona_id
            ) t1 ON t1.persona_id=p.id
            /********************************************************************/
            /********************************************************************/
            LEFT JOIN (
            SELECT COUNT(DISTINCT(c.id)) colegiost2, COUNT(DISTINCT(cs.id)) seminariost2, COUNT(DISTINCT(a.id)) datast2, v.persona_id
            FROM visitas v 
            LEFT JOIN colegios c ON c.id=v.colegio_id AND c.estado=1
            LEFT JOIN colegios_seminarios cs ON cs.colegio_id=c.id AND cs.estado=1
            LEFT JOIN visitas_detalle vd ON vd.visita_id=v.id AND v.estado=1
            LEFT JOIN alumnos a ON a.visita_detalle_id=vd.id AND a.estado=1
            WHERE DATE(v.fecha_visita) BETWEEN '$fini2' AND '$ffin2'
            AND v.estado=1
            GROUP BY v.persona_id
            ) t2 ON t2.persona_id=p.id
            /********************************************************************/
            LEFT JOIN visitas v ON v.persona_id=p.id AND v.estado=1 AND DATE(v.fecha_visita) BETWEEN '$fini1' AND '$ffin1'
            LEFT JOIN colegios c ON c.id=v.colegio_id AND c.estado=1
            LEFT JOIN colegios_seminarios cs ON cs.colegio_id=c.id AND cs.estado=1
            LEFT JOIN visitas_detalle vd ON vd.visita_id=v.id AND vd.estado=1
            LEFT JOIN alumnos a ON a.visita_detalle_id=vd.id AND a.estado=1
            LEFT JOIN colegios_detalle cd ON cd.id=vd.colegio_detalle_id AND cd.grado=5
            LEFT JOIN colegios_detalle cd2 ON cd2.id=vd.colegio_detalle_id AND cd2.grado=4
            LEFT JOIN colegios_detalle cd3 ON cd3.id=vd.colegio_detalle_id AND cd3.grado=3
            LEFT JOIN colegios_detalle cd4 ON cd4.id=vd.colegio_detalle_id AND cd4.grado=2
            LEFT JOIN colegios_detalle cd5 ON cd5.id=vd.colegio_detalle_id AND cd5.grado=1
            /********************************************************************/
            WHERE p.estado=1 ";
        $sSql.= $array['where'].
                " GROUP BY p.id ".
                $array['limit'];
        $oData = DB::select($sSql);
        return $oData;
    }
}
?>
