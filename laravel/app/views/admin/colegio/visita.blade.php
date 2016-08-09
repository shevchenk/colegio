<!DOCTYPE html>
@extends('layouts.master')  

@section('includes')
    @parent
    {{ HTML::style('lib/daterangepicker/css/daterangepicker-bs3.css') }}
    {{ HTML::style('lib/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}
    {{ HTML::script('lib/daterangepicker/js/daterangepicker.js') }}
    {{ HTML::script('lib/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') }}
    {{ HTML::script('//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js') }}
    {{ HTML::script('lib/daterangepicker/js/daterangepicker_single.js') }}
    
    
    @include( 'admin.js.slct_global_ajax' )
    @include( 'admin.js.slct_global' )
    @include( 'admin.colegio.js.visita_ajax' )
    @include( 'admin.colegio.js.visita' )
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Programar visitas
            <small> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#">Proceso</a></li>
            <li class="active">Asignación y Programación</li>
        </ol>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <form id="form_vista" name="form_vista" method="post">
            <div class="box row">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <h2 style='text-align:center; background-color:#A7C0DC;' class="control-label">PROGRAMACIÓN</h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-2">
                        <label class="control-label">Fecha y Hora Visita:</label>
                        <input type="text" class="form-control fechaDP" name="txt_fecha_visita" id="txt_fecha_visita" readonly>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-2">
                        <label class="control-label">Tiempo Programado:</label>
                        <input type="text" class="form-control" name="txt_tiempo_programado" id="txt_tiempo_programado">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <label class="control-label">Ode:</label>
                        <select class="form-control" name="slct_ode" id="slct_ode" onChange="Cargar('dis',this.value);"></select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <label class="control-label">Distrito:</label>
                        <select class="form-control" name="slct_distrito" id="slct_distrito" onChange="Cargar('col',this.value);">
                            <option>.::Seleccione::.</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <label class="control-label">Colegio:</label>
                        <input class="form-control" type="hidden" name="txt_colegio_id" id="txt_colegio_id">
                        <input class="form-control" type="text" name="txt_colegio" id="txt_colegio" readonly>
                    </div>
                    <div class="col-sm-1">
                        <label class="control-label"></label>
                        <a class="form-control btn btn-primary" onClick="Mostrar('col');" id="buscar" name="buscar">
                            <i class="fa fa-lg fa-search"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div id="div_colegio" class="box row table-responsive" style="display:none">
                        <table id="t_colegio" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Colegio</th>
                                    <th>Telefono</th>
                                    <th>Celular</th>
                                    <th>Dirección</th>
                                    <th> [ ] </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div id="div_colegio_detalle" class="box row table-responsive">
                        <table id="t_colegio_detalle" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Grado</th>
                                    <th>Sección</th>
                                    <th>Nivel</th>
                                    <th>Turno</th>
                                    <th>Total Alumnos</th>
                                    <th> [ ] </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <h2 style='text-align:center; background-color:#A7C0DC;' class="control-label">CONTACTO</h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <label class="control-label">Persona que se Contactó:</label>
                        <input class="form-control" type="text" name="txt_personac" id="txt_personac">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-3">
                        <label class="control-label">Nro telefónico que se contactó:</label>
                        <input type="text" class="form-control" name="txt_nro_tel" id="txt_nro_tel">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <h2 style='text-align:center; background-color:#A7C0DC;' class="control-label">TRABAJADOR</h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <label class="control-label">Trabajador que visitará:</label>
                        <input class="form-control" type="hidden" name="txt_persona_id" id="txt_persona_id">
                        <input class="form-control" type="text" name="txt_persona" id="txt_persona" readonly>
                    </div>
                    <div class="col-sm-1">
                        <label class="control-label"></label>
                        <a class="form-control btn btn-primary" onClick="Mostrar('pvi');" id="buscar" name="buscar">
                            <i class="fa fa-lg fa-search"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                    <h2 style='text-align:center; background-color:#A7C0DC;' class="control-label">TELECITA</h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <label class="control-label">Trabajador:</label>
                        <input class="form-control" type="hidden" name="txt_personat_id" id="txt_personat_id">
                        <input class="form-control" type="text" name="txt_personat" id="txt_personat" readonly>
                    </div>
                    <div class="col-sm-1">
                        <label class="control-label"></label>
                        <a class="form-control btn btn-primary" onClick="Mostrar('pte');" id="buscar" name="buscar">
                            <i class="fa fa-lg fa-search"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-3">
                        <label class="control-label">Fecha:</label>
                        <input type="text" class="form-control fechaG" readonly name="txt_fechat" id="txt_fechat">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div id="div_persona" class="box row table-responsive" style="display:none">
                        <table id="t_persona" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Paterno</th>
                                    <th>Materno</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th> [ ] </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <label class="control-label">Observación:</label>
                        <textarea class="form-control" name="txt_observacion" id="txt_observacion">S/O</textarea>
                    </div>
                </div>
            </div>
            <div class="box row">
                <div class="col-sm-1">
                    <a class="form-control btn btn-primary" id="buscar" name="buscar" onClick="Guardar();">
                        <i class="fa fa-lg fa-save"></i>
                    </a>
                </div>
            </div>
        </form>
    </section><!-- /.content -->

@stop
@section('formulario')
     
@stop
