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
            INNER JOIN personas pv ON pv.id=v.persona_id 
            INNER JOIN personas pc ON pc.id=v.personac_id
EOT;
        $sSql.= $array['where'];
        $oData = DB::select($sSql);
        return $oData[0]->cant;
    }

    public static function getCargar($array)
    {
        $sSql = <<<EOT
            SELECT v.id, v.fecha_visita, c.nombre colegio, v.nro_tel, o.nombre ode,
            CONCAT(pv.paterno,' ',pv.materno,', ',pv.nombre) persona_id,
            CONCAT(pc.paterno,' ',pc.materno,', ',pc.nombre) personac_id
            FROM visitas v
            INNER JOIN colegios c ON c.id=v.colegio_id AND c.estado=1
            INNER JOIN distritos d ON d.id=c.distrito_id AND d.estado=1
            INNER JOIN odes_distritos od ON od.distrito_id=d.id AND od.estado=1
            INNER JOIN odes o ON o.id=od.ode_id
            INNER JOIN personas pv ON pv.id=v.persona_id 
            INNER JOIN personas pc ON pc.id=v.personac_id
EOT;
        $sSql.= $array['where'].
                $array['limit'];
        $oData = DB::select($sSql);
        return $oData;
    }
}
?>
