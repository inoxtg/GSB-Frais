function setClass(el, className, fn){
    if(el) {
      for (var i of el) {
        if(typeof className === "string")
           i.setAttribute("class", className);
        if(fn) fn(i);
      }
    }
  }

function add_frais()
{
    let table = document.getElementById("table_hors_frais");
    nb_input = table.rows.length-2;

    var row = table.getElementsByTagName("tr")[table.rows.length - 1];
    colum = row.getElementsByTagName("td")[0];

    input_value = colum.getElementsByTagName("input")[0].value;

    if(input_value != "")
    {
        nb_input++;

        let newRow = table.insertRow(-1);

        let textboxCell = newRow.insertCell(0);
        let dateCell = newRow.insertCell(1);
        let inputCell = newRow.insertCell(2);
        let removeCell = newRow.insertCell(3);

        dateCell.className = "td_date";

        textboxCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input + '][libelle]" id="td_libelle_' + nb_input + '" class="input_libelle" type="text" value="">';
        dateCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input +'][date]" id="td_date_' + nb_input + '" class="input_date" type="date">';
        inputCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input +'][input]" id="td_input_' + nb_input + '" class="input_prix" type="number" value="0" min="0">';
        removeCell.innerHTML = '<i class="fa-solid fa-trash" onclick="remove_frais(' + nb_input + ')">';
    }
}

function remove_frais(button)
{
  let table = document.getElementById("table_hors_frais");
  table.deleteRow(button.parentElement.parentElement.rowIndex);
}