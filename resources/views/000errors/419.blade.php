@extends('layouts.template')
@section('title')
<title>Non autorisé</title>
<meta name="description" content="419 Error Page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection

@section('page-header1')
<li>
    <a href="#">Other Pages</a>
</li>
<li class="active">Error 419</li>
@endsection
@section('content')
<div class="error-container">
	<div class="well">
		<h1 class="grey lighter smaller">
			<span class="blue bigger-125">
				<i class="ace-icon fa fa-random"></i>
				419
			</span>
			Something Went Wrong
		</h1>

		<hr />
		<h3 class="lighter smaller">
			La page a expiré en raison de l'inactivité.
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