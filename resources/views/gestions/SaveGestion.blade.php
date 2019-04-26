@extends('layouts.template')
@section('title')
    <title>Save Gestions Modul</title>
    <meta name="description" content="Sauvegade des données" />
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
            <a href="#">Gestions</a>
        </li>
        <li class="active">Save</li>
    </ul>
@endsection

@section('page-header')
    <h1>
        Save
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Sauvegarde des données
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
