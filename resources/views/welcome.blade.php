@extends('layouts.template')
@section('title')
<title>Welcome</title>
<meta name="description" content="Mailbox with some customizations as described in docs" />
@endsection

@section('style')

@endsection

@section('breadcrumb')
<ul class="breadcrumb">
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="/homme">Home</a>
    </li>
</ul>
@endsection

@section('page-header')
<h1>
    Home
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Page d'accueil
    </small>
</h1>
@endsection

@section('content')
<div class="col-xs-12 col-md-2 col-sm-2 col-lg-2"></div>
<div class="col-xs-12 col-md-8 col-sm-8 col-lg-8 panel panel-primary">
    <div class="panel-heading titre">
        <marquee>Bienvenue a la Librairie Papeterie Claire Fontaine</marquee>
    </div>
    <div class="panel-body">
        <?= $galerie ?>
    </div>
    <div class="panel-footer"></div>
</div>
@endsection

@section('scripts')

@endsection

@section('scripts2')
<script type="text/javascript">  $(function(){ $(".carousel").carousel({ interval: 9000 }); }) </script>
@endsection
