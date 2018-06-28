<?php

class DistritoController extends \BaseController
{

    public function postCargar()
    {
        if ( Request::ajax() ) {
            $odes = Distrito::get(Input::all());
            return Response::json(
                array(
                'rst'=>1,
                'datos'=>$odes
                )
            );
        }
    }

    public function postListar()
    {
        if ( Request::ajax() ) {
            $r = Distrito::Listar();
            return Response::json(
                array(
                'rst'=>1,
                'datos'=>$r
                )
            );
        }
    }


}
