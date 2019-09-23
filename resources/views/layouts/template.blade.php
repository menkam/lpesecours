<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    @yield('style')    
    <link rel="stylesheet" href="css/styles.css" />


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
@if(\Auth::user()->hasAnyGroupe_user(['ADMIN','PERSO','MEBRE','VSTER']))
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
                    @yield('breadcrumb')<!-- /.breadcrumb -->
        
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
                            @yield('page-header')
                            @include('partials.calculatrice')
                        </div><!-- /.page-header -->
        
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                                <a href="https://api.whatsapp.com/send?phone=23796559339&text=Bonjour Francis." class="float" title="Contacter l'administrateur" target="_blank">
                                <i class="fa fa-whatsapp my-float"></i>
                                </a>
                            @yield('content')
                            <!-- PAGE CONTENT ENDS --
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->
        
            @include('partials.modal')
        
            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->
        @include('partials.footer')
        <!-- basic scripts -->
        
        <!--[if !IE]> -->
        <script src="jquery/jquery.min.js"></script>
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
        @yield('scripts')
        
        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        
        <!-- globale scripts -->
        
        <script src="js/scripts.js"></script>
        <script src="js/modal.js"></script>

        <script type="text/javascript" src="{{ asset('ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
        <script src="{{ asset('ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js') }}"></script>
        
        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            var dateCourante = "<?= $dateCourante?>";
            //alert("nous somme le, "+dateCourante);

        </script>
        
        @yield('scripts2')
    </body>
@else
    <body>
    <div class="container">
        <div class="row">
            <div class="col col-md-10 col-md-offset-1">
                <div class="alert alert-warning" style="text-align: center; margin-top: 20%">
                    <h2>Lpe Secours</h2><br/>
                    <i class="fa fa-warning" style="font-size: 6em"></i><br/>
                    <h3>Votre Compte a ete Desactiver!!!!</h3><br/>
                    <h4>Veiller contacter l'administrateur du site ===> <a href="www.github/menkam.com">men_franc</a></h4><br/>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>
    </body>
@endif    
</html>
