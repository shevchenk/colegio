<?php

class OdeDistritoController extends \BaseController
{

    public function postListar()
    {
        if ( Request::ajax() ) {
            $r = OdeDistrito::Listar();
            return Response::json(
                array(
                'rst'=>1,
                'datos'=>$r
                )
            );
        }
    }

	public function postListardetalle()
	{
		if ( Request::ajax() )
		{
			$nIdOde = Input::get('ode_id');
			$aData = OdeDistrito::getListardetalle($nIdOde);
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

}
