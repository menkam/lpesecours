$(document).ready(function () {
    //listMessage();
    $("#btnSendMessage").click(function (e) {
        e.preventDefault();
        var email =  $("input[name='recipient']").val();
        var objet =  $("input[name='subject']").val();
        var libelle =  $(".wysiwyg-editor").html();

        //alert("email"+email+"\nobjet"+objet+"\nlibelle"+libelle);
        /*email.val('');
        objet.empty();
        libelle.empty();*/
        $.ajax({
            url: "sendMessage",
            type:'POST',
            data: {
                email:email,
                objet:objet,
                libelle:libelle
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    tostSuccess(data.success);
                }else{
                    tostErreur((data.error));
                }
            },
            error: function (e) {
                tostErreur("Fatal Error");
            }
        });

    })

});

function listMessage()
{
    var message_list = $("#message-list");

    $.ajax({
        url: "loadListMessage",
        type:'POST',
        data: {},
        success: function(data) {
            if($.isEmptyObject(data.error)){
                message_list.empty();
                message_list.append(data);
            }else{
                message_list.empty();
                message_list.append(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}
function loadContentMessage(id)
{
    var message_content = $("#id-message-content");

    $.ajax({
        url: "loadMessageContent",
        type:'POST',
        data: {
            id:id
        },
        success: function(data) {
            if($.isEmptyObject(data.error)){
                message_content.empty();
                message_content.append(data);
            }else{
                message_content.empty();
                message_content.append(data.error);
            }
        },
        error: function (e) {
            tostErreur("Fatal Error");
        }
    });
}