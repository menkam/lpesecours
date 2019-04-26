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
<div class=""><?php if(isset($result)) echo $result; ?></div>
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