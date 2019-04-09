$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    var btnshow = $("#btn_show_cal");
    var btnhide = $("#btn_hide_cal");
    var divcal = $("#div_calucatrice");
    //loadMenu();

    btnhide.hide();
    divcal.hide();

    btnshow.click(function(){
        btnshow.hide();
        divcal.show('show');
        btnhide.show();
    });
    btnhide.click(function(){
        btnshow.show();
        divcal.hide('show');
        btnhide.hide();
    });

    $('#cal_opp').keyup(function(){
      var cal_opp = $(this).val();
      var cal_sol = $("#cal_sol");
        if(cal_opp.length > 2){
          $.ajax({
            url: "calculatrice",
            type:'POST',
            data: {
                cal_opp:cal_opp
            },
            success: function(data) {
                cal_sol.empty();
                cal_sol.append(data);
            }
        });     
      }
    });
    
    //alert("yes...");
});

/**
 * affiché la liste des menus
 */
function loadMenu() {
    var position = $("#listMenu");
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: 'listMenu',
        success: function(data){
            data2 = '<li class="active"><a href="{{ url('/') }}"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> Dashboard </span></a><b class="arrow"></b></li>';
             position.empty();
             position.append(data2).slideDown();
        },
        error: function () {
            tostErreur("erreur de chargement des menus");
        }
    });
    //alert("listdesmenu");
}

/**
 * Get option duree
 * @param position
 */
function getOptionSexe(position) {
    var rows = '<option value="">-----------------</option>';
    var position = $("#"+position+"");
    rows = rows + '<option value="F">Féminin</option>';
    rows = rows + '<option value="M">Masculin</option>';
    position.empty();
    position.append(rows).slideDown();
}
/*
function getOptionGroupeUser(position) {
    var rows = '<option value="">-----------------</option>';
    var position = $("#"+position+"");
    rows = rows + '<option value="5">Visiteur</option>';
    position.empty();
    position.append(rows).slideDown();
}*/

function getOptionAcreditation(position) {
    var rows = '<option value="">-----------------</option>';
    var position = $("#"+position+"");
    rows = rows + '<option value="1">Lecture</option>';
    position.empty();
    position.append(rows).slideDown();
}

function getOptionTypePhoto(position)
{
    var position = $("#"+position+"");
    $.ajax({
        url: "getOptionTypePhoto",
        type:'POST',
        success: function(data) {
            position.empty();
            position.append(data).slideDown();
        }
    });
}

function getOptionTypeCachet(position)
{
    var position = $("#"+position+"");
    $.ajax({
        url: "getOptionTypeCachet",
        type:'POST',
        success: function(data) {
            position.empty();
            position.append(data).slideDown();
        }
    });
}


/**
 * Get option groupe users
 * @param position
 */

function getOptionGroupeUser(position) {
    var rows = '<option value="">-----------------</option>';
    var position = $("#"+position+"");

     $.ajax({
        type: "POST",
        dataType: 'json',
        url: 'getOptionGroupeUser',

        success: function(data){

            rows = rows + '<option value="">'+data+'</option>';
            position.empty();

            alert("5");
            /*for(var i=0; i < data.length; i++) {
                rows = rows + '<option value="'+data[i].id+'">'+data[i].libelle+'=>'+data[i].code+'</option>';
            }
            position.empty();
            position.append(rows).slideDown();*/
        }
    });

    //position.append(rows).slideDown();
}
/**
 * Toast de success
 * @param msg
 */
function tostSuccess(msg){
    toastr.success(msg, 'SUCCESS !!!', {timeOut: 5000});
}

/**
 * Toast d'avertissement
 * @param msg
 */
function tostAvertissement(msg){
    toastr.warning(msg, 'Avertissement !!!', {timeOut: 5000});
}

/**
 * Toast d'erreur
 * @param msg
 */
function tostErreur(msg){
    toastr.error(msg, 'Erreur !!!', {timeOut: 5000});
}

function chargement(position){
    var position = $("#"+position+"");
    position.empty();
    position.append('<div><img src="images/chargementCouleur.gif" alt="chargement du contenu">');
    position.show();
}