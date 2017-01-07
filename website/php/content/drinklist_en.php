<script>
    var filterArray = [];
    $(function() {
    });

    function filterDrink(filterWord) {
        var index = filterArray.indexOf(filterWord.text);
        if (index===-1) {
            filterArray[filterArray.length] = filterWord.text;
            filterWord.classList.add("activeFilter");
        } else {
            filterArray.splice(index, 1);
            filterWord.classList.remove("activeFilter");
        }
        console.log(filterArray);
        applyFilters();
    }

    function applyFilters() {
        $(".container").hide();
        if (filterArray.length === 0) {
            $(".container").show();
        } else {
            $.each(filterArray, function(i, v){
                $(".container").filter(":contains('" + v + "')").show();
            });
        }
    }

</script>
<style>
    .linkable {
        cursor: pointer;
    }
    .activeFilter {
        border: 1px solid rgb(21, 110, 36);
    }
</style>
<div class="leftBar">
    <h4>Suche Drinks nach Inhalt:</h4>
    <p id="filterOptions">
    </p>
        <a id="filter_Gin" onclick="filterDrink(filter_Gin)" class="linkable">Gin</a>
        <a id="filter_Rum" onclick="filterDrink(filter_Rum)" class="linkable">Rum</a>
        <a id="filter_Vodka" onclick="filterDrink(filter_Vodka)" class="linkable">Vodka</a>
        <a id="filter_Whiskey" onclick="filterDrink(filter_Whiskey)" class="linkable">Whiskey</a>
        <a id="filter_Cachaca" onclick="filterDrink(filter_Cachaca)" class="linkable">Cachaça</a>
        <a id="filter_Cream" onclick="filterDrink(filter_Cream)" class="linkable">Cream of Coconut</a>
        <a id="filter_Pfirsich" onclick="filterDrink(filter_Pfirsich)" class="linkable">Peach liqueur</a>
</div>
<div id="wrapper" class="content drinklist">
    <h1>Alle Drinks</h1>
    <div class='row drinkheader'>
        <div class='col-left'>
        </div>
        <div class='col-small'>
            <h4>Bewertung</h4>
        </div>
        <div class='col-right'>
            <h4>Zutaten</h4>
        </div>
    </div>
    <?php
        $drinklistTable = new DrinklistTable();
        $drinklistTable->render($this->model, $this->lang);
    ?>
</div>
<div class="rightBar">
    <?php
        $drinkSearch = new DrinkSearch();
        $drinkSearch->render($this->lang);
    ?>
</div>
<script>
    var modal = document.getElementById("modal");
    var elem = document.getElementsByClassName("recommend");
    var span = document.getElementsByClassName("close")[0];

    elem.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>