@extends('layouts.error')
@section('title')
<title>404 Error Page</title>
<meta name="description" content="404 Error Page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="/home">Home</a>
        </li>
        <li class="active">Error 404</li>
    </ul>
@endsection

@section('page-header')
<h1 class="grey lighter smaller">
    <span class="blue bigger-125">
        <i class="ace-icon fa fa-sitemap"></i>
        404
    </span>
    Page Not Found
</h1>
@endsection

@section('content')
<h3 class="lighter smaller">We looked everywhere but we couldn't find it!</h3>

<div>
    <form class="form-search">
        <span class="input-icon align-middle">
            <i class="ace-icon fa fa-search"></i>

            <input type="text" class="search-query" placeholder="Give it a search..." />
        </span>
        <button class="btn btn-sm" type="button">Go!</button>
    </form>

    <div class="space"></div>
    <h4 class="smaller">Try one of the following:</h4>

    <ul class="list-unstyled spaced inline bigger-110 margin-15">
        <li>
            <i class="ace-icon fa fa-hand-o-right blue"></i>
            Re-check the url for typos
        </li>

        <li>
            <i class="ace-icon fa fa-hand-o-right blue"></i>
            Read the faq
        </li>

        <li>
            <i class="ace-icon fa fa-hand-o-right blue"></i>
            Tell us about it
        </li>
    </ul>
</div>
@endsection