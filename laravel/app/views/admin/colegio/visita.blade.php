<!DOCTYPE html>
@extends('layouts.master')  

@section('includes')
    @parent
    {{ HTML::style('lib/daterangepicker/css/daterangepicker-bs3.css') }}
    {{ HTML::style('lib/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}
    {{ HTML::script('lib/daterangepicker/js/daterangepicker.js') }}
    {{ HTML::script('lib/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') }}
    
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
            Asignar colegio a una campaña y Programar visitas
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
                        <input class="form-control" type="text" name="txt_colegio" id="txt_colegio" readonly>
                    </div>
                    <div class="col-sm-1">
                        <label class="control-label"></label>
                        <a class="form-control btn btn-primary" onClick="Mostrar('col');" id="buscar" name="buscar">
                            <i class="fa fa-lg fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div id="div_colegio" class="box row table-responsive" style="display:none">
                <div class="col-sm-12">
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
            <div class="box row">
                <div class="col-sm-1">
                    <a class="form-control btn btn-primary" id="buscar" name="buscar">
                        <i class="fa fa-lg fa-save"></i>
                    </a>
                </div>
            </div>
        </form>
    </section><!-- /.content -->

@stop
@section('formulario')
     
@stop
