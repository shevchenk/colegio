<?php
class OpcionController extends BaseController
{
	public function postCargar()
	{
		if ( Request::ajax() ) {
			$aData = Carrera::getCargar();
			$aParametro['rst'] = 1;
			$aParametro['aData'] = $aData;
			return Response::json($aParametro);
		}
	}

}
?>
