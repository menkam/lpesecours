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
            <td colspan="2">Informations Utiles :</td>
        </thead>
        <tbody>
            <tr>
                <td>Fond</td>
                <td>250.000</td>
            </tr>
            <tr>
                <td>Prêt</td>
                <td>40.000</td>
            </tr>
        </tbody>
        <tfoot>
            <td>TOTAL :</td>
            <td>290.000</td>
        </tfoot>
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
                    <td><input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autofocus>
                    </td>
                </tr>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="fond">{{ __('Fond') }}</label> </td>
                    <td><input class="form-control " type="number" id="fond" name="fond" required></td>
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

                            <button type="submit" id="saveRecetteMomo" class="width-10 pull-right btn btn-sm btn-success">
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#saveRecetteMomo").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var date = $("input[name='date']").val();
            var fond = $("input[name='fond']").val();
            var pret = $("input[name='pret']").val();
            var espece = $("input[name='espece']").val();
            var compte_momo = $("input[name='compte_momo']").val();
            var compte2 = $("input[name='compte2']").val();
            var frais_transfert = $("input[name='frais_transfert']").val();
            var commission = $("input[name='commission']").val();

            //alert ("date:"+date+"\nfond:"+fond+"\npret:"+pret+"\nespece:"+espece+"\ncompte_momo:"+compte_momo+"\ncompte2:"+compte2+"\nfrais_transfert:"+frais_transfert+"\ncommission:"+commission);

            $.ajax({
                url: "saveRecetteMomo",
                type:'POST',
                data: {
                    _token:_token,
                    date:date,
                    fond:fond,
                    pret:pret,
                    espece:espece,
                    compte_momo:compte_momo,
                    compte2:compte2,
                    frais_transfert:frais_transfert,
                    commission:commission
                },
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        tostSuccess(data.success);
                        $("#saveRecetteMomo").reset;
                    }else{
                        //printErrorMsg(data.error);
                        tostErreur(data.error);
                    }
                }
            });

        });


        /*function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").empty();
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }*/
    });


</script>
@endsection