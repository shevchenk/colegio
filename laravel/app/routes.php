<?php
Route::get(
    '/', function () {
        if (Session::has('accesos')) {
            return Redirect::to('/admin.inicio');
        } else {
            return View::make('login');
        }
    }
);

Route::get(
    'salir', function () {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
);

/*
Route::get(
    'email/{email}', function($email){
        $i=4;
        $parametros=array(
            'paso'      => ($i+1),
            'persona'   => 'Salcedo Franco Jorge Luis',
            'area'      => 'Area TIC',
            'procesoe'  => 'Proceso Nuevo',
            'personae'  => 'Juan Luna Galvez',
            'areae'     => 'Gerente de la Calidad'
        );

        //try{
            Mail::send('emails', $parametros ,
                function($message){
                $message
                ->to('jorgeshevchenk@gmail.com')
                ->subject('.::Se ha involucrado en nuevo proceso::.');
                }
            );

            echo 'Se realizó con éxito su registro, <strong>valide su email.</strong>';
        //}
        //catch(Exception $e){
        //    var_dump($e);
        //    echo 'No se pudo realizar el envio de Email; Favor de verificar su email e intente nuevamente.';
        //}

    }
);
*/
Route::controller('check', 'LoginController');
Route::controller('cargar', 'CargarController');

Route::get(
    '/{ruta}', array('before' => 'auth', function ($ruta) {
        if (Session::has('accesos')) {
            $accesos = Session::get('accesos');
            $menus = Session::get('menus');

            $val = explode("_", $ruta);
            $valores = array(
                'valida_ruta_url' => $ruta,
                'menus' => $menus
            );
            if (count($val) == 2) {
                $dv = explode("=", $val[1]);
                $valores[$dv[0]] = $dv[1];
            }
            $rutaBD = substr($ruta, 6);
            //si tiene accesoo si accede al inicio o a misdatos
            //return View::make($ruta)->with($valores);
            if (in_array($rutaBD, $accesos) or
                $rutaBD == 'inicio' or $rutaBD=='mantenimiento.misdatos') {
                return View::make($ruta)->with($valores);
            } else
                return Redirect::to('/admin.inicio');
        } else
            return Redirect::to('/');
        }
    )
);

Route::controller('cargo', 'CargoController');
Route::controller('language', 'LanguageController');
Route::controller('menu', 'MenuController');
Route::controller('opcion', 'OpcionController');
Route::controller('persona', 'PersonaController');
Route::controller('usuario', 'UsuarioController');
