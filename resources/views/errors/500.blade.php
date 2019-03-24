@extends('layouts.template')
@section('title')
<title>404 Error Page</title>
<meta name="description" content="404 Error Page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@endsection

@section('page-header1')
<li>
    <a href="#">Other Pages</a>
</li>
<li class="active">Error 404</li>
@endsection
@section('content')
<div class="error-container">
    <div class="well">
        <h1 class="grey lighter smaller">
            <span class="blue bigger-125">
                <i class="ace-icon fa fa-sitemap"></i>
                404
            </span>
            Page Not Found
        </h1>

        <hr />
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

        <hr />
        <div class="space"></div>

        <div class="center">
            <a href="javascript:history.back()" class="btn btn-grey">
                <i class="ace-icon fa fa-arrow-left"></i>
                Go Back
            </a>

            <a href="{{ url('/home') }}" class="btn btn-primary">
                <i class="ace-icon fa fa-tachometer"></i>
                Home
            </a>
        </div>
    </div>
</div>
@endsection