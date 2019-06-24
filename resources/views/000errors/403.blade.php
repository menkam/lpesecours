@extends('layouts.template')
@section('title')
<title>Interdit</title>
<meta name="description" content="401 Error Page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection

@section('page-header1')
<li>
    <a href="#">Other Pages</a>
</li>
<li class="active">Error 403</li>
@endsection
@section('content')
<div class="error-container">
	<div class="well">
		<h1 class="grey lighter smaller">
			<span class="blue bigger-125">
				<i class="ace-icon fa fa-random"></i>
				403
			</span>
			Something Went Wrong
		</h1>

		<hr />
		<h3 class="lighter smaller">
			Le serveur a compris la requête, mais refuse de l'exécuter. Contrairement à l'erreur 401, s'authentifier ne fera aucune différence. Sur les serveurs où l'authentification est requise, cela signifie généralement que l'authentification a été acceptée mais que les droits d'accès ne permettent pas au client d'accéder à la ressource.
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
</div>
@endsection