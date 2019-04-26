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
<div class="">
    <h2>Upload Fichier CSV</h2>
    <form class="" data-toggle="validator" action="uploadDataBase" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-8 col-md-10">
                <input class="form-control" type="file" name="fichierCSV" id="fileUpload"  data-error="Choisir un fichier CSV."required>
            </div>
            <div class="col-xs-4 col-md-2">
                <input class="btn btn-success form-control" type="submit" name="submit" value="Upload">
            </div>
        </div>
    </form>
    <div class="col-md-12"><strong>Note:</strong> Seul le format <b>.csv</b> est autorisé jusqu'à une taille maximale de 5 Mo.</div>
    <p><?php if(isset($result)) echo $result; ?></p>
</div>
@endsection

@section('scripts')

@endsection

@section('scripts2')
    <script src="js/aaaaa.js"></script>
@endsection
