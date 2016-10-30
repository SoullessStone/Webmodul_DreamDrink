
var drinks = [
    {
        "name": "GinGin",
        "beschreibung": "Gin und Gingerale, ein Genuss", 
        "bewertung": 1
    },
    {
        "name": "Tonico Mediterraneo",
        "beschreibung": "Tutto bene", 
        "bewertung": 1
    },
    {
        "name": "Moscow Mule",
        "beschreibung": "Ein Esel, wer den nicht gerne hat", 
        "bewertung": 1
    },
    {
        "name": "Island Trading",
        "beschreibung": "Cola und Rum, wieso ist da noch keiner draufgekommen?", 
        "bewertung": 1
    },
    {
        "name": "Eigenkreation",
        "beschreibung": "Cola und Rum, wieso ist da noch keiner draufgekommen?", 
        "bewertung": 1
    },
    {
        "name": "Felsenau Bier",
        "beschreibung": "Gin und Gingerale, ein Genuss", 
        "bewertung": 1
    }
];

function _getClearedTable() {
    var oldDrinkTable = document.getElementById('drinks');
    var newDrinkTable = document.createElement('table');
    newDrinkTable.setAttribute("id", "drinks");
    oldDrinkTable.parentNode.replaceChild(newDrinkTable, oldDrinkTable);
    return newDrinkTable;
}

function _addHeaderToTable(table, lang) {
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = lang==='de' ? "<b>Name</b>" : "<b>Name</b>";
    cell2.innerHTML = lang==='de' ? "<b>Beschreibung</b>" : "<b>Description</b>";
    cell3.innerHTML = lang==='de' ? "<b>Bewertung</b>" : "<b>Rating</b>";
}

function _addRow(table, drink) {
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = drink.name;
        cell2.innerHTML = drink.beschreibung;
        cell3.innerHTML = drink.bewertung;
}

function buildDrinkList(lang) {
    var searchText = document.getElementById('filter_input').value;
    console.log('filter table for keyword: ' + searchText);

    var table = _getClearedTable();
    if (lang !== "en" && lang !== "de") {
        lang = "de";
    }
    _addHeaderToTable(table, lang);
    
    var drinksToShow = _.filter(drinks, function(drink) {
        return _.toLower(drink.name).indexOf(_.toLower(searchText)) !== -1 
                || 
                _.toLower(drink.beschreibung).indexOf(_.toLower(searchText)) !== -1;
    });
    _.forEach(drinksToShow, function(drink) {
        _addRow(table, drink);
    });
}

window.onload=buildDrinkList;