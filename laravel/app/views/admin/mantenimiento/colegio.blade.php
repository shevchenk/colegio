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
    
	@include( 'admin.mantenimiento.js.colegio_ajax' )
	@include( 'admin.mantenimiento.js.colegio' )
	@include( 'admin.mantenimiento.js.convenio' )
	@include( 'admin.mantenimiento.js.seminario' )
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Mantenimiento de Colegio
				<small> </small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
				<li><a href="#">Mantenimientos</a></li>
				<li class="active">Mantenimiento de Colegio</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<!-- Inicia contenido -->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Filtros</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="t_colegios" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Ode</th>
										<th>Colegio</th>
										<th>Tipo</th>
										<th>Nivel</th>
										<th>Ugel</th>
										<th>Genero</th>
										<th>Turno</th>
										<th>Departamento</th>
										<th>Provincia</th>
										<th>Distritos</th>
										<th>Direcci&oacute;n</th>
										<th>Referencia</th>
										<th>Director</th>
										<th>Telefono del Colegio</th>
										<th>Celular del Colegio</th>
										<th>Email del Colegio</th>
										<th>Estado</th>
										<th> [ ] </th>
									</tr>
								</thead>
								<tbody id="tb_colegios">
								</tbody>
								<tfoot>
									<tr>
										<th>Ode</th>
										<th>Colegio</th>
										<th>Tipo</th>
										<th>Nivel</th>
										<th>Ugel</th>
										<th>Genero</th>
										<th>Turno</th>
										<th>Departamento</th>
										<th>Provincia</th>
										<th>Distritos</th>
										<th>Direcci&oacute;n</th>
										<th>Referencia</th>
										<th>Director</th>
										<th>Telefono del Colegio</th>
										<th>Celular del Colegio</th>
										<th>Email del Colegio</th>
										<th>Estado</th>
										<th> [ ] </th>
									</tr>
								</tfoot>
							</table>
							<a class='btn btn-primary btn-sm' data-toggle="modal" data-target="#colegioModal" data-titulo="Nuevo">
								<i class="fa fa-plus fa-lg"></i>&nbsp;Nuevo
							</a>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
					<!-- Finaliza contenido -->
				</div>
			</div>

		</section><!-- /.content -->
@stop

@section('formulario')
	@include( 'admin.mantenimiento.form.colegio' )
	@include( 'admin.mantenimiento.form.colegio_detalle' )
	@include( 'admin.mantenimiento.form.convenio' )
	@include( 'admin.mantenimiento.form.seminario' )
@stop
