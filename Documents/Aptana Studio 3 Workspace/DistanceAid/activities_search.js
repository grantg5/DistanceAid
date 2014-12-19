/**
* Javascript to allow for dynamic searching and narrowing selection in the all_activities table.
* @author Grant Gadomski
*/
function number_of_points(){
	/*Hides all activities in the table with a point value lower than the one selected.*/
	var value_element = document.getElementById('points_dropdown');
	var value = parseInt(value_element.options[value_element.selectedIndex].value);
	var activities_table = document.getElementById('activities_table');

	for (var i = 1, row; row = activities_table.rows[i]; i++){
		row.style.display = '';
		if (parseInt(row.cells[2].innerText) < value){
			row.style.display = 'none';
		}
		else {
			search_activities(row);
		}
	}
}

function search_activities(row){
	/**
	Hides the activity if it does not have all words searched in either their title or description.
	@param row: Current row being searched.
	*/
	var raw_search = document.getElementById('activities_search').value.toLowerCase();
	var search_strings = raw_search.split(" ");
	for (var i = 0; i < search_strings; i++){
		if (search_strings[i] == ''){
			search_strings.splice(i, 1);
		}
	}

	var title = row.cells[0].innerText.toLowerCase();
	var description = row.cells[1].innerText.toLowerCase();

	for (var j=0; j<search_strings.length; j++){
		search_string = search_strings[j];
		if (title.indexOf(search_string) == -1){
			if (description.indexOf(search_string) == -1){
				row.style.display = 'none';
				break;
			}
		}
	}
}