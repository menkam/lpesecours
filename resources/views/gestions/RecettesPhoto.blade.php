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
        <a href="/">Gestions</a>
    </li>
    <li><a href="#">Photos</a></li>
    <li class="active"><a href="recette">Recettes</a></li>
</ul>
@endsection

@section("page-header")
<h1>
    Recette Photo
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Common form elements and layouts
    </small>
</h1>
@endsection

@section("content")
<div class="col-xl-12 col-md-1 col-lg-2"></div>
<div class="table-responsive col-xl-12 col-md-10 col-lg-8">
    <div class="alert alert-danger print-error-msg" style="display:none"><ul></ul></div>
    <table class="table table-hover table-bordered">
        <thead class="row table-header"></thead>
        <form id="formsaveRecettePhoto" name="" method="post" action="{{ route('saveRecettePhoto') }}">
            {{ csrf_field() }}
            <tbody>
            <tr class="form-group-sm">
                <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="date">{{ __('Date') }}</label> </td>
                <td><input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autofocus>
                </td>
            </tr>
            <tr class="form-group-sm">
                <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="type">{{ __('Type') }}</label> </td>
                <td><select class="form-control " id="type" name="type" required>
                        <?php if(isset($optionTypePhoto)) echo $optionTypePhoto;?>
                    </select>
                </td>
            </tr>
            <tr class="form-group-sm">
                <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="nombre">{{ __('Nombre') }}</label> </td>
                <td><select class="form-control" id="nombre" name="nombre" required>
                        <?php if(isset($optionNombret)) echo $optionNombret;?>
                    </select>
                </td>
            </tr>
            <tr class="form-group-sm">
                <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="prix_unitaire">{{ __('Prix Unitaire') }}</label></td>
                <td><select class="form-control" id="prix_unitaire" name="prix_unitaire" required>
                        <?php if(isset($optionPrixUnitaire)) echo $optionPrixUnitaire;?>
                    </select>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="form-group-sm">
                <td class=""><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="saverecettemomo">{{ __('Action') }}</label> </td>
                <td>
                    <div class="clearfix">
                        <button type="reset" class="width-10 pull-left btn btn-sm">
                            <i class="ace-icon fa fa-refresh"></i>
                            <span class="bigger-50">{{ __('Reset') }}</span>
                        </button>

                        <button type="submit" id="saveRecettePhoto" class="width-10 pull-right btn btn-sm btn-success">
                            <span class="bigger-50">{{ __('Save') }}</span>
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </td>
            </tr>
            </tfoot>
        </form>
    </table>
</div>
<div class="col-xl-12 col-md-1 col-lg-2"><button class="btn btn-primary"><a href="bilanPhoto">Billan</a></button></div>
@endsection

@section("scripts")

@endsection

@section("scripts2")
<script type="text/javascript" src="js/gestions.js"></script>
@endsection