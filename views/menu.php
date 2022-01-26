<?php require_once(__DIR__.'/components/header.php');?>
<main class="menu">
    <div class="menu__title">
        <h1>BUSYNESS</h1>
    </div>
    <div class="menu__buttons">
        <div class="menu__column column-1">
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
        </div>
        <div class="menu__column column-2">
            <div class="square transparent"></div>
            <div class="square menu__button hover "><a href="/views/team.php">Equipe</a></div>
            <div class="square menu__button hover"><a href="#">À venir..</a></div>
            <div class="square"></div>
        </div>
        <div class="menu__column column-3">
            <div class="square transparent"></div>
            <div class="square transparent"></div>
            <div class="square menu__button hover"><a href="/views/project-list.php">Projets</a></div>
            <div class="square"></div>
        </div>
        <div class="menu__column column-4">
            <div class="square transparent"></div>
            <div class="square transparent"></div>
            <div class="square transparent"></div>
            <div class="square"></div>
        </div>
    </div>
</main>

<?php require_once(__DIR__.'/components/footer.php');