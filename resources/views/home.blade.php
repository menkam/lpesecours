@extends('layouts.template')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading titre">
            <marquee>Bienvenue dans ma page d'apprentissage de bootstrap</marquee>
        </div>
        <div class="panel-body">
            <div class="galerieaccueil">{{ $galerie }}</div>
        </div>
        <div class="panel-footer"></div>
    </div>
@endsection

@section('scripts')
    <script src="js/home.js"></script>
@endsection