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
    @include( 'admin.mantenimiento.js.colegio_ajax' )
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
                    <table id="t_visita" class="table table-mailbox table-hover">
                        <thead>
                        <tr>
                            <th colspan='6' style='text-align:center; background-color:#A7C0DC;'><h2>VISITA PROGRAMADAS</h2></th>
                        </tr>
                        <tr></tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot><tr></tr></tfoot>
                    </table>
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                <h2 style='text-align:center; background-color:#A7C0DC;' class="control-label">VISITA</h2>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-3">
                    <label class="control-label">Fecha Visita:</label>
                    <input class="form-control" type="text" onchange="ActualizarFecha(this);" name="txt_fecha_visita2" id="txt_fecha_visita2" readonly>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                <h2 style='text-align:center; background-color:#A7C0DC;' class="control-label">TRABAJADOR</h2>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="control-label">Trabajador que visitó:</label>
                    <input class="form-control" type="hidden" name="txt_persona2_id" id="txt_persona2_id">
                    <input class="form-control" type="text" name="txt_persona2" id="txt_persona2" readonly>
                </div>
                <div class="col-sm-1">
                    <label class="control-label"></label>
                    <a class="form-control btn btn-primary" onClick="Mostrar('pvi');" id="buscar" name="buscar">
                        <i class="fa fa-lg fa-search"></i>
                    </a>
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
                <div class="col-sm-12">
                <h2 style='text-align:center; background-color:#A7C0DC;' class="control-label">CONTACTO POSTERIOR A VISITA</h2>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="control-label">Contacto:</label>
                    <input class="form-control" onblur="ActualizarContactoP(this);" type="text" name="txt_contacto" id="txt_contacto">
                </div>
                <div class="col-sm-6">
                    <label class="control-label">Cargo:</label>
                    <input class="form-control" onblur="ActualizarContactoP(this);" type="text" name="txt_cargo" id="txt_cargo">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="control-label">Email:</label>
                    <input class="form-control" onblur="ActualizarContactoP(this);" type="text" name="txt_email" id="txt_email">
                </div>
                <div class="col-sm-6">
                    <label class="control-label">Teléfono:</label>
                    <input class="form-control" onblur="ActualizarContactoP(this);" type="text" name="txt_telefono" id="txt_telefono">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                  <label class="control-label">Como te encuentro en Facebook:</label>
                  <input type="text" class="form-control" onblur="ActualizarContactoP(this);" placeholder="Ingrese Facebook" name="txt_facebook" id="txt_facebook">
                </div>
                <div class="col-sm-6">
                  <label class="control-label">Como te encuentro en Instagram:</label>
                  <input type="text" class="form-control" onblur="ActualizarContactoP(this);" placeholder="Ingrese Instagram" name="txt_instagram" id="txt_instagram">
                </div>
              </div>
            <form name="form_filtros" id="form_filtros" method="POST" action="">
            <div class="col-sm-12">
                <hr>
                <br>
                <table id="t_visita_detalle" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th colspan='8' style='text-align:center; background-color:#A7C0DC;'><h2>GRADO Y SECCIONES DEL COLEGIO</h2></th>
                    </tr>
                    <tr>
                    <th style="background-color:#DCE6F1;">Nivel</th>
                    <th style="background-color:#DCE6F1;">Grado</th>
                    <th style="background-color:#DCE6F1;">Seccion</th>
                    <th style="background-color:#DCE6F1;">Turno</th>
                    <th style="background-color:#DCE6F1;">Total Alumnos</th>
                    <th style="background-color:#DCE6F1;">Total Alumnos Registrados</th>
                    <th style="background-color:#DCE6F1;width: 350px;">Promotor</th>
                    <th style="background-color:#DCE6F1;">Ver Alumnos</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                    <th style="background-color:#DCE6F1;">Nivel</th>
                    <th style="background-color:#DCE6F1;">Grado</th>
                    <th style="background-color:#DCE6F1;">Seccion</th>
                    <th style="background-color:#DCE6F1;">Turno</th>
                    <th style="background-color:#DCE6F1;">Total Alumnos</th>
                    <th style="background-color:#DCE6F1;">Total Alumnos Registrados</th>
                    <th style="background-color:#DCE6F1;width: 350px;">Promotor</th>
                    <th style="background-color:#DCE6F1;">Ver Alumnos</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-12">
                <hr>
                <br>
                <table id="t_alumno" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th colspan='5' style='text-align:center; background-color:#A7C0DC;'><h2>ALUMNOS</h2></th>
                    </tr>
                    <tr>
                    <th style="background-color:#DCE6F1;">Paterno</th>
                    <th style="background-color:#DCE6F1;">Materno</th>
                    <th style="background-color:#DCE6F1;">Nombre</th>
                    <th style="background-color:#DCE6F1;">Dni</th>
                    <th style="background-color:#DCE6F1;">Agregar Alumno
                        <a class='form-control btn btn-primary' data-toggle="modal" data-target="#alumnoModal" data-trid="t_alumno" data-titulo="Buscar" >
                            <i class='fa fa-lg fa-plus'></i>
                        </a></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                    <th style="background-color:#DCE6F1;">Paterno</th>
                    <th style="background-color:#DCE6F1;">Materno</th>
                    <th style="background-color:#DCE6F1;">Nombre</th>
                    <th style="background-color:#DCE6F1;">Dni</th>
                    <th style="background-color:#DCE6F1;">Agregar Alumno
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
                <table id="t_alumno_detalle" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th colspan='3' style='text-align:center; background-color:#A7C0DC;'><h2>CARRERA DEL ALUMNO</h2></th>
                    </tr>
                    <tr>
                    <th style="background-color:#DCE6F1;">Carrera</th>
                    <th style="background-color:#DCE6F1;">Monto</th>
                    <th style="background-color:#DCE6F1;">Agregar Carrera Alumno
                        <a class='form-control btn btn-primary' data-toggle="modal" data-target="#alumnoDetalleModal" data-trid="t_alumno_detalle" data-titulo="Buscar" >
                            <i class='fa fa-lg fa-plus'></i>
                        </a></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                    <th style="background-color:#DCE6F1;">Carrera</th>
                    <th style="background-color:#DCE6F1;">Monto</th>
                    <th style="background-color:#DCE6F1;">Agregar Carrera Alumno
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
     @include( 'admin.colegio.form.promotor' )
@stop
