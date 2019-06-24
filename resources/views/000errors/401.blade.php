@extends('layouts.template')
@section('title')
	<title>Non autorisé</title>
	<meta name="description" content="401 Error Page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection

@section('breadcrumb')
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="/home">Home</a>
		</li>
		<li class="active">Error 401</li>
	</ul>
@endsection

@section('page-header')
	<h1>
		ERROR
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			401
		</small>
	</h1>
@endsection

@section('content')
	<div class="well">
		<h1 class="grey lighter smaller">
			<span class="blue bigger-125">
				<i class="ace-icon fa fa-random"></i>
				401
			</span>
			Accès restraint
		</h1>

		<hr />
		<h3 class="lighter smaller">
			Une authentification est nécessaire pour accéder à la ressource.
		</h3>

		<hr />
		<div class="space"></div>

		<div class="center">
			<a href="javascript:history.back()" class="btn btn-grey">
				<i class="ace-icon fa fa-arrow-left"></i>
				Go Back
			</a>

			<a href="#" class="btn btn-primary">
				<i class="ace-icon fa fa-tachometer"></i>
				Dashboard
			</a>
		</div>
	</div>
@endsection
