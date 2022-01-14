/*
Bootstable
 @description  Javascript library to make HMTL tables editable, using Bootstrap
 @version 1.1
 @autor Tito Hinostroza 
*/
"use strict";
//Global variables
var params = null; //Parameters
var colsEdi = null;
var imageColumn = false;
var imageColumnHtml = "<img src='' width='40px'/>";
var newColHtml =
  '<div class="btn-group pull-right">' +
  '<button id="bEdit" type="button" class="btn btn-sm btn-default" onclick="rowEdit(this);">' +
  '<span class="bi bi-pencil" > </span>' +
  "</button>" +
  '<button id="bElim" type="button" class="btn btn-sm btn-default" onclick="rowElim(this);">' +
  '<span class="bi bi-trash" > </span>' +
  "</button>" +
  '<button id="bAcep" type="button" class="btn btn-sm btn-default btn-accept" style="display:none;" onclick="rowAcep(this);">' +
  '<span class="bi bi-check" > </span>' +
  "</button>" +
  '<button id="bCanc" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="rowCancel(this);">' +
  '<span class="bi bi-x" > </span>' +
  "</button>" +
  "</div>";
var colEdicHtml = '<td name="buttons">' + newColHtml + "</td>";

$.fn.SetEditable = function (options) {
  var defaults = {
    columnsEd: null, //Index to editable columns. If null all td editables. Ex.: "1,2,3,4,5"
    $addButton: null, //Jquery object of "Add" button
    imageColumn: false, //Wich column is an image
    onEdit: function () {}, //Called after edition
    onBeforeDelete: function () {}, //Called before deletion
    onDelete: function () {}, //Called after deletion
    onAdd: function () {}, //Called when added a new row
  };
  params = $.extend(defaults, options);
  this.find("thead tr").append('<th name="buttons"></th>'); //encabezado vacío
  this.find("tbody tr").append(colEdicHtml);
  var $tabedi = this; //Read reference to the current table, to resolve "this" here.
  //Process "addButton" parameter
  if (params.$addButton != null) {
    //Se proporcionó parámetro
    params.$addButton.click(function () {
      rowAddNew($tabedi.attr("id"));
    });
  }
  //Process "columnsEd" parameter
  if (params.columnsEd != null) {
    //Extract felds
    colsEdi = params.columnsEd.split(",");
  }
};
function IterarCamposEdit($cols, tarea) {
  //Itera por los campos editables de una fila
  var n = 0;
  $cols.each(function () {
    n++;
    if ($(this).attr("name") == "buttons") return; //excluye columna de botones
    if (!EsEditable(n - 1)) return; //noe s campo editable
    tarea($(this));
  });

  function EsEditable(idx) {
    //Indica si la columna pasada está configurada para ser editable
    if (colsEdi == null) {
      //no se definió
      return true; //todas son editable
    } else {
      //hay filtro de campos
      //alert('verificando: ' + idx);
      for (var i = 0; i < colsEdi.length; i++) {
        if (idx == colsEdi[i]) return true;
      }
      return false; //no se encontró
    }
  }
}
function FijModoNormal(but) {
  $(but).parent().find("#bAcep").hide();
  $(but).parent().find("#bCanc").hide();
  $(but).parent().find("#bEdit").show();
  $(but).parent().find("#bElim").show();
  var $row = $(but).parents("tr"); //accede a la fila
  $row.attr("id", ""); //quita marca
}
function FijModoEdit(but) {
  $(but).parent().find("#bAcep").show();
  $(but).parent().find("#bCanc").show();
  $(but).parent().find("#bEdit").hide();
  $(but).parent().find("#bElim").hide();
  var $row = $(but).parents("tr"); //accede a la fila
  $row.attr("class", "editing"); //indica que está en edición
}
function ModoEdicion($row) {
  if ($row.attr("class") == "editing") {
    return true;
  } else {
    return false;
  }
}
function rowAcep(but) {
  //Acepta los cambios de la edición
  var $row = $(but).parents("tr"); //accede a la fila
  var $cols = $row.find("td"); //lee campos
  if (!ModoEdicion($row)) return; //Ya está en edición
  //Está en edición. Hay que finalizar la edición
  IterarCamposEdit($cols, function ($td) {
    //itera por la columnas
    if ($td.find("div[class='img-address']").length > 0) {
      if ($td.find("input").val())
        $td.html(
          "<img src='" +
            $td.find("div[class='img-address']").html() +
            "' width='40px'/>"
        );
      else
        $td.html(
          "<img src='" +
            $td.find("div[class='img-address']").html() +
            "'width='40px'/>"
        );
    } else {
      var cont = $td.find("input").val(); //lee contenido del input
      $td.html(cont); //fija contenido y elimina controles
    }
    //fija contenido y elimina controles
  });
  $row.removeClass("editing");
  FijModoNormal(but);
  params.onEdit($row);
}
function rowCancel(but) {
  //Rechaza los cambios de la edición
  var $row = $(but).parents("tr"); //accede a la fila
  var $cols = $row.find("td"); //lee campos
  if (!ModoEdicion($row)) return; //Ya está en edición
  //Está en edición. Hay que finalizar la edición
  IterarCamposEdit($cols, function ($td) {
    //itera por la columnas
    if ($td.find("div[class='img-address']").length > 0) {
      $td.html(
        "<img src='" +
          $td.find("div[class='img-address']").html() +
          "'width='40px'/> "
      );
    } else {
      var cont = $td.find("div").html(); //lee contenido del div
      $td.html(cont); //fija contenido y elimina controles
    }
  });
  FijModoNormal(but);
}
function rowEdit(but) {
  //Inicia la edición de una fila
  var $row = $(but).parents("tr"); //accede a la fila
  var $cols = $row.find("td"); //lee campos
  if (ModoEdicion($row)) return; //Ya está en edición
  //Pone en modo de edición
  IterarCamposEdit($cols, function ($td) {
    //itera por la columnas
    var cont = $td.html(); //lee contenido
    if (cont.search("img") != -1) {
      var img = cont.split("src=")[1].split('"')[1];
      var div =
        '<div style="display: none;" class="img-address">' + img + "</div>"; //guarda contenido
      var input =
        '<input class="form-control input-sm" id="img-input"  value="' +
        img +
        '" type="file" accept="image/*" onchange="imageChange(event)"/>';
      $td.html(div + input);
    } else {
      var div = '<div style="display: none;">' + cont + "</div>"; //guarda contenido
      var input =
        '<input class="form-control input-sm" maxlength="20"  value="' +
        cont +
        '">';
      if ($td.hasClass("opinion"))
        input =
          '<input class="form-control input-sm" maxlength="100"  value="' +
          cont +
          '">';
      $td.html(div + input); //fija contenido
    }
  });
  FijModoEdit(but);
}
function rowElim(but) {
  //Elimina la fila actual
  var $row = $(but).parents("tr"); //accede a la fila
  params.onBeforeDelete($row);
  $row.remove();
  params.onDelete();
}
function rowAddNew(tabId) {
  //Agrega fila a la tabla indicada.
  var $tab_en_edic = $("#" + tabId); //Table to edit
  var img = params.imageColumn;
  var $filas = $tab_en_edic.find("tbody tr");
  if ($filas.length == 0) {
    //No hay filas de datos. Hay que crearlas completas
    var $row = $tab_en_edic.find("thead tr"); //encabezado
    var $cols = $row.find("th"); //lee campos
    //construye html
    var htmlDat = `<tr>
        <td><img src="" alt="" width="40px"></td>
        <td></td>
        <td class="opinion"></td>
        <td name='buttons'>${newColHtml}</td>
    </tr>`;
    $tab_en_edic.find("tbody").append(htmlDat);
  } else {
    //Hay otras filas, podemos clonar la última fila, para copiar los botones
    var $ultFila = $tab_en_edic.find("tr:last");
    $ultFila.clone().appendTo($ultFila.parent());
    $ultFila = $tab_en_edic.find("tr:last");
    $ultFila.attr("data-id", null);
    var $cols = $ultFila.find("td"); //lee campos
    $cols.each(function () {
      if ($(this).attr("name") == "buttons") {
        //Es columna de botones
      } else if ($(this).find("img").length > 0) {
        $(this).html(imageColumnHtml);
      } else {
        $(this).html(""); //limpia contenido
      }
    });
    $ultFila.find("#bEdit").click();
  }
  params.onAdd();
}
function TableToCSV(tabId, separator) {
  //Convierte tabla a CSV
  var datFil = "";
  var tmp = "";
  var $tab_en_edic = $("#" + tabId); //Table source
  $tab_en_edic.find("tbody tr").each(function () {
    //Termina la edición si es que existe
    if (ModoEdicion($(this))) {
      $(this).find("#bAcep").click(); //acepta edición
    }
    var $cols = $(this).find("td"); //lee campos
    datFil = "";
    $cols.each(function () {
      if ($(this).attr("name") == "buttons") {
        //Es columna de botones
      } else {
        datFil = datFil + $(this).html() + separator;
      }
    });
    if (datFil != "") {
      datFil = datFil.substr(0, datFil.length - separator.length);
    }
    tmp = tmp + datFil + "\n";
  });
  return tmp;
}

function imageChange(e) {
  var img = e.target.files[0];
  if (
    !pixelarity.open(
      img,
      true,
      function (res) {
        var $td = $(e.target).parents("td");
        var $tr = $td.parent("tr");
        $tr.attr("image-updated", true);
        //$td.find("img").attr("src", res.data);
        $td.find("div[class='img-address']").html(res);
      },
      "jpg",
      0.7
    )
  ) {
    alert("Whoops! That is not an image!");
  }
}
