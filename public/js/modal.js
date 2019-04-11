
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
function loadContentModalUpdate(typeModal,id) {

    var position = $("#bodyModaleUpdate");
    var bouton;
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