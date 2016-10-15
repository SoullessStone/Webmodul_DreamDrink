<?php if (!(basename($_SERVER['REQUEST_URI'], '.php') === 'mixer' && !(basename($_SERVER['REQUEST_URI'], '.php') === 'login'))) {

    echo '<div class="drinks">
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    <a href="">Drink 1<br/></a>
    </div>';

} else {
    echo '<div class="ingredients">Zutat<br/>
            Zutat<br/>
            Zutat<br/>
            Zutat<br/>
            Zutat<br/>
            Zutat<br/>
            Zutat<br/>
            </div>';
}; ?>