@extends("layouts.template")
@section("title")
<title>Gallery</title>

<meta name="description" content="responsive photo gallery using colorbox" />
@endsection

@section("style")
<link rel="stylesheet" href="assets/css/colorbox.min.css" />
@endsection

@section("breadcrumb")
<ul class="breadcrumb">
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="/">Home</a>
    </li>
    <li class="active"><a href="galerie">Galeries</a></li>
    
</ul>
@endsection

@section("page-header")
<h1>
    Galeries
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Common form elements and layouts
    </small>
</h1>
@endsection

@section("content")
<div>
    <ul class="ace-thumbnails clearfix">
        <?php if(isset($galeries)) echo $galeries; ?>
    </ul>
</div>
@endsection

@section("scripts")
<script src="assets/js/jquery.colorbox.min.js"></script>
@endsection

@section("scripts2")
<script type="text/javascript">
    jQuery(function($) {
        var $overflow = '';
        var colorbox_params = {
            rel: 'colorbox',
            reposition:true,
            scalePhotos:true,
            scrolling:false,
            previous:'<i class="ace-icon fa fa-arrow-left"></i>',
            next:'<i class="ace-icon fa fa-arrow-right"></i>',
            close:'&times;',
            current:'{current} of {total}',
            maxWidth:'100%',
            maxHeight:'100%',
            onOpen:function(){
                $overflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
            },
            onClosed:function(){
                document.body.style.overflow = $overflow;
            },
            onComplete:function(){
                $.colorbox.resize();
            }
        };

        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon


        $(document).one('ajaxloadstart.page', function(e) {
            $('#colorbox, #cboxOverlay').remove();
        });
    })
</script>
@endsection