@extends('layouts.template')
@section('title')
    <title>Update gestions Modul</title>
    <meta name="description" content="Mise à jours des données" />
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
        <li class="active">Update</li>
    </ul>
@endsection

@section('page-header')
    <h1>
        Update
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Mise à jours des données
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
