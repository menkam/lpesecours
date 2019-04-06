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
<div class=""><?php if(isset($result)) echo $result; ?>
    <form method="POST">
      <input type="hidden" name="_token" value="Q6eCVDWjm9g4zidNkwtmsb4rqAUBdD11ljtTfFVS">
      <input type="text" name="param" id="param" value="param">
      <input type="submit" name="send" id="send">
    </form>
    <p>
      Reponse : <small id="reponse"></small>
    </p>
</div>
@endsection

@section("scripts")

@endsection

@section("scripts2")

@endsection