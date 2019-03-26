$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
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