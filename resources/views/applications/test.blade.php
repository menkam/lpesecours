@extends('layouts.template')
@section('title')
    <title>Page-Test</title>
    <meta name="description" content="Page de test" />
@endsection

@section('style')

@endsection

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="home">Home</a>
        </li>

        <li>
            <a href="#">Applications</a>
        </li>
        <li class="active">Test</li>
    </ul>
@endsection

@section('page-header')
    <h1>
        Test
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Cette page est conçue uniquement pour les tests
        </small>
    </h1>
@endsection

@section('content')
    <button id="btest" class="btn btn-primary">bouton</button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addClasse">Ajouter une classe</button>

    <li>
        <a href="#" class="tooltip-success" data-toggle="modal" data-target="#addClasse" data-rel="tooltip" title="Edit">
            <span class="green">
                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
            </span>
        </a>
    </li>

    <!-- formulaire d'ajout d'une classe à une activité -->
    <div class="modal fade" id="addClasse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h6 class="modal-title" id="myModalLabel">Ajouter une classe</h6>
                </div>
                <div class="modal-body">
                    <form data-toggle="validator" action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group"  style="">
                            <label class="control-label" for="idClasseActivite">Classe :</label>
                            <select name="idClasseActivite" id="idClasseActivite" class="form-control" data-error="Choisir une classe." required ></select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn saveClasseActivite btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning crud-reset-edit">Effacer</button>
                            <button class="btn btn-default close crud-close-edit" data-dismiss="modal" aria-label="Close">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

@section('scripts2')
<script type="text/javascript">
    $(document).ready(function () {

        $("#btest").click(function (e) {
            e.preventDefault();
            alert("ok");
        });
    });
</script>
@endsection
