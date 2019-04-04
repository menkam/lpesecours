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
    <li><a href="#">MoMo</a></li>
    <li class="active"><a href="recette">Recette</a></li>
</ul>
@endsection

@section("page-header")
<h1>
    Recettes MoMo
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Point journalier
    </small>
</h1>
@endsection

@section("content")
<div class="col-xl-12 col-md-1 col-lg-2">
    <table class="table table-warning">
        <thead>
            <th colspan="2">Informations Utiles : <br>du <?php if(isset($lastDate)) echo $lastDate; ?></th>
        </thead>
        <tbody>
            <tr>
                <td>Fond</td>
                <td><?php if(isset($lastFond)) echo $lastFond; ?></td>
            </tr>
            <tr>
                <td>Prêts</td>
                <td><?php if(isset($pret)) echo $pret; ?></td>
            </tr>
            <tr>
                <td>TOTAL :</td>
                <td><?php if(isset($total)) echo $total; ?></td>
            </tr>
            <tr>
                <td>Commissions</td>
                <td><?php if(isset($lastComm)) echo $lastComm; ?></td>
            </tr>
        </tbody>

    </table>
</div>
<div class="table-responsive col-xl-12 col-md-10 col-lg-8">
    <div class="alert alert-danger print-error-msg" style="display:none"><ul></ul></div>
    <table class="table table-hover table-bordered">
        <thead class="row table-header"></thead>
        <form id="formsaveRecetteMomo" name="" method="post" action="{{ route('saveRecetteMomo') }}">
            {{ csrf_field() }}
            <tbody>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="date">{{ __('Date') }}</label> </td>
                    <td><input id="date" type="date" class="form-control datej" name="date" value="<?php if(isset($courentdate)) echo $courentdate; ?>" required autofocus>
                    </td>
                </tr>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="fond">{{ __('Fond') }}</label> </td>
                    <td><input class="form-control " type="text" id="" name="" value="<?php if(isset($lastFond)) echo $lastFond; ?> FCFA" disabled></td>
                    <input class="form-control " type="hidden" id="fond" name="fond" value="<?php if(isset($lastFond2)) echo $lastFond2; ?>" required>
                </tr>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="pret">{{ __('Prêt') }}</label> </td>
                    <td><input class="form-control" type="number" id="pret" name="pret" required></td>
                </tr>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="espece">{{ __('Espèce') }}</label></td>
                    <td><input class="form-control" type="number" id="espece" name="espece" required></td>
                </tr>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="compte_momo">{{ __('CompteMomo') }}</label> </td>
                    <td><input  class="form-control" type="number" id="compte_emomo" name="compte_momo" required></td>
                </tr>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="compte2">{{ __('Compte2') }}</label> </td>
                    <td><input class="form-control" type="number" id="compte2" name="compte2" required></td>
                </tr>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="frais_transfert">{{ __('FraisTransfère') }}</label> </td>
                    <td><input class="form-control" type="number" id="frais_transfert" name="frais_transfert" required></td>
                </tr>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="commission">{{ __('Commission') }}</label> </td>
                    <td><input class="form-control" type="number" id="commission" name="commission" required></td>
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

                            <button type="submit" id="saveRecetteMoMo" class="width-10 pull-right btn btn-sm btn-success">
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
<div class="col-xl-12 col-md-1 col-lg-2"></div>
@endsection

@section("scripts")

@endsection

@section("scripts2")
<script type="text/javascript" src="js/gestions.js"></script>
@endsection