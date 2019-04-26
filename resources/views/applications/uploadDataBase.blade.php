@extends('layouts.template')
@section('title')
    <title>Restaurer l'application</title>
    <meta name="description" content="Restaurer l'application" />
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
        <li class="active">Upload</li>
    </ul>
@endsection

@section('page-header')
    <h1>
        Upload
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            utiliser un point de restauration
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
