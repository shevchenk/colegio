<?php
class VisitaController extends BaseController
{
    public function postCrear()
    {
        if ( Request::ajax() ) {
            DB::beginTransaction();
            $visita = new Visita;
            $visita['colegio_id'] = Input::get('colegio_id');
            $visita['fecha_visita'] = Input::get('fecha_visita');
            if(Input::has('persona_id'))
            {
                $visita['persona_id'] = Input::get('persona_id');
            }
            $visita->save();

            $colegioDetalle= Input::get('colegio_detalle');
            for ($i=0; $i < count($colegioDetalle); $i++) { 
                $visitaDetalle=new VisitaDetalle;
                $visitaDetalle['visita_id']=$visita->id;
                $visitaDetalle['colegio_detalle_id']=$colegioDetalle[$i];
                $visitaDetalle->save();
            }
            //DB::rollback();

            DB::commit();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                )
            );
        }
    }
}
?>
