function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}


function _addRowToTable(table, ing) {
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.textContent = ing;
}

function drop(ev) {
    var mixTable = document.getElementById('mixing');
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var ingredient = document.getElementById(data);
    _addRowToTable(mixTable, ingredient.textContent);
    ingredient.parentNode.removeChild(ingredient);
}

