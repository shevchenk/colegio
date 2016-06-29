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
    @include( 'admin.colegio.js.visitapro_ajax' )
    @include( 'admin.colegio.js.visitapro' )
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Visitas Programadas
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
        <div class="box row">
            <div class="col-sm-12">
                <form name="form_filtros" id="form_filtros" method="POST" action="">
                    <div class="table-responsive">
                    <table id="t_visita" class="table table-mailbox">
                        <thead><tr></tr></thead>
                        <tbody></tbody>
                        <tfoot><tr></tr></tfoot>
                    </table>
                    </div>
                </form>
            </div>
            <form name="form_filtros" id="form_filtros" method="POST" action="">
            <div class="col-sm-12">
                <hr>
                <br>
                <table id="t_visita_detalle" class="table table-bordered">
                    <thead>
                    <tr>
                    <th>Nivel</th>
                    <th>Grado</th>
                    <th>Seccion</th>
                    <th>Turno</th>
                    <th>Total Alumnos</th>
                    <th>Total Alumnos Registrados</th>
                    <th>Ver Alumnos</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                    <th>Nivel</th>
                    <th>Grado</th>
                    <th>Seccion</th>
                    <th>Turno</th>
                    <th>Total Alumnos</th>
                    <th>Total Alumnos Registrados</th>
                    <th>Ver Alumnos</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-12">
                <hr>
                <br>
                <table id="t_alumno" class="table table-bordered">
                    <thead>
                    <tr>
                    <th>Paterno</th>
                    <th>Materno</th>
                    <th>Nombre</th>
                    <th>Dni</th>
                    <th>Convenio?</th>
                    <th>Agregar Alumno
                        <a class='form-control btn btn-primary' data-toggle="modal" data-target="#alumnoModal" data-trid="t_alumno" data-titulo="Buscar" >
                            <i class='fa fa-lg fa-plus'></i>
                        </a></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                    <th>Paterno</th>
                    <th>Materno</th>
                    <th>Nombre</th>
                    <th>Dni</th>
                    <th>Convenio?</th>
                    <th>Agregar Alumno
                        <a class='form-control btn btn-primary' data-toggle="modal" data-target="#alumnoModal" data-trid="t_alumno" data-titulo="Buscar" >
                            <i class='fa fa-lg fa-plus'></i>
                        </a></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-12">
                <hr>
                <br>
                <table id="t_alumno_detalle" class="table table-bordered">
                    <thead>
                    <tr>
                    <th>Ode</th>
                    <th>Carrera</th>
                    <th>Monto</th>
                    <th>Agregar Carrera Alumno
                        <a class='form-control btn btn-primary' data-toggle="modal" data-target="#alumnoDetalleModal" data-trid="t_alumno_detalle" data-titulo="Buscar" >
                            <i class='fa fa-lg fa-plus'></i>
                        </a></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                    <th>Ode</th>
                    <th>Carrera</th>
                    <th>Monto</th>
                    <th>Agregar Carrera Alumno
                        <a class='form-control btn btn-primary' data-toggle="modal" data-target="#alumnoDetalleModal" data-trid="t_alumno_detalle" data-titulo="Buscar" >
                            <i class='fa fa-lg fa-plus'></i>
                        </a></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            </form>
        </div>
    </section><!-- /.content -->

@stop
@section('formulario')
     @include( 'admin.colegio.form.alumno' )
     @include( 'admin.colegio.form.alumnoDetalle' )
     @include( 'admin.colegio.form.persona' )
@stop
