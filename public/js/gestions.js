$(document).ready(function() {

    $( "#date" ).datepicker({
                    showOtherMonths: true,
                    selectOtherMonths: false,
                    //isRTL:true,
            
                    
                    /*
                    changeMonth: true,
                    changeYear: true,
                    
                    showButtonPanel: true,
                    beforeShow: function() {
                        //change button colors
                        var datepicker = $(this).datepicker( "widget" );
                        setTimeout(function(){
                            var buttons = datepicker.find('.ui-datepicker-buttonpane')
                            .find('button');
                            buttons.eq(0).addClass('btn btn-xs');
                            buttons.eq(1).addClass('btn btn-xs btn-success');
                            buttons.wrapInner('<span class="bigger-110" />');
                        }, 0);
                    }
            */
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
        var nombre = $("input[name='nombre']").val();
        var prix_unitaire = $("input[name='prix_unitaire']").val();

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
        var nombre = $("input[name='nombre']").val();
        var prix_unitaire = $("input[name='prix_unitaire']").val();

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

    $("#updateRecetteMomo").click(function (e) {
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var id = $("input[name='id']").val();
        var date = $("input[name='date']").val();
        var fond = $("input[name='fond']").val();
        var pret = $("input[name='pret']").val();
        var espece = $("input[name='espece']").val();
        var compte_momo = $("input[name='compte_momo']").val();
        var compte2 = $("input[name='compte2']").val();
        var frais_transfert = $("input[name='frais_transfert']").val();
        var commission = $("input[name='commission']").val();

        //alert ("id:"+id+"date:"+date+"\nfond:"+fond+"\npret:"+pret+"\nespece:"+espece+"\ncompte_momo:"+compte_momo+"\ncompte2:"+compte2+"\nfrais_transfert:"+frais_transfert+"\ncommission:"+commission);

        $.ajax({
            url: "updateRecetteMomo",
            type:'POST',
            data: {
                _token:_token,
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
                    //resetInputMomo();

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
    $("#updateRecettePhoto").click(function (e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var id = $("input[name='id']").val();
        var date = $("input[name='date']").val();
        var type = $("select[name='type']").val();
        var nombre = $("input[name='nombre']").val();
        var prix_unitaire = $("input[name='prix_unitaire']").val();

        $.ajax({
            url: "updateRecettePhoto",
            type:'POST',
            data: {
                _token:_token,
                id:id,
                date:date,
                type:type,
                nombre:nombre,
                prix_unitaire:prix_unitaire
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                    //resetInputPhotoCachet();
                }else{
                    //printErrorMsg(data.error);
                    tostErreur(data.error);
                }
            }
        });

    });
    $("#updateRecetteCachet").click(function (e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var id = $("input[name='id']").val();
        var date = $("input[name='date']").val();
        var type = $("select[name='type']").val();
        var nombre = $("input[name='nombre']").val();
        var prix_unitaire = $("input[name='prix_unitaire']").val();

        $.ajax({
            url: "updateRecetteCachet",
            type:'POST',
            data: {
                _token:_token,
                id:id,
                date:date,
                type:type,
                nombre:nombre,
                prix_unitaire:prix_unitaire
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                    //resetInputPhotoCachet();
                }else{
                    //printErrorMsg(data.error);
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

function loadContentUpdateBilan(typeGestion,id) {
    var position = $("#bodyUpdateBilan");
    var bouton;

    if (typeGestion=="momo") bouton = $("#updateRecetteMomo");
    else if (typeGestion=="photo") bouton = $("#updateRecettePhoto");
    else if (typeGestion=="cachet") bouton = $("#updateRecetteCachet");

    $.ajax({
        url: "loadContentUpdateBilan",
        type:'POST',
        data: {
            id:id,
            typeGestion:typeGestion
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                $("#updateRecetteMomo").hide();
                $("#updateRecettePhoto").hide();
                $("#updateRecetteCachet").hide();
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