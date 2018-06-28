<!DOCTYPE html>
@extends('layouts.master')

@section('includes')
	@parent

	{{ HTML::style('lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
	{{ HTML::script('lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
	{{ HTML::script('lib/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}

	@include('admin.reporte.js.distribucion_ajax')
	@include('admin.reporte.js.distribucion')
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')

<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Distribuci&oacute;n de Colegios<small> </small></h1>
	</section>

	<!-- Main content -->
	<!-- Main content -->
	<section class="content">
		<div class="box row">
			<div class="col-sm-12">
				<form name="form_filtros" id="form_filtros" method="POST" action="reporte/distribucion">
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
                            <a class='btn btn-success btn-md' id="btnexport" name="btnexport" href='' target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Export</i></a>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</section><!-- /.content -->

@stop
@section('formulario')
@stop
