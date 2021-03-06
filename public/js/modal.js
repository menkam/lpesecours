$(document).ready(function () {

    $("#formAddModal").submit(function (e) {
        e.preventDefault();
        var typeSave = $("input[name='typeSave']").val();
    });

    $("#formUpdateModal").submit(function (e) {
        e.preventDefault();
        var typeSave = $("input[name='typeSave']").val();

        if(typeSave=="menu")  saveModalUpdateMenu();
        else if(typeSave=="groupeuser")  saveModalUpdateGroupeUser();
        else if(typeSave=="user")  saveModalUpdateUser();
        else if(typeSave=="momo") saveModalUpdateMomo();
        else if(typeSave=="photo") saveModalUpdatePhoto();
        else if(typeSave=="cachet") saveModalUpdateCachet();
        else if(typeSave=="cachet") saveModalUpdateCachet();
        else if(typeSave=="updateMonnaie") saveModalMonnaie();
    });

});
function loadContentModalView(typeModal,id) {

    var position = $("#bodyModaleView");
    var bouton;
    if (typeModal!=null)
    {
        if (typeModal=="momo") bouton = $("#updateRecetteMomo");
        else if (typeModal=="photo") bouton = $("#updateRecettePhoto");
        else if (typeModal=="cachet") bouton = $("#updateRecetteCachet");
    }
    else
    {
        tostErreur("No Datas Recives");
    }
}
function loadContentModalAdd(typeModal) {

    var position = $("#bodyModalTemp");
    var typeSave = '<input type="hidden" name="typeSave" value="saveMonnaie">';
    var url = "loadContentModalAdd";
    if (typeModal!=null)
    {

         $.ajax({
            url: url,
            type:'POST',
            data: {
                typeModal:typeModal
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    position.empty();
                    position.append(typeSave+data).slideDown();

                }else{
                    //printErrorMsg(data.error);
                    tostErreur(data.error);
                }
                //alert(data);
            },
            error: function () {
                tostErreur("erreur");
            }
        });
    }
    else
    {
        tostErreur("No Datas Recives");
    }
}
function loadContentModalUpdate(typeModal,id) {

    var position = $("#bodyModaleUpdate");
    var typeSave = '<input type="hidden" name="typeSave" value="'+typeModal+'">';
    var url = "loadContentModalUpdate";
    if (typeModal!=null)
    {
        /*if (typeModal=="momo") bouton = $("#updateRecetteMomo");
        else if (typeModal=="photo") bouton = $("#updateRecettePhoto");
        else if (typeModal=="cachet") bouton = $("#updateRecetteCachet");*/

        $.ajax({
            url: url,
            type:'POST',
            data: {
                id:id,
                typeModal:typeModal
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    /*$("#updateRecetteMomo").hide();
                    $("#updateRecettePhoto").hide();
                    $("#updateRecetteCachet").hide();
                    bouton.show().slideDown();*/
                    position.empty();
                    position.append(typeSave+data).slideDown();

                }else{
                    //printErrorMsg(data.error);
                    tostErreur(data.error);
                }
                //alert(data);
            },
            error: function () {
                tostErreur("erreur");
            }
        });
    }
    else
    {
        tostErreur("No Datas Recives");
    }
}
function loadContentModalUpdate2() {

    var position = $("#bodyModalTemp");
    var typeModal = "detailEspeceMomo";
    var typeSave = '<input type="hidden" name="typeSave" value="updateMonnaie">';
    var date = $("#dateRecetteMomo").val();
    var url = "loadContentModalUpdate";
    if (typeModal!=null)
    {

        $.ajax({
            url: url,
            type:'POST',
            data: {
                date:date,
                typeModal:typeModal
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    position.empty();
                    position.append(typeSave+data).slideDown();

                }else{
                    tostErreur(data.error);
                }
            },
            error: function () {
                tostErreur("erreur");
            }
        });
    }
    else
    {
        tostErreur("No Datas Recives");
    }
}

