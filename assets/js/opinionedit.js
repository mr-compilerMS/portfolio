"use strict";
var params = null;
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

$.fn.OpinionEdit = function (options) {
  var defaults = {
    columnsEd: null,
    $addButton: null,
    imageColumn: false,
    onEdit: function () {},
    onBeforeDelete: function () {},
    onDelete: function () {},
    onAdd: function () {},
  };
  params = $.extend(defaults, options);
  this.find("thead tr").append('<th name="buttons">Options</th>');
  this.find("tbody tr").append(colEdicHtml);
  var $tabedi = this;

  if (params.$addButton != null) {
    params.$addButton.click(function () {
      rowAddNew($tabedi.attr("id"));
    });
  }

  if (params.columnsEd != null) {
    colsEdi = params.columnsEd.split(",");
  }
};
function IterarCamposEdit($cols, tarea) {
  var n = 0;
  $cols.each(function () {
    n++;
    if ($(this).attr("name") == "buttons") return;
    if (!EsEditable(n - 1)) return;
    tarea($(this));
  });

  function EsEditable(idx) {
    if (colsEdi == null) {
      return true;
    } else {
      for (var i = 0; i < colsEdi.length; i++) {
        if (idx == colsEdi[i]) return true;
      }
      return false;
    }
  }
}
function FijModoNormal(but) {
  $(but).parent().find("#bAcep").hide();
  $(but).parent().find("#bCanc").hide();
  $(but).parent().find("#bEdit").show();
  $(but).parent().find("#bElim").show();
  var $row = $(but).parents("tr");
  $row.attr("id", "");
}
function FijModoEdit(but) {
  $(but).parent().find("#bAcep").show();
  $(but).parent().find("#bCanc").show();
  $(but).parent().find("#bEdit").hide();
  $(but).parent().find("#bElim").hide();
  var $row = $(but).parents("tr");
  $row.attr("class", "editing");
}
function ModoEdicion($row) {
  if ($row.attr("class") == "editing") {
    return true;
  } else {
    return false;
  }
}
function rowAcep(but) {
  var $row = $(but).parents("tr");
  var $cols = $row.find("td");
  if (!ModoEdicion($row)) return;

  IterarCamposEdit($cols, function ($td) {
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
      var cont = $td.find("input").val();
      $td.html(cont);
    }
  });
  $row.removeClass("editing");
  FijModoNormal(but);
  params.onEdit($row);
}
function rowCancel(but) {
  var $row = $(but).parents("tr");
  var $cols = $row.find("td");
  if (!ModoEdicion($row)) return;

  IterarCamposEdit($cols, function ($td) {
    if ($td.find("div[class='img-address']").length > 0) {
      $td.html(
        "<img src='" +
          $td.find("div[class='img-address']").html() +
          "'width='40px'/> "
      );
    } else {
      var cont = $td.find("div").html();
      $td.html(cont);
    }
  });
  $row.removeClass("editing");
  FijModoNormal(but);
}
function rowEdit(but) {
  var $row = $(but).parents("tr");

  var $cols = $row.find("td");
  if (ModoEdicion($row)) return;

  IterarCamposEdit($cols, function ($td) {
    var cont = $td.html();
    if (cont.search("img") != -1) {
      var img = cont.split("src=")[1].split('"')[1];
      var div =
        '<div style="display: none;" class="img-address">' + img + "</div>";
      var input =
        '<input class="form-control input-sm" id="img-input"  value="' +
        img +
        '" type="file" accept="image/*" onchange="imageChange(event)"/>';
      $td.html(div + input);
    } else {
      var div = '<div style="display: none;">' + cont + "</div>";
      var input =
        '<input class="form-control input-sm" maxlength="20"  value="' +
        cont +
        '">';
      if ($td.hasClass("opinion"))
        input =
          '<input class="form-control input-sm" maxlength="100"  value="' +
          cont +
          '">';
      $td.html(div + input);
    }
  });
  FijModoEdit(but);
}
function rowElim(but) {
  var $row = $(but).parents("tr");
  params.onBeforeDelete($row);
  params.onDelete();
}
function rowAddNew(tabId) {
  var $tab_en_edic = $("#" + tabId);
  var img = params.imageColumn;
  var $filas = $tab_en_edic.find("tbody tr");

  var $row = $tab_en_edic.find("thead tr");
  var $cols = $row.find("th");

  var htmlDat = `<tr>
        <td><img src="" alt="" width="40px"></td>
        <td></td>
        <td class="opinion"></td>
        <td name='buttons'>${newColHtml}</td>
    </tr>`;
  $tab_en_edic.find("tbody").append(htmlDat);
  var $ultFila = $tab_en_edic.find("tr:last");
  $ultFila.find("#bEdit").click();

  params.onAdd();
}
function TableToCSV(tabId, separator) {
  var datFil = "";
  var tmp = "";
  var $tab_en_edic = $("#" + tabId);
  $tab_en_edic.find("tbody tr").each(function () {
    if (ModoEdicion($(this))) {
      $(this).find("#bAcep").click();
    }
    var $cols = $(this).find("td");
    datFil = "";
    $cols.each(function () {
      if ($(this).attr("name") == "buttons") {
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
