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
	@include('admin.reporte.js.indicedata_ajax')
	@include('admin.reporte.js.indicedata')
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')

<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Indice de Data<small> </small></h1>
	</section>

	<!-- Main content -->
	<!-- Main content -->
	<section class="content">
		<div class="box row">
			
				<form name="form_filtros" id="form_filtros" method="POST" action="reporte/indicedata">
					<div class="col-sm-6">
						<select name='slct_todo' class="form-control">
							<option value="">Seleccione</option>
							<option value="0">Solo Filtros de la tabla</option>
							<option value="1">.::Todo::.</option>
						</select>
					</div>
					<div class="col-sm-3 text-right">
						Fecha de actualizaci&oacute;n:
					</div>
					<div class="col-sm-3">
						<input type="text" name="txt_fecha_actual" value="<?php echo date("Y-m-d")?>" class="form-control" id="txt_fecha_actual" />
					</div>
					<div class="col-sm-12">
						<div class="table-responsive">
							<table id="t_indicedata" class="table table-mailbox">
								<thead>
									<tr>
										<th colspan='6' style='text-align:center'><h2>Indice de Data</h2></th>
									</tr>
									<tr></tr>
								</thead>
								<tbody></tbody>
								<tfoot><tr></tr></tfoot>
							</table>
						</div>
					</div>
				</form>

		</div>
	</section><!-- /.content -->

@stop
@section('formulario')
@stop