function loadContentModalDelete(typeModal,id) {

    var position = $("#bodyModaleDelete");
    var bouton;
    var url = "loadContentModalDelete";

    if (typeModal!=null)
    {
        if (typeModal=="momo") bouton = $("#updateRecetteMomo");
        else if (typeModal=="photo") bouton = $("#updateRecettePhoto");
        else if (typeModal=="cachet") bouton = $("#updateRecetteCachet");
    }
    else
    {
        tostErreur("No Datas Recives");
    }
}

function saveModalAddMonnaie(date,nombre,total) {
    var _token = $("input[name='_token']").val();
    var typeSave = "monnaieMomo";


    //alert(idparent);
    $.ajax({
        url: "saveModalAdd",
        type:'POST',
        data: {
            _token:_token,
            typeModal:typeSave,
            date:date,
            nombre:nombre
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                tostSuccess2(data.success);
                $("#espece").val(total);
                $("#submitModalAdd, #resetModalAdd, #detail_espece").hide("slow").slideDown;
                $("#update_detail_espece").show("slow").slideUp;
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}

function saveModalUpdateMenu() {
    var _token = $("input[name='_token']").val();
    var typeSave = $("input[name='typeSave']").val();
    var id = $("input[name='id']").val();
    var idparent = $("select[name='idparent']").val();
    var idfils = $("select[name='idfils']").val();
    var libelle = $("input[name='libelle']").val();
    var lien = $("input[name='lien']").val();
    var icon = $("input[name='icon']").val();
    var route = $("input[name='route']").val();
    var controller = $("input[name='controller']").val();
    var fichiercontroller = $("input[name='fichiercontroller']").val();
    var fichierview = $("input[name='fichierview']").val();
    var groupeuser = $("select[name='groupeuser']").val();
    var rang = $("input[name='rang']").val();
    var valide = $("input[name='valide']").val();
    var statut = $("input[name='statut']").val();

    //alert(idparent);
    $.ajax({
        url: "saveModalUpdate",
        type:'POST',
        data: {
            _token:_token,
            typeModal:typeSave,
            id:id,
            idparent:idparent,
            idfils:idfils,
            libelle:libelle,
            lien:lien,
            icon:icon,
            route:route,
            controller:controller,
            fichiercontroller:fichiercontroller,
            fichierview:fichierview,
            groupeuser:groupeuser,
            rang:rang,
            valide:valide,
            statut:statut
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                tostSuccess(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}
function saveModalUpdateGroupeUser() {
    var _token = $("input[name='_token']").val();
    var typeSave = $("input[name='typeSave']").val();
    var id = $("input[name='id']").val();
    var code = $("input[name='code']").val();
    var libelle = $("input[name='libelle']").val();
    var statut = $("input[name='statut']").val();
    //alert ("_token:"+_token+"\ntypeSave:"+typeSave+"\nid:"+id+"\ncode:"+code+"\nlibelle:"+libelle+"\nstatut:"+statut);

    $.ajax({
        url: "saveModalUpdate",
        type:'POST',
        data: {
            _token:_token,
            typeModal:typeSave,
            id:id,
            code:code,
            libelle:libelle,
            statut:statut
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                tostSuccess(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}
function saveModalUpdateUser() {
    var _token = $("input[name='_token']").val();
    var typeSave = $("input[name='typeSave']").val();
    var tlist_groupe_user_id = $("select[name='idGroupeuser']").val();
    var id = $("input[name='id']").val();
    var name = $("input[name='name']").val();
    var surname = $("input[name='surname']").val();
    var photo = $("input[name='photo']").val();
    var date_nais = $("input[name='date_nais']").val();
    var sexe = $("select[name='sexe']").val();
    var telephone = $("input[name='telephone']").val();
    var email = $("input[name='email']").val();
    var statut = $("input[name='statut']").val();
    //alert(_token+"\n"+typeSave+"\n"+tlist_groupe_user_id+"\n"+id+"\n"+name+"\n"+surname+"\n"+photo+"\n"+date_nais+"\n"+sexe+"\n"+telephone+"\n"+email+"\n"+statut)
    $.ajax({
        url: "saveModalUpdate",
        type:'POST',
        data: {
            _token:_token,
            typeModal:typeSave,
            tlist_groupe_user_id:tlist_groupe_user_id,
            id:id,
            name:name,
            surname:surname,
            photo:photo,
            date_nais:date_nais,
            sexe:sexe,
            telephone:telephone,
            email:email,
            statut:statut
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                tostSuccess(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}
function saveModalUpdateMomo() {
    var _token = $("input[name='_token']").val();
    var typeSave = $("input[name='typeSave']").val();
    var id = $("input[name='id']").val();
    var date = $("input[name='date']").val();
    var fond = $("input[name='fond']").val();
    var pret = $("input[name='pret']").val();
    var espece = $("input[name='espece']").val();
    var compte_momo = $("input[name='compte_momo']").val();
    var compte2 = $("input[name='compte2']").val();
    var frais_transfert = $("input[name='frais_transfert']").val();
    var commission = $("input[name='commission']").val();

    $.ajax({
        url: "saveModalUpdate",
        type:'POST',
        data: {
            _token:_token,
            typeModal:typeSave,
            id:id,
            date:date,
            fond:fond,
            pret:pret,
            espece:espece,
            compte_momo:compte_momo,
            compte2:compte2,
            frais_transfert:frais_transfert,
            commission:commission
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                tostSuccess(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}
function saveModalUpdatePhoto() {
    var _token = $("input[name='_token']").val();
    var typeSave = $("input[name='typeSave']").val();
    var id = $("input[name='id']").val();
    var date = $("input[name='date']").val();
    var type = $("select[name='type']").val();
    var nombre = $("input[name='nombre']").val();
    var prix_unitaire = $("input[name='prix_unitaire']").val();

    $.ajax({
        url: "saveModalUpdate",
        type:'POST',
        data: {
            _token:_token,
            typeModal:typeSave,
            id:id,
            date:date,
            type:type,
            nombre:nombre,
            prix_unitaire:prix_unitaire
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                tostSuccess(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}
function saveModalUpdateCachet() {
    var _token = $("input[name='_token']").val();
    var typeSave = $("input[name='typeSave']").val();
    var id = $("input[name='id']").val();
    var date = $("input[name='date']").val();
    var type = $("select[name='type']").val();
    var nombre = $("input[name='nombre']").val();
    var prix_unitaire = $("input[name='prix_unitaire']").val();

    $.ajax({
        url: "saveModalUpdate",
        type:'POST',
        data: {
            _token:_token,
            typeModal:typeSave,
            id:id,
            date:date,
            type:type,
            nombre:nombre,
            prix_unitaire:prix_unitaire
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                tostSuccess(data.success);
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}
/*function saveModalMonnaie(){

    var date = $("#dateRecetteMomo").val();
    var _token = $("input[name='_token']").val();
    var typeSave = $("input[name='typeSave']").val();
    var url;

    if(typeSave=="saveMonnaie")
        url = "saveModalAdd";
    else if(typeSave=="updateMonnaie")
        url = "saveModalUpdate";

    var nbr_1 = $("input[name='nbr_1']").val();
    var nbr_2 = $("input[name='nbr_2']").val();
    var nbr_3 = $("input[name='nbr_3']").val();
    var nbr_4 = $("input[name='nbr_4']").val();
    var nbr_5 = $("input[name='nbr_5']").val();
    var nbr_6 = $("input[name='nbr_6']").val();
    var nbr_7 = $("input[name='nbr_7']").val();
    var nbr_8 = $("input[name='nbr_8']").val();

    //total = 10000*nbr_1 + 5000*nbr_2 + 2000*nbr_3 + 1000*nbr_4 + 500*nbr_5 + 100*nbr_6 + 50*nbr_7 + 25*nbr_8;
    nombre = nbr_1+":"+nbr_2+":"+nbr_3+":"+nbr_4+":"+nbr_5+":"+nbr_6+":"+nbr_7+":"+nbr_8;

    //alert(date+""+nombre+""+url);
    $.ajax({
        url: url,
        type:'POST',
        data: {
            _token:_token,
            typeModal:typeSave,
            date:date,
            nombre:nombre
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                tostSuccess2(data.success);
                $("#espece").val(total);
                $("#submitModalAdd, #resetModalAdd, #detail_espece").hide("slow").slideDown;
                $("#update_detail_espece").show("slow").slideUp;
            }else{
                tostErreur(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}*/