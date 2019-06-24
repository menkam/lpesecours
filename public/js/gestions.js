$(document).ready(function() {
    var nbr_1;
    var nbr_2;
    var nbr_3;
    var nbr_4;
    var nbr_5;
    var nbr_6;
    var nbr_7;
    var nbr_8;
    var total;
    var divTotal;
    var divTotal2;
    var espece = $('.espece');

    $('#dateRecetteMomo').change(function(){
        date = $('#dateRecetteMomo').val();
        btn_update_detail_espece = $('.update_detail_espece');
        btn_detail_espece = $('#detail_espece');
        totalEspece = $('#totalEspece');


        if(date!=null)
        {
            $.ajax({
                url: "getSommeMonnaie",
                type:'POST',
                data: { date:date },
                success: function(data) {
                    totalEspece.show("slow");
                    if(data.somme){
                        btn_detail_espece.hide("slow");
                        btn_update_detail_espece.show("slow");
                        totalEspece.val(data.somme+" FCFA");
                        espece.val(data.detail);
                    }else if(data.vide){
                        btn_update_detail_espece.hide("slow");
                        btn_detail_espece.show("slow");
                        totalEspece.empty();
                        totalEspece.val("0 FCFA");
                        espece.val("");
                    }
                }
            });
        }
        else
        {
            alert("vide");
        }
    });

    $('#formTempModal').change(function(){calculMonnaie();});
    /*$('#update_detail_espece').click(function(){
        var date = $("#dateRecetteMomo").val();
        getSommeMonnaie(date,"totalMonnaieMomo","totalEspece");
    });*/



    $('#resetModalAdd').click(function () {
        var divTotal  = $("#totalMonnaieMomo");
        divTotal.empty();
        divTotal.append("0 FCFA");
    });

    function calculMonnaie() {

        var espece = $('.espece');
        var nbr_1 = $("input[name='nbr_1']").val();
        var nbr_2 = $("input[name='nbr_2']").val();
        var nbr_3 = $("input[name='nbr_3']").val();
        var nbr_4 = $("input[name='nbr_4']").val();
        var nbr_5 = $("input[name='nbr_5']").val();
        var nbr_6 = $("input[name='nbr_6']").val();
        var nbr_7  = $("input[name='nbr_7']").val();
        var nbr_8  = $("input[name='nbr_8']").val();
        var divTotal  = $("#totalMonnaieMomo");
        var divTotal2  = $("#totalEspece");

        total = 10000*nbr_1 + 5000*nbr_2 + 2000*nbr_3 + 1000*nbr_4 + 500*nbr_5 + 100*nbr_6 + 50*nbr_7 + 25*nbr_8;
        divTotal.empty();
        divTotal.append("<h3>"+total+" FCFA</h3>");
        divTotal2.val(total+" FCFA");
        espece.val(nbr_1+":"+nbr_2+":"+nbr_3+":"+nbr_4+":"+nbr_5+":"+nbr_6+":"+nbr_7+":"+nbr_8);
    }
    /*function getSommeMonnaie(date,post1,post2) {

        var url = "getSommeMonnaie";

        if (date!=null)
        {
            $.ajax({
                url: url,
                type:'POST',
                data: {date:date},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        total = data.success;
                        divTotal  = $("#"+post1+"");
                        divTotal2  = $("#"+post2+"");
                        divTotal.empty();
                        divTotal.append("<h3>"+total+" FCFA</h3>");
                        divTotal2.val(total+" FCFA");
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
    }*/



    $("#saveRecetteGlobalMomo").click(function(e){
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var bilan = $("input[name='bilan']").val();

        $.ajax({
            url: "saveRecetteGlobalMomo",
            type:'POST',
            data: { bilan:bilan },
            success: function(data) {
                if($.isEmptyObject(data.error)){

                    var date = data[0];
                    var fond = data[1];
                    var pret = data[2];
                    var espece = data[3];
                    var compte_momo = data[4];
                    var compte2 = data[5];
                    var frais_transfert = data[6];
                    var commission = data[7];

                    //alert ("date:"+date+"\nfond:"+fond+"\npret:"+pret+"\nespece:"+espece+"\ncompte_momo:"+compte_momo+"\ncompte2:"+compte2+"\nfrais_transfert:"+frais_transfert+"\ncommission:"+commission);

                    $.ajax({
                        url: "saveRecetteMomo",
                        type:'POST',
                        data: {
                            _token:_token,
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
                                bilan.empty();
                            }else{ tostErreur(data.error); }
                        },
                        error: function(){tostErreur("Fatal Error2");}
                    });
                }else{ tostErreur(data.error); }
            }, 
            error: function(){tostErreur("Fatal Error");}
        });
    });

    $("#saveRecetteMoMo").click(function(e){
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var date = $("input[name='date']").val();
        var fond = $("input[name='fond']").val();
        var pret = $("input[name='pret']").val();
        var espece = $("input[name='espece']").val();
        var compte_momo = $("input[name='compte_momo']").val();
        var compte2 = $("input[name='compte2']").val();
        var frais_transfert = $("input[name='frais_transfert']").val();
        var commission = $("input[name='commission']").val();

        //alert ("date:"+date+"\nfond:"+fond+"\npret:"+pret+"\nespece:"+espece+"\ncompte_momo:"+compte_momo+"\ncompte2:"+compte2+"\nfrais_transfert:"+frais_transfert+"\ncommission:"+commission);

        $.ajax({
            url: "saveRecetteMomo",
            type:'POST',
            data: {
                _token:_token,
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
                    resetInputMomo();
                }else{
                    //printErrorMsg(data.error);
                    tostErreur(data.error);
                }
            }
        });
    });
    $("#saveRecettePhoto").click(function(e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var date = $("input[name='date']").val();
        var type = $("select[name='type']").val();
        var nombre = $("select[name='nombre']").val();
        var prix_unitaire = $("select[name='prix_unitaire']").val();

        $.ajax({
            url: "saveRecettePhoto",
            type:'POST',
            data: {
                _token:_token,
                date:date,
                type:type,
                nombre:nombre,
                prix_unitaire:prix_unitaire
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                    resetInputPhotoCachet();
                }else{
                    //printErrorMsg(data.error);
                    tostErreur(data.error);
                }
            }
        });
    });
    $("#saveRecetteCachet").click(function(e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var date = $("input[name='date']").val();
        var type = $("select[name='type']").val();
        var nombre = $("select[name='nombre']").val();
        var prix_unitaire = $("select[name='prix_unitaire']").val();

        $.ajax({
            url: "saveRecetteCachet",
            type:'POST',
            data: {
                _token:_token,
                date:date,
                type:type,
                nombre:nombre,
                prix_unitaire:prix_unitaire
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                    resetInputPhotoCachet();
                }else{
                    //printErrorMsg(data.error);
                    tostErreur(data.error);
                }
            }
        });
    });

    /**
     * Compte perso
     */
    $("#dateComptePerso").change(function (e) {
        e.preventDefault();
        $("#typeComptePerso").val("");
        $("#saveComptePerso").hide();
        $("#updateComptePerso").hide();
    });
    $("#typeComptePerso").change(function (e) {
        e.preventDefault();
        var dateComptePerso = $("#dateComptePerso").val();
        var typeOpp = $("#typeOpp");
        var date = $("input[name='date']").val();
        var type = $("select[name='type']").val();

        if(dateComptePerso){
            $.ajax({
                 url: "existRecordComptePerso",
                 type:'POST',
                 data: {
                     date:date,
                     type:type
                },
                 success: function(data) {
                     if($.isEmptyObject(data.error)){
                         if(data.success=="1"){
                             typeOpp.val("modification");
                             $("#somme").val(data.somme);
                             $("#commentaire").val(data.commentaire);
                             $("#saveComptePerso").hide();
                             $("#updateComptePerso").show();
                         }else
                         if(data.success=="0"){
                             typeOpp.val("nouveau");
                             $("#somme").val("");
                             $("#commentaire").val("");
                             $("#updateComptePerso").hide();
                             $("#saveComptePerso").show();
                         }
                     }else{
                        tostErreur(data.error);
                     }
                 }
            });

        }else {
            tostErreur("Choisir une date valide !!!");
        }
    });
    $("#formsaveCompte_perso").submit(function(e){
        e.preventDefault();
        var url = "ras";
        var typeOpp = $("input[name='typeOpp']").val();

         if(typeOpp=="nouveau") url = "saveComptePerso";
         else if(typeOpp=="modification") url = "updateComptePerso";
        //alert ('formsaveCompte_perso');

       var _token = $("input[name='_token']").val();
        var date = $("input[name='date']").val();
        var type = $("select[name='type']").val();
        var somme = $("input[name='somme']").val();
        var commentaire = $("input[name='commentaire']").val();
        //alert (url);
         $.ajax({
            url: url,
            type:'POST',
            data: {
                _token:_token,
                date:date,
                type:type,
                somme:somme,
                commentaire:commentaire
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                }else{
                    tostErreur(data.error);
                }
            }
        });
    });


    $("#deleteRecetteMomo").click(function (e) {
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var id = $("input[name='id']").val();

        $.ajax({
            url: "deleteRecetteMomo",
            type:'POST',
            data: {
                _token:_token,
                id:id
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                    resetInputMomo();

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

    });
    $("#deleteRecettePhoto").click(function (e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var id = $("input[name='id']").val();

        $.ajax({
            url: "deleteRecettePhoto",
            type:'POST',
            data: {
                _token:_token,
                id:id
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                    resetInputPhotoCachet();
                }else{
                    //printErrorMsg(data.error);
                    tostErreur(data.error);
                }
            }
        });
    });
    $("#deleteRecetteCachet").click(function (e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var id = $("input[name='id']").val();

        $.ajax({
            url: "deleteRecetteCachet",
            type:'POST',
            data: {
                _token:_token,
                id:id
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                    resetInputPhotoCachet();
                }else{
                    //printErrorMsg(data.error);
                    tostErreur(data.error);
                }
            }
        });

    });

    /**
     * init val form
     */
    function resetInputMomo() {
        $("input[name='_token']").val('');
        $("input[name='id']").val('');
        $("input[name='date']").val('');
        $("input[name='fond']").val('');
        $("input[name='pret']").val('');
        $("input[name='espece']").val('');
        $("input[name='compte_momo']").val('');
        $("input[name='compte2']").val('');
        $("input[name='frais_transfert']").val('');
        $("input[name='commission']").val('');
    }
    function resetInputPhotoCachet() {
        $("input[name='id']").val('');
        $("input[name='date']").val('');
        $("select[name='type']").val('');
        $("input[name='nombre']").val('');
        $("input[name='prix_unitaire']").val('');
    }
});

function loadBodyBilan(typeGestion,idBody)
{
    var position = $("#"+idBody);

    /*$.ajax({
        url: "loadBodyBilan",
        type:'POST',
        data:{typeGestion:typeGestion},
        success: function(data) {
            //alert(data);
            position.empty();
            position.append(data).slideDown();
        },
        error: function () {
            tostErreur("erreur");
        }
    });*/
}

function updateStatutBilan(typeGestion,id) {
    var position = $("#bodyDeleteBilan");
    var bouton;

    if (typeGestion == "momo") bouton = $("#deleteRecetteMomo");
    else if (typeGestion == "photo") bouton = $("#deleteRecettePhoto");
    else if (typeGestion == "cachet") bouton = $("#deleteRecetteCachet");


    $.ajax({
         url: "updateStatutBilan",
         type:'POST',
         data: {
             id:id,
             typeGestion:typeGestion
         },
         success: function(data) {
             if($.isEmptyObject(data.error)){
             $("#deleteRecetteMomo").hide();
             $("#deleteRecettePhoto").hide();
             $("#deleteRecetteCachet").hide();
             bouton.show().slideDown();
             position.empty();
             position.append(data).slideDown();

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

