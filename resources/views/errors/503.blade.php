@extends('layouts.error')
@section('title')
<title>Service indisponible</title>
<meta name="description" content="503 Error Page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/home">Home</a>
        </li>
        <li class="active">Error 503</li>
    </ul>
@endsection

@section('page-header')
<h1 class="grey lighter smaller">
    <span class="blue bigger-125">
        <i class="ace-icon fa fa-sitemap"></i>
        503
    </span>
    Something Went Wrong 
</h1>
@endsection

@section('content')
<h3 class="lighter smaller">
	Service temporairement indisponible ou en maintenance.
</h3>
@endsection
