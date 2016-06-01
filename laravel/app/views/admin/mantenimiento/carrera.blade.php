<!DOCTYPE html>
@extends('layouts.master')  

@section('includes')
	@parent
	@include( 'admin.mantenimiento.js.carrera_ajax' )
	@include( 'admin.mantenimiento.js.carrera' )
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Mantenimiento de Carreras
				<small> </small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
				<li><a href="#">Mantenimientos</a></li>
				<li class="active">Mantenimiento de Carreras</li>
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
							<table id="t_carreras" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Carrera</th>
										<th>Tipo</th>
										<th>Estado</th>
										<th> [ ] </th>
									</tr>
								</thead>
								<tbody id="tb_carreras">
								</tbody>
								<tfoot>
									<tr>
										<th>Carrera</th>
										<th>Tipo</th>
										<th>Estado</th>
										<th> [ ] </th>
									</tr>
								</tfoot>
							</table>
							<a class='btn btn-primary btn-sm' data-toggle="modal" data-target="#carreraModal" data-titulo="Nuevo">
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
	@include( 'admin.mantenimiento.form.carrera' )
@stop
