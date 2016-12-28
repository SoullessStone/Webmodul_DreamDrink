
<div class="leftBar">
    <h4>Suche Drinks nach Inhalt:</h4>
</div>
<div class="content">
    <h1>Alle Drinks</h1>
    <p>Alle Drinks inkl. deiner Bewertung!</p>

    <?php
        $drinklistTable = new DrinklistTable();
        $drinklistTable->render($this->model);
    ?>
</div>
<div class="rightBar">
    <h4>Beliebteste Drinks</h4>
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