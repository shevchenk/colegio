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

    @include('admin.js.slct_global_ajax')
    @include('admin.js.slct_global')
    @include('admin.reporte.js.seminario_ajax')
    @include('admin.reporte.js.seminario')
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Seminario<small> </small></h1>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="box row">
            <div class="col-sm-12">
                <form name="form_filtros" id="form_filtros" method="POST" action="reporte/seminario">
                    <select name='slct_todo'>
                        <option value="">Seleccione</option>
                        <option value="0">Solo Filtros de la tabla</option>
                        <option value="1">.::Todo::.</option>
                    </select>
                    <div class="table-responsive">
                        <table id="t_seminario" class="table table-mailbox">
                            <thead>
                                <tr>
                                    <th colspan='10' style='text-align:center'><h2>Seminarios</h2></th>
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
