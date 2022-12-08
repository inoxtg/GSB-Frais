
const dat = new Date();
let month = String(dat.getMonth() + 1).padStart(2, '0');
let day = String(dat.getDate()).padStart(2, '0');
let year = dat.getFullYear();

function add_frais()
{
    let table = document.getElementById("table_hors_frais");
    nb_input = table.rows.length-2;
    
    input_value = "";
    if(nb_input > -1)
    {
      var row = table.getElementsByTagName("tr")[table.rows.length - 1];
      colum = row.getElementsByTagName("td")[0];

      input_value = colum.getElementsByTagName("input")[0].value;
    }
    if(input_value != "" || nb_input == -1)
    {
        nb_input++;

        let newRow = table.insertRow(-1);

        let textboxCell = newRow.insertCell(0);
        let dateCell = newRow.insertCell(1);
        let inputCell = newRow.insertCell(2);
        let removeCell = newRow.insertCell(3);

        dateCell.className = "td_date";
        removeCell.className = "td_trash";

        textboxCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input + '][libelle]" id="td_libelle_' + nb_input + '" class="input_libelle" type="text" value="">';
        dateCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input +'][date]" id="td_date_' + nb_input + '" class="input_date" type="date" min="' + year + '-' + month + '-01" max="' + year + '-' + month + '-31">';
        inputCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input +'][input]" id="td_input_' + nb_input + '" class="input_prix" type="number" value="0" min="0">';
        removeCell.innerHTML = '<i class="fa-solid fa-trash" onclick="openModal(this)">';
    }
}
function closeModal()
{
    document.getElementById("oui-supr").remove();
    var modal = document.getElementById('page-modal');
    modal.style.display = 'none';
}
function openModal(button)
{
    var modal = document.getElementById('page-modal');
    modal.style.display = 'block';

    var zoneBtn = document.getElementById('modal-zone-btn')
    zoneBtn.innerHTML += '<button class = "btnModal" id ="oui-supr" onclick="remove_frais(' + button.parentElement.parentElement.rowIndex + ')" >OUI</button>';
}
function remove_frais(button)
{
  closeModal();
  let table = document.getElementById("table_hors_frais");
  table.deleteRow(button);
}