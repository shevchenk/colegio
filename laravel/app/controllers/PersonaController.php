<?php

class PersonaController extends BaseController
{

    /**
     * cargar personas
     * POST /persona/cargar
     *
     * @return Response
     */
    public function postCargar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $personas = Persona::get(Input::all());
            return Response::json(array('rst'=>1,'datos'=>$personas));
        }
    }

    public function postCargarp()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $array=array();
            $array['where']='';$array['usuario']=Auth::user()->id;
            $array['limit']='';$array['order']='';

            if( Input::has('cargo_id') ){
                $array['where'].=" AND cp.cargo_id='".Input::get('cargo_id')."' ";
            }

            if( Input::has("paterno") ){
                $array['where'].=" AND p.paterno LIKE '%".Input::get("paterno")."%' ";
            }

            if( Input::has("materno") ){
                $array['where'].=" AND p.materno LIKE '%".Input::get("materno")."%' ";
            }

            if( Input::has("dni") ){
                $array['where'].=" AND p.dni LIKE '%".Input::get("dni")."%' ";
            }

            if( Input::has('persona_id_no') ){
                $array['where'].=" AND p.id NOT IN (".Input::get('persona_id_no').") ";
            }

            if (Input::has('draw')) {
                if (Input::has('order')) {
                    $inorder=Input::get('order');
                    $incolumns=Input::get('columns');
                    $array['order']=  ' ORDER BY '.
                                      $incolumns[ $inorder[0]['column'] ]['name'].' '.
                                      $inorder[0]['dir'];
                }

                $array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
                $retorno["draw"]=Input::get('draw');
            }

            $cant  = Persona::getCargarpCount( $array );
            $aData = Persona::getCargarp( $array );

            $aParametro['rst'] = 1;
            $aParametro["recordsTotal"]=$cant;
            $aParametro["recordsFiltered"]=$cant;
            $aParametro['data'] = $aData;
            $aParametro['msj'] = "No hay visitas programadas aún";
            return Response::json($aParametro);
        }
    }
    /**
     * cargar personas, mantenimiento
     * POST /persona/listar
     *
     * @return Response
     */
    public function postListar()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $personas=array();
            if ( Input::has('estado_persona') ) {
                $personas = Persona::getPersonas();
            }
            elseif ( Input::has('apellido_nombre') ) {
                $personas = Persona::getApellidoNombre();
            }
            else{
                $personas = Persona::getCargoArea();
            }
            
            return Response::json(array('rst'=>1,'datos'=>$personas));
        }
    }
    /**
     * Store a newly created resource in storage.
     * POST /persona/cargarareas
     *
     * @return Response
     */
    public function postCargarcargos()
    {
        $personaId = Input::get('persona_id');
        $r = Persona::getCargos($personaId);
        return Response::json(array('rst'=>1,'datos'=>$r));
    }
    /**
     * Store a newly created resource in storage.
     * POST /persona/crear
     *
     * @return Response
     */
    public function postCrear()
    {
        //si la peticion es ajax
        if ( Request::ajax() ) {
            $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';
            $reglas = array(
                'nombre' => $required.'|'.$regex,
                'paterno' => $required.'|'.$regex,
                'email' => 'email|unique:personas,email',
                'password'=> 'required',
                'dni'      => 'required|min:8|unique:personas,dni',
            );

            $mensaje= array(
                'required'    => ':attribute Es requerido',
                'regex'        => ':attribute Solo debe ser Texto',
                'exists'       => ':attribute ya existe',
            );

            $validator = Validator::make(Input::all(), $reglas, $mensaje);

            if ( $validator->fails() ) {
                return Response::json(
                    array(
                    'rst'=>2,
                    'msj'=>$validator->messages(),
                    )
                );
            }

            DB::beginTransaction();
            $persona = new Persona;
            if (Input::get('materno')<>'') 
                $persona['materno'] = Input::get('materno');
            if (Input::get('email')<>'') 
                $persona['email'] = Input::get('email');
            if (Input::get('fecha_nac')<>'') 
                $persona['fecha_nacimiento'] = Input::get('fecha_nac');
            if (Input::get('direccion')<>'') 
                $persona['direccion'] = Input::get('direccion');
            if (Input::get('referencia')<>'') 
                $persona['referencia'] = Input::get('referencia');
            if (Input::get('horario')<>'') 
                $persona['horario'] = Input::get('horario');
            if (Input::get('codigo')<>'') 
                $persona['codigo'] = Input::get('codigo');
            if (Input::get('fecha_ingreso')<>'') 
                $persona['fecha_ingreso'] = Input::get('fecha_ingreso');
            if (Input::get('fecha_retiro')<>'') 
                $persona['fecha_retiro'] = Input::get('fecha_retiro');

            $persona['paterno'] = Input::get('paterno');
            $persona['nombre'] = Input::get('nombre');
            $persona['dni'] = Input::get('dni');
            $persona['sexo'] = Input::get('sexo');
            $persona['password'] = Hash::make(Input::get('password'));
            $persona['estado'] = Input::get('estado');
            $persona['usuario_created_at'] = Auth::user()->id;
            $persona->save();
            $personaId = $persona->id;
            //si es cero no seguir, si es 1 ->estado se debe copiar de celulas
            $estado = Input::get('estado');
            if ($estado == 0 ) {
                return Response::json(
                    array(
                    'rst'=>1,
                    'msj'=>'Registro actualizado correctamente',
                    )
                );
            }

            if ( Input::has('cargos_selec') ){
                $cs=Input::get('cargos_selec');
                for( $i=0; $i<count($cs); $i++ ){
                    DB::table('cargo_persona')->insert(
                        array(
                            'estado' => 1,
                            'persona_id'=> $personaId,
                            'cargo_id' => $cs[$i],
                            'usuario_created_at' =>Auth::user()->id, 
                            'created_at' => date("Y-m-d H:i:s")
                        )
                    );
                }
            }

            $datos=array();
            if ( Input::has('visita_detalle_id') ){
                $visita_detalle_id=Input::get('visita_detalle_id');
                $alumno=new Alumno;
                $alumno->persona_id=$personaId;
                $alumno->convenio=0;
                $alumno->año=date("Y");
                $alumno->visita_detalle_id=$visita_detalle_id;
                $alumno->usuario_created_at=Auth::user()->id;
                $alumno->save();

                $datos=array(
                    'paterno'=>$persona->paterno,
                    'materno'=>$persona->materno,
                    'nombre'=>$persona->nombre,
                    'dni'=>$persona->dni,
                    'persona_id'=>$alumno->persona_id,
                    'id'=>$alumno->id
                );
            }


            DB::commit();
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro realizado correctamente',
                'datos'=>$datos
                )
            );
        }
    }

    /**
     * Update the specified resource in storage.
     * POST /persona/editar
     *
     * @return Response
     */
    public function postEditar()
    {
        if ( Request::ajax() ) {
            $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';
            $reglas = array(
                'nombre' => $required.'|'.$regex,
                'paterno' => $required.'|'.$regex,
                'email' => 'email|unique:personas,email,'.Input::get('id'),
                'dni'      => 'required|min:8|unique:personas,dni,'.Input::get('id'),
                //'password'      => 'required|min:6',
            );

            $mensaje= array(
                'required'    => ':attribute Es requerido',
                'regex'        => ':attribute Solo debe ser Texto',
            );

            $validator = Validator::make(Input::all(), $reglas, $mensaje);

            if ( $validator->fails() ) {
                return Response::json(
                    array(
                    'rst'=>2,
                    'msj'=>$validator->messages(),
                    )
                );
            }

            DB::beginTransaction();
            $personaId = Input::get('id');
            $persona = Persona::find($personaId);
            if (Input::get('materno')<>'') 
                $persona['materno'] = Input::get('materno');
            if (Input::get('email')<>'') 
                $persona['email'] = Input::get('email');
            if (Input::get('fecha_nac')<>'') 
                $persona['fecha_nacimiento'] = Input::get('fecha_nac');
            if (Input::get('direccion')<>'') 
                $persona['direccion'] = Input::get('direccion');
            if (Input::get('referencia')<>'') 
                $persona['referencia'] = Input::get('referencia');
            if (Input::get('password')<>'') 
                $persona['password'] = Hash::make(Input::get('password'));
            if (Input::get('horario')<>'') 
                $persona['horario'] = Input::get('horario');
            if (Input::get('codigo')<>'') 
                $persona['codigo'] = Input::get('codigo');
            if (Input::get('fecha_ingreso')<>'') 
                $persona['fecha_ingreso'] = Input::get('fecha_ingreso');
            if (Input::get('fecha_retiro')<>'') 
                $persona['fecha_retiro'] = Input::get('fecha_retiro');
            
            $persona['paterno'] = Input::get('paterno');
            $persona['nombre'] = Input::get('nombre');
            $persona['dni'] = Input::get('dni');
            $persona['sexo'] = Input::get('sexo');
            $persona['estado'] = Input::get('estado');
            $persona['usuario_updated_at'] = Auth::user()->id;
            $persona->save();
            
            $estado = Input::get('estado');

            DB::table('cargo_persona')
                ->where('persona_id', $personaId)
                ->update(array('estado' => 0));

            if ($estado == 0 ) {
                return Response::json(
                    array(
                    'rst'=>1,
                    'msj'=>'Registro actualizado correctamente',
                    )
                );
            }

            if ( Input::has('cargos_selec') ){
                $cs=Input::get('cargos_selec');
                for( $i=0; $i<count($cs); $i++ ){
                    $if= DB::table('cargo_persona')
                        ->where('persona_id', $personaId )
                        ->where('cargo_id', $cs[$i] )
                        ->get();
                    if( count($if)>0 ){
                        DB::table('cargo_persona')
                        ->where('persona_id', $personaId )
                        ->where('cargo_id', $cs[$i] )
                        ->update( array(
                                    'estado'=>1,
                                    'usuario_updated_at'=>Auth::user()->id, 
                                    'updated_at'=>date("Y-m-d H:i:s") 
                                    ) 
                        );
                    }
                    else{
                        DB::table('cargo_persona')->insert(
                                array(
                                    'estado' => 1,
                                    'persona_id'=> $personaId,
                                    'cargo_id' => $cs[$i],
                                    'usuario_created_at' =>Auth::user()->id, 
                                    'created_at' => date("Y-m-d H:i:s")
                                )
                            );
                    }
                }
            }
            
            DB::commit();
            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );
        }
    }

    /**
     * Changed the specified resource from storage.
     * POST /persona/cambiarestado
     *
     * @return Response
     */
    public function postCambiarestado()
    {

        if ( Request::ajax() ) {
            $persona = Persona::find(Input::get('id'));
            $persona->estado = Input::get('estado');
            $persona->usuario_updated_at = Auth::user()->id;
            $persona->save();

            return Response::json(
                array(
                'rst'=>1,
                'msj'=>'Registro actualizado correctamente',
                )
            );    

        }
    }

}
