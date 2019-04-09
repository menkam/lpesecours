$(document).ready(function () {
    //setInterval(listMenu,1000);
    //listMenu();
});

function listMenu() {
    var numero = 1;
    var position = $("#bodyListMenus");
    var onclickUpdateMenu;
    var onclickDeleteMenu;
    var onclickViewMenu;
    var rows ='';
    $.ajax({
        url: "listMenu",
        type:'POST',
        success: function(data) {
            for(var i= 0; i < data.length; i++) {

                rows = rows+'<tr><td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>';
                rows = rows+'<td>'+numero+'</td>'; <!-- numero -->
                rows = rows+'<td>'+data[i].id+'</td>'; <!-- idMenu -->
                rows = rows+'<td>'+data[i].idparent+'</td>'; <!-- idPere -->
                rows = rows+'<td>'+data[i].idfils+'</td>'; <!-- idFils -->
                rows = rows+'<td>'+data[i].libelle+'</td>'; <!-- Libelle -->
                rows = rows+'<td>'+data[i].groupeuser+'</td>'; <!-- groupeUser -->
                rows = rows+'<td>'+data[i].rang+'</td>'; <!-- rang -->
                rows = rows+'<td>'+data[i].lien+'</td>'; <!-- lien -->
                rows = rows+'<td>'+data[i].icon+'</td>'; <!-- icon -->
                rows = rows+' <td>'+data[i].route+'</td>'; <!-- route -->
                rows = rows+' <td>'+data[i].controller+'</td>'; <!-- controller -->
                rows = rows+'<td>'+data[i].fichiercontroller+'</td>'; <!-- fichiercontroller -->
                rows = rows+'<td>'+data[i].fichierview+'</td>'; <!-- fichierview -->
                rows = rows+'<td>'+data[i].valide+'</td>'; <!-- valide -->
                rows = rows+'<td>'+data[i].statut+'</td>'; <!-- statut -->
                rows = rows+'<td><div class="hidden-sm hidden-xs action-buttons">';
                rows = rows+'<a class="blue" href="#" '+onclickUpdateMenu+' data-toggle="modal" data-target="#viewBilan"><i class="ace-icon fa fa-search-plus bigger-130"></i></a>';
                rows = rows+'<a class="green" href="#" '+onclickUpdateMenu+' data-toggle="modal" data-target="#updateBilan"><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
                rows = rows+'<a class="red" href="#" '+onclickDeleteMenu+'  data-toggle="modal" data-target="#deleteBilan"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></div>';
                rows = rows+'<div class="hidden-md hidden-lg"><div class="inline pos-rel">';
                rows = rows+'<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">';
                rows = rows+'<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i></button>';
                rows = rows+'<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">';
                rows = rows+'<li><a href="#" class="tooltip-info" '+onclickViewMenu+' data-rel="tooltip" title="View" data-toggle="modal" data-target="#viewBilan">';
                rows = rows+'<span class="blue"><i class="ace-icon fa fa-search-plus bigger-120"></i></span></a></li>';
                rows = rows+'<li><a href="#" class="tooltip-success" '+onclickUpdateMenu+' data-rel="tooltip" title="Edit" data-toggle="modal" data-target="#updateBilan">';
                rows = rows+'<span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>';
                rows = rows+'<li><a href="#" class="tooltip-error" '+onclickDeleteMenu+' data-rel="tooltip" title="Delete" data-toggle="modal" data-target="#deleteBilan">';
                rows = rows+'<span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span></a></li></ul></div></div></td>';
                rows = rows+'</tr>';
                numero++;
            }

            position.empty();
            position.append(rows);
            /*if($.isEmptyObject(data.error)){
                tostSuccess(data.success);
            }else{ tostErreur(data.error); }*/
            //alert(data);
        },
        error: function(){tostErreur("Fatal Error");}
    });
}