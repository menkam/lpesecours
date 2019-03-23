@extends('layouts.template')
@section('content')
    <div class="col-xs-12 col-md-2 col-sm-2 col-lg-2"></div>
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8 panel panel-primary">
        <div class="panel-heading titre">
            <marquee>Bienvenue a la Librairie Papeterie Claire Fontaine</marquee>
        </div>
        <div class="panel-body">
            <?= $galerie ?>
        </div>
        <div class="panel-footer"></div>
    </div>
@endsection

@section('scripts')
    <script src="js/home.js"></script>
    <script type="text/javascript">  $(function(){ $(".carousel").carousel({ interval: 9000 }); }) </script>
@endsection