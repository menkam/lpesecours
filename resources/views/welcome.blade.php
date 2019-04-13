<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome</title>
    <meta name="description" content="Lpe Secours by Men_franc" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- toastr -->
    <link href="{{ asset('ajax/libs/toastr.js/latest/css/toastr.min.css') }}" rel="stylesheet">

</head>
<body class="no-skin">
<?php
$dateCourante = "";
$date = getDate();
if((int)$date["mon"] < 10 && (int)$date["mday"] < 10){
    $dateCourante = $date["year"]."-0".$date["mon"]."-0".$date["mday"];
}
if((int)$date["mon"] < 10 && (int)$date["mday"] >= 10){
    $dateCourante = $date["year"]."-0".$date["mon"]."-".$date["mday"];
}
if((int)$date["mon"] >= 10 && (int)$date["mday"] < 10){
    $dateCourante = $date["year"]."-".$date["mon"]."-0".$date["mday"];
}
if((int)$date["mon"] >= 10 && (int)$date["mday"] >= 10){
    $dateCourante = $date["year"]."-".$date["mon"]."-".$date["mday"];
}
?>
<div id="navbar" class="navbar navbar-default          ace-save-state">
@include('partials.navbar-container')<!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

    @include('partials.sidebar-shortcuts')<!-- /.sidebar-shortcuts -->

    @include('partials.nav-list')<!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="home">Home</a>
                    </li>
                </ul><!-- /.breadcrumb -->

            @include('partials.nav-search')<!-- /.nav-search -->
            </div>

            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>

                @include('partials.setting-box')<!-- /.ace-settings-box -->
                </div><!-- /.ace-settings-container -->
                <div class="page-header">
                    <h1>
                        Home
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Page d'accueil
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
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
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    @include('partials.footer')

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!-- globale scripts -->
<script src="js/scripts.js"></script>

<script type="text/javascript" src="{{ asset('ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
<script src="{{ asset('ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js') }}"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">   </script>
<script type="text/javascript">
    var dateCourante = "<?= $dateCourante?>";
    //alert("nous somme le, "+dateCourante);
    $(function(){
        $(".carousel").carousel({ interval: 9000 });
    });
</script>
</body>
</html>
