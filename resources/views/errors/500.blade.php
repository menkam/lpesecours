@extends('layouts.error')
@section('title')
    <title>Erreur interne</title>
    <meta name="description" content="401 Error Page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/home">Home</a>
        </li>
        <li class="active">Error 500</li>
    </ul>
@endsection

@section('page-header')
<h1 class="grey lighter smaller">
    <span class="blue bigger-125">
        <i class="ace-icon fa fa-random"></i>
        500
    </span>
    Something Went Wrong
</h1>
@endsection

@section('content')
<h3 class="lighter smaller">
    But we are working
    <i class="ace-icon fa fa-wrench icon-animated-wrench bigger-125"></i>
    on it!
</h3>

<div class="space"></div>
<div>
    <h4 class="lighter smaller">Meanwhile, try one of the following:</h4>

    <ul class="list-unstyled spaced inline bigger-110 margin-15">
        <li>
            <i class="ace-icon fa fa-hand-o-right blue"></i>
            Read the faq
        </li>

        <li>
            <i class="ace-icon fa fa-hand-o-right blue"></i>
            Give us more info on how this specific error occurred!
        </li>
    </ul>
</div>
@endsection
