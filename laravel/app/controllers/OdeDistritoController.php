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

}
