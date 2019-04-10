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
    <form id="formsaveRecettemomo" name="" method="post" action="">
            {{ csrf_field() }}
            <tbody>
                <tr class="form-group-sm">
                    <td><label class="form-control-label col-xl-6 col-md-2 col-lg-1" for="type">{{ __('Type') }}</label> </td>
                    <td><input type="text" class="form-control " id="type" name="type" required>
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

                        <button type="submit" id="sendtest" class="width-10 pull-right btn btn-sm btn-success">
                            <span class="bigger-50">{{ __('Save') }}</span>
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </td>
            </tr>
            </tfoot>
        </form>
    <p>
      Reponse : <small id="reponse"></small>
    </p>
</div>
@endsection

@section("scripts")

@endsection

@section("scripts2")
<script type="text/javascript">
    $(document).ready(function(){

        $("#sendtest").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var param = $("input[name='type']").val();
            var reponse = $("#reponse");

            //alert ("date:"+date+"\nfond:"+fond+"\npret:"+pret+"\nespece:"+espece+"\ncompte_momo:"+compte_momo+"\ncompte2:"+compte2+"\nfrais_transfert:"+frais_transfert+"\ncommission:"+commission);

            $.ajax({
                url: "http://lpesecours.herokuapp.com/",
                //url: "testpost",
                type:'POST',
                data: {
                    _token:_token,
                    param:param
                },
                success: function(data) {
                    reponse.empty();
                    reponse.append(data);
                }
            });

        });
    });
</script>
@endsection