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
    <li><a href="#">Gestions</a></li>
    <li class="active"><a href="gestionPerso">Personnelle</a></li>
</ul>
@endsection

@section("page-header")
<h1>
    Personnelle
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Common form elements and layouts
    </small>
</h1>
@endsection

@section("content")
<div class="col-xl-12 col-sm-4 col-md-4 col-lg-4">
    <table class="table table-warning">
        <thead>
        <th colspan="2">Recap.</th>
        </thead>
        <tr>
            <td><?php if(isset($prets['libelle'])) echo $prets['libelle']; ?> : </td>
            <td><?php if(isset($prets['somme'])) echo $prets['somme'].' FCFA'; else echo " 0 FCFA" ?> </td>
        </tr>
        <tr>
            <td><?php if(isset($journaliers['libelle'])) echo $journaliers['libelle']; ?> : </td>
            <td><?php if(isset($journaliers['somme'])) echo $journaliers['somme'].' FCFA'; else echo " 0 FCFA" ?> </td>
        </tr>
        <tr>
            <td><?php if(isset($epargnes['libelle'])) echo $epargnes['libelle']; ?> : </td>
            <td><?php if(isset($epargnes['somme'])) echo $epargnes['somme'].' FCFA'; else echo " 0 FCFA" ?> </td>
        </tr>
    </table>
</div>
<div class="col-xl-12 col-sm-8 col-md-8 col-lg-8">
    <table class="table table-hover table-bordered">
        <thead class="row table-header"></thead>
        <form id="formsaveCompte_perso" name="" method="post" action="#">
            {{ csrf_field() }}
            <input type="hidden" id="typeOpp" name="typeOpp">
            <tbody>
            <tr class="form-group-sm">
                <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="date">{{ __('Date') }}</label> </td>
                <td colspan="2"><input id="dateComptePerso" type="date" class="form-control hasDatepicker" name="date" value="<?php if(isset($courentdate)) echo $courentdate; ?>" required autofocus>
                    <!--span class="input-group-addon">
                        <i class="ace-icon fa fa-calendar"></i>
                    </span-->
                </td>
            </tr>
            <tr class="form-group-sm">
                <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="type">{{ __('Type') }}</label> </td>
                <td colspan="2"><select class="form-control " id="typeComptePerso" name="type" required><?php if(isset($optiontype)) echo $optiontype; ?></select></td>
            </tr>
            <tr class="form-group-sm">
                <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="somme">{{ __('Somme') }}</label> </td>
                <td colspan="2"><input class="form-control" type="number" id="somme" name="somme" required></td>
            </tr>
            <tr class="form-group-sm">
                <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="somme">{{ __('Commentaire') }}</label> </td>
                <td colspan="2"><input class="form-control" type="text" id="commentaire" name="commentaire" value="RAS" required></td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="form-group-sm">
                <td class=""><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="saveComptePerso">{{ __('Action') }}</label> </td>
                <td colspan="2">
                    <div class="clearfix">
                        <button type="reset" class="width-10 pull-left btn btn-sm">
                            <i class="ace-icon fa fa-refresh"></i>
                            <span class="bigger-50">{{ __('Reset') }}</span>
                        </button>
 
                        <button type="submit" id="saveComptePerso" class="width-10 pull-right btn btn-sm btn-success" style="display: none">
                            <span class="bigger-50">{{ __('Save') }}</span>
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                        <button type="submit" id="updateComptePerso" class="width-10 pull-right btn btn-sm btn-warning" style="display: none">
                            <span class="bigger-50">{{ __('Update') }}</span>
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </td>
            </tr>
            </tfoot>
        </form>
    </table>
</div>
<br>
<hr>
<div class="col-xl-12 col-sm-4 col-md-4 col-lg-4 table-responsive">
    <table class="table">
        <thead class="table-header">
            <tr><td colspan="3" class="center"><b>>>> Bilan Pret</b></td></tr>
            <tr>
                <td>date</td>
                <td>Somme</td>
                <td>Commentaire</td>
            </tr>
        </thead>
        <tbody class=""><?php if(isset($rowRPret)) echo $rowRPret; ?></tbody>
    </table>
</div>
<div class="col-xl-12 col-sm-4 col-md-4 col-lg-4 table-responsive">

    <table class="table">
        <thead class="table-header">
        <tr><td colspan="3" class="center"><b>>>> Bilan Journalier</b></td></tr>
        <tr><td>date</td>
            <td>Somme</td>
            <td>Commentaire</td>
        </tr>
        </thead>
        <tbody class=""><?php if(isset($rowRJournalier)) echo $rowRJournalier; ?></tbody>
    </table>
</div>
<div class="col-xl-12 col-sm-4 col-md-4 col-lg-4 table-responsive">
    <table class="table">
        <thead class="table-header">
        <tr><td colspan="3" class="center"><b>>>> Bilan Epargne</b></td></tr>
        <tr>
            <td>date</td>
            <td>Somme</td>
            <td>Commentaire</td>
        </tr>
        </thead>
        <tbody class=""><?php if(isset($rowREpargne)) echo $rowREpargne; ?></tbody>
    </table>
</div>
@endsection

@section("scripts")

@endsection

@section("scripts2")
    <script type="text/javascript" src="js/gestions.js"></script>
@endsection