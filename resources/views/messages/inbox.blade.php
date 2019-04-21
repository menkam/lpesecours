@extends('layouts.template')
@section('title')
<title>Inbox</title>
<meta name="description" content="Mailbox with some customizations as described in docs" />
@endsection

@section('style')

@endsection

@section('breadcrumb')
<ul class="breadcrumb">
	<li>
		<i class="ace-icon fa fa-home home-icon"></i>
		<a href="#">Home</a>
	</li><li class="active">Inbox</li>
</ul>
@endsection

@section('page-header')
<h1>
	Inbox
	<small>
		<i class="ace-icon fa fa-angle-double-right"></i>
		Mailbox with some customizations as described in docs
	</small>
</h1>
@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="tabbable">
			<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
				<li class="li-new-mail pull-right">
					<a data-toggle="tab" href="#write" data-target="write" class="btn-new-mail">
						<span class="btn btn-purple no-border">
							<i class="ace-icon fa fa-envelope bigger-130"></i>
							<span class="bigger-110">Write Mail</span>
						</span>
					</a>
				</li><!-- /.li-new-mail -->

				<li class="active">
					<a data-toggle="tab" href="#inbox" data-target="inbox">
						<i class="blue ace-icon fa fa-inbox bigger-130"></i>
						<span class="bigger-110">Inbox</span>
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#sent" data-target="sent">
						<i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
						<span class="bigger-110">Sent</span>
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#draft" data-target="draft">
						<i class="green ace-icon fa fa-pencil bigger-130"></i>
						<span class="bigger-110">Draft</span>
					</a>
				</li>

				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="pink ace-icon fa fa-tags bigger-130"></i>

						<span class="bigger-110">
							Tags
							<i class="ace-icon fa fa-caret-down"></i>
						</span>
					</a>

					<ul class="dropdown-menu dropdown-light-blue dropdown-125">
						<li>
							<a data-toggle="tab" href="#tag-1">
								<span class="mail-tag badge badge-pink"></span>
								<span class="pink">Tag#1</span>
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#tag-family">
								<span class="mail-tag badge badge-success"></span>
								<span class="green">Family</span>
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#tag-friends">
								<span class="mail-tag badge badge-info"></span>
								<span class="blue">Friends</span>
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#tag-work">
								<span class="mail-tag badge badge-grey"></span>
								<span class="grey">Work</span>
							</a>
						</li>
					</ul>
				</li><!-- /.dropdown -->
			</ul>

			@include('messages.tab-content')<!-- /.tab-content -->
		</div><!-- /.tabbable -->
	</div><!-- /.col -->
</div><!-- /.row -->

@include('messages.message-form')
<div class="hide message-content" id="id-message-content"></div><!-- /.message-content -->

@endsection

@section('scripts')
<script src="assets/js/bootstrap-tag.min.js"></script>
<script src="assets/js/jquery.hotkeys.index.min.js"></script>
<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
@endsection

@section('scripts2')
<script src="js/inbox2.js"></script>
<script src="js/inbox.js"></script>
@endsection
 