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

    {{ HTML::style('lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
    {{ HTML::script('lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
    {{ HTML::script('lib/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}

    @include('admin.js.slct_global_ajax')
    @include('admin.js.slct_global')

    @include('admin.reporte.js.alumno_ajax')
    @include('admin.reporte.js.alumno')
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Producción<small> </small></h1>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="box row">
            <div class="col-sm-12">
                <form name="form_filtros" id="form_filtros" method="POST" action="reporte/alumnos">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <label class="control-label">Ode:</label>
                            <select class="form-control" name="slct_ode[]" id="slct_ode" onChange="Cargar();" multiple>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <label class="control-label">Distrito:</label>
                            <select class="form-control" name="slct_distrito[]" id="slct_distrito" multiple>
                                <option>.::Seleccione::.</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <label class="control-label">Fecha Inicio Visita:</label>
                            <div class="input-group">
                                <span id="spn_fecha_ini" class="input-group-addon" style="cursor: pointer;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                <input type="text" class="form-control fecha"  id="txt_fecha_inicio" name="txt_fecha_inicio" readonly/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Fecha Final Visita:</label>
                            <div class="input-group">
                                <span id="spn_fecha_fin" class="input-group-addon" style="cursor: pointer;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                <input type="text" class="form-control fecha"  id="txt_fecha_final" name="txt_fecha_final" readonly/>
                            </div>
                        </div>
                        <div class="col-sm-1" style="padding:24px" >
                            <a type="submit" class="btn btn-primary form-control" name="btn_reporte" id="btn_reporte">
                                <i class="fa fa-lg fa-file-excel-o"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-1">
                            <label class="control-label"></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section><!-- /.content -->

@stop
@section('formulario')
@stop
