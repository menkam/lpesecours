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
    <li><a href="#">MoMo</a></li>
    <li class="active"><a href="bilan">Bilan</a></li>
</ul>
@endsection

@section("page-header")
<h1>
    Bilan MoMo
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        Common form elements and layouts
    </small>
</h1>
@endsection

@section("content_bilan")

<div>
    <form data-toggle="validator" action="" method="POST" action="">
        {{ csrf_field() }}
        <label for="bilan">Bilan Brute ici : </label>
        <input type="text" name="bilan" id="bilan" size="44" placeholder="Date:Fond:Pret:Espece:Compte1:Compte2:Frais:Commission" required>
        <button type="submit" class="btn btn-success" id="saveRecetteGlobalMomo">Submit</button>
        <button type="reset" class="btn btn-wanrning" id="saveRecetteGlobalMomo">Reset</button>
    </form>
</div>
<div class="row">
    <div class="col-xs-12">       

        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
            Results for "Latest Registered"
        </div>

        <!-- div.table-responsive 06/04/2019:250000:83125:300:214611:182:0:30487  -->
        
        <!-- div.dataTables_borderWrap -->
        <div class="table-responsive">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th> <!-- checbx -->
                        <th>Dates_Opp.</th> <!-- date -->
                        <th>Fond</th> <!-- fond -->
                        <th>Prêts</th> <!-- prêt -->
                        <th>Espèces</th> <!-- espèces -->
                        <th>Compte_1</th> <!-- compteMoMo -->
                        <th>Compte_2</th> <!-- Compte2 -->
                        <th>Frais</th> <!-- Frais Transfert -->
                        <th>Commissions</th> <!-- commission -->
                        <th>Total_E.C2</th> <!-- TotalEC2 -->
                        <th>Marge_E.C2</th> <!-- MargeEC2 -->
                        <th>Diff._Comm.</th> <!-- DiffCom -->
                        <th>Supplements</th> <!-- Supplements -->
                        <th>Status</th> <!-- statut -->
                        <th>Actions</th> <!-- action -->
                    </tr>
                </thead>

                <tbody>
                    <?php if(isset($rowBilanMoMo)) echo $rowBilanMoMo; ?>
                </tbody>
                <tfoot style="background-color: #98bc1b; tab-size: 14px">
                    <tr>
                        <td><b>Total</b></td>
                        <td></td>
                        <td><b><?php if(isset($lastFond)) echo $lastFond; ?></b></td>
                        <td><b><?php if(isset($somPret)) echo $somPret; ?></b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b><?php if(isset($somFrais)) echo $somFrais; ?></b></td>
                        <td><b><?php if(isset($maxComm)) echo $maxComm; ?></b></td>
                        <td><b><?php if(isset($lastTotal)) echo $lastTotal; ?></b></td>
                        <td><b><?php if(isset($somMEC2)) echo $somMEC2; ?></b></td>
                        <td></td>
                        <td><b><?php if(isset($maxSup)) echo $maxSup; ?></b></td>
                        <b><?php if(isset($lastStatut)) echo $lastStatut; ?></b>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section("scripts2")
    <script type="text/javascript">
        jQuery(function($) {
            //initiate dataTables plugin
            var myTable =
                $('#dynamic-table')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                    .DataTable( {
                        bAutoWidth: false,
                        "aoColumns": [
                            { "bSortable": false },
                            null,
                            { "bSortable": false },
                            { "bSortable": false },
                            { "bSortable": false },
                            { "bSortable": false },
                            { "bSortable": false },
                            { "bSortable": false },
                            { "bSortable": false },
                            { "bSortable": false },
                            null,
                            { "bSortable": false },
                            { "bSortable": false },
                            null,
                            { "bSortable": false }
                        ],
                        "aaSorting": [],
                        select: {
                            style: 'multi'
                        }
                    } );



            $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

            new $.fn.dataTable.Buttons( myTable, {
                buttons: [
                    {
                        "extend": "colvis",
                        "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                        "className": "btn btn-white btn-primary btn-bold",
                        columns: ':not(:first):not(:last)'
                    },
                    {
                        "extend": "copy",
                        "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "csv",
                        "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "excel",
                        "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "pdf",
                        "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "print",
                        "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                        "className": "btn btn-white btn-primary btn-bold",
                        autoPrint: false,
                        message: 'This print was produced using the Print button for DataTables'
                    }
                ]
            } );
            myTable.buttons().container().appendTo( $('.tableTools-container') );

            //style the message box
            var defaultCopyAction = myTable.button(1).action();
            myTable.button(1).action(function (e, dt, button, config) {
                defaultCopyAction(e, dt, button, config);
                $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
            });


            var defaultColvisAction = myTable.button(0).action();
            myTable.button(0).action(function (e, dt, button, config) {

                defaultColvisAction(e, dt, button, config);


                if($('.dt-button-collection > .dropdown-menu').length == 0) {
                    $('.dt-button-collection')
                        .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                        .find('a').attr('href', '#').wrap("<li />")
                }
                $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
            });

            ////

            setTimeout(function() {
                $($('.tableTools-container')).find('a.dt-button').each(function() {
                    var div = $(this).find(' > div').first();
                    if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                    else $(this).tooltip({container: 'body', title: $(this).text()});
                });
            }, 500);





            myTable.on( 'select', function ( e, dt, type, index ) {
                if ( type === 'row' ) {
                    $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
                }
            } );
            myTable.on( 'deselect', function ( e, dt, type, index ) {
                if ( type === 'row' ) {
                    $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
                }
            } );




            /////////////////////////////////
            //table checkboxes
            $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

            //select/deselect all rows according to table header checkbox
            $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
                var th_checked = this.checked;//checkbox inside "TH" table header

                $('#dynamic-table').find('tbody > tr').each(function(){
                    var row = this;
                    if(th_checked) myTable.row(row).select();
                    else  myTable.row(row).deselect();
                });
            });

            //select/deselect a row when the checkbox is checked/unchecked
            $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
                var row = $(this).closest('tr').get(0);
                if(this.checked) myTable.row(row).deselect();
                else myTable.row(row).select();
            });


/*
            $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                e.stopImmediatePropagation();
                e.stopPropagation();
                e.preventDefault();
            });*/

            //alert("ok");
        })


    </script>
@endsection