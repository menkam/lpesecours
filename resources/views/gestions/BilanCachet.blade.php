@extends("gestions.Bilans")

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
    <li><a href="#">Cachet</a></li>
    <li class="active"><a href="bilanCachet">Bilan</a></li>
</ul>
@endsection

@section("page-header")
<h1>
    Bilan Cachet
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Common form elements and layouts
    </small>
</h1>
@endsection

@section("content_bilan")
    <div class="row">
        <div class="col-xs-12">

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                Results for "Latest Registered"
            </div>

            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            @include('gestions.TableBilan')
        </div>
    </div>
@endsection