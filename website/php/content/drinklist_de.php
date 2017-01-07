<script>

$(function() {
    var rows = document.getElementByClassName("container");
});

</script>
<div class="leftBar">
    <h4>Suche Drinks nach Inhalt:</h4>
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