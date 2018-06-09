<?php

class Seminario extends Base
{
    public $table = "colegios_seminarios";

    public static function getCargarCount( $array ){
        $sSql = <<<EOT
            SELECT COUNT(co.id) cant
            FROM colegios co 
            INNER JOIN odes o ON o.id=co.ode_id
            INNER JOIN distritos d ON d.id=co.distrito_id
            INNER JOIN colegios_tipos ct ON ct.id=co.colegio_tipo_id
            INNER JOIN colegios_seminarios cs ON cs.colegio_id=co.id
EOT;
        $sSql.= $array['where'];
        $oData = DB::select($sSql);
        return $oData[0]->cant;
    }

    public static function getCargar($array)
    {
        $sSql = <<<EOT
            SELECT o.nombre ode, ct.nombre tipo_colegio, co.nombre colegio, co.telefono, co.direccion, z.zona, d.nombre distrito, cs.persona, cs.celular, cs.cargo, cs.horario
            FROM colegios co 
            INNER JOIN odes o ON o.id=co.ode_id
            INNER JOIN distritos d ON d.id=co.distrito_id
            INNER JOIN zonas z ON z.id=d.zona_id
            INNER JOIN colegios_tipos ct ON ct.id=co.colegio_tipo_id
            INNER JOIN colegios_seminarios cs ON cs.colegio_id=co.id
EOT;
        $sSql.= $array['where'].
                $array['limit'];
        $oData = DB::select($sSql);
        return $oData;
    }
}
