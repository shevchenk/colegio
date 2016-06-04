<!DOCTYPE html>
@extends('layouts.master')  

@section('includes')
	@parent
	@include( 'admin.mantenimiento.js.colegio_ajax' )
	@include( 'admin.mantenimiento.js.colegio' )
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
										<th>Departamento</th>
										<th>Provincia</th>
										<th>Distritos</th>
										<th>Direcci&oacute;n</th>
										<th>Referencia</th>
										<th>Personal</th>
										<th>Telefono</th>
										<th>Celular</th>
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
										<th>Departamento</th>
										<th>Provincia</th>
										<th>Distritos</th>
										<th>Direcci&oacute;n</th>
										<th>Referencia</th>
										<th>Personal</th>
										<th>Telefono</th>
										<th>Celular</th>
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
@stop
