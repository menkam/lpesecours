@extends('layouts.error')
@section('title')
<title>Interdit</title>
<meta name="description" content="401 Error Page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/home">Home</a>
        </li>
        <li class="active">Error 403</li>
    </ul>
@endsection

@section('page-header')
<h1 class="grey lighter smaller">
    <span class="blue bigger-125">
        <i class="ace-icon fa fa-sitemap"></i>
        403
    </span>
    Something Went Wrong
</h1>
@endsection

@section('content')
<h3 class="lighter smaller">
	Le serveur a compris la requête, mais refuse de l'exécuter. Contrairement à l'erreur 401, s'authentifier ne fera aucune différence. Sur les serveurs où l'authentification est requise, cela signifie généralement que l'authentification a été acceptée mais que les droits d'accès ne permettent pas au client d'accéder à la ressource.
</h3>
@endsection