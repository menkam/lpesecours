@extends('layouts.template')
@section('title')
    <title>creer un point de restauration de l'application</title>
    <meta name="description" content="creation d'un point de restauration de l'application" />
@endsection

@section('style')

@endsection

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/home">Home</a>
        </li>

        <li>
            <a href="#">Application</a>
        </li>
        <li class="active">Download</li>
    </ul>
@endsection

@section('page-header')
    <h1>
        Download
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            creer un point de restauration
        </small>
    </h1>
@endsection

@section('content')
    <div class=""><?php if(isset($result)) echo $result; ?></div>
@endsection

@section('scripts')

@endsection

@section('scripts2')
    <script src="js/aaaaa.js"></script>
@endsection
