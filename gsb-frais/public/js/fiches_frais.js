nb_input = 0

function add_frais()
{
    var current_input = 'td_libelle_'+nb_input;
    var input_value = document.getElementById(current_input).value

    if(input_value != "")
    {
        nb_input++;
        let table = document.getElementById("table_hors_frais");

        let newRow = table.insertRow(-1);

        let textboxCell = newRow.insertCell(0);
        let dateCell = newRow.insertCell(1);
        let inputCell = newRow.insertCell(2);

        textboxCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input + '][libelle]" id="td_libelle_' + nb_input + '" class="input_libelle" type="text" value="">';
        dateCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input +'][date]" id="td_date_' + nb_input + '" class="input_date" type="date">';
        inputCell.innerHTML = '<input name="frais_hors_forfait[' + nb_input +'][input]" id="td_input_' + nb_input + '" class="input_prix" type="number" value="0" min="0">';

    }
}
