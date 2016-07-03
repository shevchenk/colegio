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
                <form name="form_filtros" id="form_filtros" method="POST" action="reporte/prueba">
                    <select onchange="submit();">
                        <option value="0">Solo Filtros de la tabla</option>
                        <option value="1">.::Todo::.</option>
                    </select>
                    <div class="table-responsive">
                    <table id="t_visita" class="table table-mailbox">
                        <thead>
                        <tr>
                            <th colspan='6' style='text-align:center'><h2>Visitas Proramadas</h2></th>
                        </tr>
                        <tr></tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot><tr></tr></tfoot>
                    </table>
                    </div>
                </form>
            </div>
        </div>
    </section><!-- /.content -->

@stop
@section('formulario')
@stop
