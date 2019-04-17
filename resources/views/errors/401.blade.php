@extends('layouts.error')
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
<h1 class="grey lighter smaller">
	<span class="blue bigger-125">
		<i class="ace-icon fa fa-random"></i>
		401
	</span>
	Accès restraint
</h1>
@endsection

@section('content')
<h3 class="lighter smaller">
	Une autorisation est nécessaire pour accéder à la ressource <?php echo "demandée"; ?>.
</h3>
@endsection
