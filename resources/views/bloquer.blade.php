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
        <li class="active"><a href="contact">Utilisateur Bloquer</a></li>
    </ul>
@endsection

@section("page-header")
    <h1>
        Utilisateur Bloquer
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Common form elements and layouts
        </small>
    </h1>
@endsection

@section("content")
<div class="row">
    <div class="col col-md-10 col-md-offset-1">
        <div class="alert alert-warning" style="text-align: center; margin-top: 20%">
            <h2>Lpe Secours</h2><br/>
            <i class="fa fa-warning" style="font-size: 6em"></i><br/>
            <h3>Votre Compte a ete Desactiver!!!!</h3><br/>
            <h4>Veiller contacter l'administrateur ===> <a href="www.github/menkam.com">men_franc</a></h4><br/>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </div>
    </div>
</div>
@endsection

@section("scripts")

@endsection

@section("scripts2")

@endsection
