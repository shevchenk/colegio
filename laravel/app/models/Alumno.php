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

    public static function DataAlumno( $array )
    {
        $sSql=<<<EOT
            /**********Ode***********/
SELECT o.nombre ode,dode.nombre distrito_ode ,proode.nombre provincia_ode, deode.nombre departamento_ode,
/**********Alumno***********/
p.paterno, p.materno, p.nombre, p.sexo, IF(p.fecha_nacimiento IS NULL,'0',FLOOR(DATEDIFF(CURDATE(),p.fecha_nacimiento)/360)) edad,
cd.grado, cd.seccion, cd.turno, cn.nombre nivel, p.telefono, p.celular, p.email, p.tel_pradre, p.direccion, p.referencia, 
dalu.nombre distrito_alu ,proalu.nombre provincia_alu, dealu.nombre departamento_alu,
/**********Colegio**********/
c.nombre colegio, ct.nombre colegio_tipo, c.direccion as direccion1, c.referencia as referencia1, 
d.nombre distrito_cole, pro.nombre provincia_cole, de.nombre departamento_cole, '' pension,
/**********Educativo**********/
GROUP_CONCAT( IF(cat3.id IS NOT NULL,CONCAT(ca.id,'|',ca.nombre),NULL ) ORDER BY ca.id SEPARATOR '||') carrera3,
GROUP_CONCAT( IF(cat3.id IS NOT NULL,CONCAT(ca.id,'|',ad.monto),NULL ) ORDER BY ca.id SEPARATOR '||') monto3,
GROUP_CONCAT( IF(cat2.id IS NOT NULL,CONCAT(ca.id,'|',ca.nombre),NULL ) ORDER BY ca.id SEPARATOR '||') carrera2,
GROUP_CONCAT( IF(cat2.id IS NOT NULL,CONCAT(ca.id,'|',ad.monto),NULL ) ORDER BY ca.id SEPARATOR '||') monto2,
GROUP_CONCAT( IF(cat1.id IS NOT NULL,CONCAT(ca.id,'|',ca.nombre),NULL ) ORDER BY ca.id SEPARATOR '||') carrera1,
GROUP_CONCAT( IF(cat1.id IS NOT NULL,CONCAT(ca.id,'|',ad.monto),NULL ) ORDER BY ca.id SEPARATOR '||') monto1,
/**********Digitador y Visita**********/
CONCAT(pd.paterno,' ', pd.materno,', ', pd.nombre) digitador, a.created_at fecha_digitador,
CONCAT(pv.paterno,' ', pv.materno,', ', pv.nombre) visitador, v.fecha_visita
-- ,p.id,cat.nombre carrera_tipo, ca.nombre carrera, ad.monto
FROM alumnos a
INNER JOIN personas p ON p.id=a.persona_id
INNER JOIN visitas_detalle vd ON a.visita_detalle_id=vd.id AND vd.estado=1
INNER JOIN visitas v ON v.id=vd.visita_id
INNER JOIN colegios_detalle cd ON cd.id=vd.colegio_detalle_id
INNER JOIN colegios c ON c.id=cd.colegio_id
INNER JOIN distritos d ON d.id=c.distrito_id
INNER JOIN odes_distritos od ON od.distrito_id=d.id AND od.estado=1
INNER JOIN odes o ON o.id=od.ode_id AND o.estado=1
INNER JOIN provincias pro ON pro.id=d.provincia_id
INNER JOIN departamentos de ON de.id=pro.departamento_id
INNER JOIN personas pd ON pd.id=a.usuario_created_at
LEFT JOIN distritos dode ON dode.id=o.distrito_id
LEFT JOIN provincias proode ON proode.id=o.provincia_id
LEFT JOIN departamentos deode ON deode.id=o.departamento_id
LEFT JOIN distritos dalu ON dalu.id=p.distrito_id
LEFT JOIN provincias proalu ON proalu.id=p.provincia_id
LEFT JOIN departamentos dealu ON dealu.id=p.departamento_id
LEFT JOIN personas pv ON pv.id=v.persona_id
LEFT JOIN colegios_niveles cn ON cn.id=cd.nivel
LEFT JOIN colegios_tipos ct ON ct.id=c.colegio_tipo_id
LEFT JOIN alumnos_detalle ad ON ad.alumno_id=a.id AND ad.estado=1
LEFT JOIN carreras ca ON ca.id=ad.carrera_id
LEFT JOIN carreras_tipo cat ON cat.id=ca.carrera_tipo_id
LEFT JOIN carreras_tipo cat1 ON cat1.id=ca.carrera_tipo_id AND cat1.id=1
LEFT JOIN carreras_tipo cat2 ON cat2.id=ca.carrera_tipo_id AND cat2.id=2
LEFT JOIN carreras_tipo cat3 ON cat3.id=ca.carrera_tipo_id AND cat3.id=3
WHERE a.estado=1 
EOT;
        $sSql.= $array['where'];
        $sSql.= " GROUP BY a.id
                  ORDER BY o.nombre,p.paterno,p.materno,p.nombre";
        $oData = DB::select($sSql);
        return $oData;
    }
}
?>
