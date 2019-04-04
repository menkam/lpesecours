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
        <li>
            <a href="assets/images/gallery/images/image-1.jpg" title="Photo Title" data-rel="colorbox">
                <img width="150" height="150" alt="150x150" src="assets/images/gallery/thumbs/thumb-1.jpg" />
            </a>

            <div class="tags">
                <span class="label-holder">
                    <span class="label label-info">breakfast</span>
                </span>

                <span class="label-holder">
                    <span class="label label-danger">fruits</span>
                </span>

                <span class="label-holder">
                    <span class="label label-success">toast</span>
                </span>

                <span class="label-holder">
                    <span class="label label-warning arrowed-in">diet</span>
                </span>
            </div>

            <div class="tools">
                <a href="#">
                    <i class="ace-icon fa fa-link"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-paperclip"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-pencil"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-times red"></i>
                </a>
            </div>
        </li>

        <li>
            <a href="assets/images/gallery/images/image-2.jpg" data-rel="colorbox">
                <img width="150" height="150" alt="150x150" src="assets/images/gallery/thumbs/thumb-2.jpg" />
                <div class="text">
                    <div class="inner">Sample Caption on Hover</div>
                </div>
            </a>
        </li>

        <li>
            <a href="assets/images/gallery/images/image-3.jpg" data-rel="colorbox">
                <img width="150" height="150" alt="150x150" src="assets/images/gallery/thumbs/thumb-3.jpg" />
                <div class="text">
                    <div class="inner">Sample Caption on Hover</div>
                </div>
            </a>

            <div class="tools tools-bottom">
                <a href="#">
                    <i class="ace-icon fa fa-link"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-paperclip"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-pencil"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-times red"></i>
                </a>
            </div>
        </li>

        <li>
            <a href="assets/images/gallery/images/image-4.jpg" data-rel="colorbox">
                <img width="150" height="150" alt="150x150" src="assets/images/gallery/thumbs/thumb-4.jpg" />
                <div class="tags">
                    <span class="label-holder">
                        <span class="label label-info arrowed">fountain</span>
                    </span>

                    <span class="label-holder">
                        <span class="label label-danger">recreation</span>
                    </span>
                </div>
            </a>

            <div class="tools tools-top">
                <a href="#">
                    <i class="ace-icon fa fa-link"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-paperclip"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-pencil"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-times red"></i>
                </a>
            </div>
        </li>

        <li>
            <div>
                <img width="150" height="150" alt="150x150" src="assets/images/gallery/thumbs/thumb-5.jpg" />
                <div class="text">
                    <div class="inner">
                        <span>Some Title!</span>

                        <br />
                        <a href="assets/images/gallery/images/image-5.jpg" data-rel="colorbox">
                            <i class="ace-icon fa fa-search-plus"></i>
                        </a>

                        <a href="#">
                            <i class="ace-icon fa fa-user"></i>
                        </a>

                        <a href="#">
                            <i class="ace-icon fa fa-share"></i>
                        </a>
                    </div>
                </div>
            </div>
        </li>

        <li>
            <a href="assets/images/gallery/images/image-6.jpg" data-rel="colorbox">
                <img width="150" height="150" alt="150x150" src="assets/images/gallery/thumbs/thumb-6.jpg" />
            </a>

            <div class="tools tools-right">
                <a href="#">
                    <i class="ace-icon fa fa-link"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-paperclip"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-pencil"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-times red"></i>
                </a>
            </div>
        </li>

        <li>
            <a href="assets/images/gallery/images/image-1.jpg" data-rel="colorbox">
                <img width="150" height="150" alt="150x150" src="assets/images/gallery/thumbs/thumb-1.jpg" />
            </a>

            <div class="tools">
                <a href="#">
                    <i class="ace-icon fa fa-link"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-paperclip"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-pencil"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-times red"></i>
                </a>
            </div>
        </li>

        <li>
            <a href="assets/images/gallery/images/image-2.jpg" data-rel="colorbox">
                <img width="150" height="150" alt="150x150" src="assets/images/gallery/thumbs/thumb-2.jpg" />
            </a>

            <div class="tools tools-top in">
                <a href="#">
                    <i class="ace-icon fa fa-link"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-paperclip"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-pencil"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-times red"></i>
                </a>
            </div>
        </li>


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