$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    calculatrice();
    showInfoInbox();
    showInfoNotification();

    //alert("yes...");
});

function showInfoInbox()
{
    var row = '';
    var position = $("#showInfoInbox");
    $.ajax({
        url: "showInfoNav",
        type:'POST',
        data: {type:'inbox'},
        success: function(data) {
            if($.isEmptyObject(data.error)){
                position.empty();
                position.append(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}
function showInfoNotification()
{
    var position = $("#showInfoNotification");
    $.ajax({
        url: "showInfoNav",
        type:'POST',
        data: {type:'notification'},
        success: function(data) {
            if($.isEmptyObject(data.error)){
                position.empty();
                position.append(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}


function lectureInbox(id)
{

    alert("lue"+id);

    /*$.ajax({
        url: "showInfoNav",
        type:'POST',
        data: {type:'notification'},
        success: function(data) {
            if($.isEmptyObject(data.error)){
                position.empty();
                position.append(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });*/
}


function calculatrice() {
    var btnshow = $("#btn_show_cal");
    var btnhide = $("#btn_hide_cal");
    var divcal = $("#div_calucatrice");

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
}

/**
 * Toast de success
 * @param msg
 */
function tostSuccess(msg){
    toastr.success(msg, 'SUCCESS !!!', {timeOut: 5000});
    window.location.reload();
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