@extends("layouts.template")

@section("content")
    @yield('content_bilan')
    <!-- formulaire d'information -->
    <div class="modal fade" id="viewBilan" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h6 class="modal-title" id="myModalLabel">Virsualisation</h6>
                </div>
                <div class="modal-body">
                    <form data-toggle="validator" action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group"  style="">
                            <label class="control-label" for="idClasseActivite">Classe :</label>
                            <select name="idClasseActivite" id="idClasseActivite" class="form-control" data-error="Choisir." required ></select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn saveClasseActivite btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning crud-reset-edit">Effacer</button>
                            <button class="btn btn-default close crud-close-edit" data-dismiss="modal" aria-label="Close">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- formulaire de modification -->
    <div class="modal fade" id="updateBilan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h6 class="modal-title" id="myModalLabel">Modification</h6>
                </div>
                <div class="modal-body">
                    <form data-toggle="validator" id="formUpdaterecetteMomo" action="#" method="POST">
                    {{ csrf_field() }}
                        <div id="bodyUpdateBilan"></div>
                        <div class="form-group">
                            <button id="updateRecetteMomo" type="submit" class="btn btn-success" style="display: none">Modifier</button>
                            <button id="updateRecettePhoto" type="submit" class="btn btn-success" style="display: none">Modifier</button>
                            <button id="updateRecetteCachet" type="submit" class="btn btn-success" style="display: none">Modifier</button>
                            <button type="reset" class="btn btn-warning crud-reset-edit">Réinitialiser</button>
                            <button class="btn btn-default close crud-close-edit" data-dismiss="modal" aria-label="Close">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- formulaire de suppression -->
    <div class="modal fade" id="deleteBilan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <!--h6 class="modal-title" id="myModalLabel">Suppression</h6-->
                    <h4 class="smaller">
                        <i class="ace-icon fa fa-exclamation-triangle red">
                        </i> Suppression !!!
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="dialog-confirm" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 32px; max-height: none; height: auto;">
                        <div class="alert alert-info bigger-110">
                            Vous êtes sur le point de  supprimer définitivement cet élément.
                        </div>
                        <div class="space-6"></div>
                        <p class="bigger-110 bolder center grey">
                            <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                            Etes-vous sur?
                        </p>
                    </div>
                    <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                        <div class="ui-dialog-buttonset">
                            <form data-toggle="validator" id="formUpdaterecetteMomo" action="#" method="POST">
                                {{ csrf_field() }}
                                <div id="bodyDeleteBilan"></div>
                                <div class="form-group">
                                    <button id="deleteRecetteMomo" type="submit" type="button" class="btn btn-danger btn-minier ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button"  style="display: none">
                                        <span class="ui-button-text">
                                            <i class="ace-icon fa fa-trash-o bigger-110"></i>&nbsp;
                                                Confiermer
                                        </span>
                                    </button>
                                    <button id="deleteRecettePhoto" type="submit" type="button" class="btn btn-danger btn-minier ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button"  style="display: none">
                                        <span class="ui-button-text">
                                            <i class="ace-icon fa fa-trash-o bigger-110"></i>&nbsp;
                                                Confiermer
                                        </span>
                                    </button>
                                    <button id="deleteRecetteCachet" type="submit" type="button" class="btn btn-danger btn-minier ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button"  style="display: none">
                                        <span class="ui-button-text">
                                            <i class="ace-icon fa fa-trash-o bigger-110"></i>&nbsp;
                                                Confiermer
                                        </span>
                                    </button>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="ui-button-text">
                                            <i class="ace-icon fa fa-times bigger-110"></i>&nbsp;
                                            Annuler
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")

    <!-- page specific plugin scripts -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.flash.min.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/buttons.colVis.min.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>

    <script type="text/javascript">



    </script>

    <script type="text/javascript" src="js/gestions.js"></script>

@endsection