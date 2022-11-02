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
        let inputCell = newRow.insertCell(1);

        textboxCell.className = "td_libelle";
        inputCell.className = "td_input";

        textboxCell.innerHTML = '<input id="td_libelle_' + nb_input + '" class="input_libelle" type="text" value="">';
        inputCell.innerHTML = '<input id="td_input_' + nb_input + '" class="input_prix" type="number" value="0" min="0">';

    }
}
