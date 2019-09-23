@extends("layouts.template")
@section("title")
<title></title>
<meta name="description" content=" with some customizations as described in docs" />
@endsection

@section("style")

@endsection

@section("breadcrumb")
<ul class="breadcrumb">
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="/">Home</a>
    </li>
    <li><a href="#">Application</a></li>
    <li class="active"><a href="maintenance">Maintenance</a></li>
</ul>
@endsection

@section("page-header")
<h1>
    Maintenance
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Common form elements and layouts
    </small>
</h1>
@endsection

@section("content")

    @include("applications.tests.upload")
    <p><?php if(isset($result)) echo ("".$result.""); ?></p>
@endsection

@section("scripts")
    <script type="text/javascript" src=""></script>
@endsection

@section("scripts2")
<script type="text/javascript">
    $(document).ready(function(){

       
    });
</script>
@endsection