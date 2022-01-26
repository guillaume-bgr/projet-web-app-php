<?php require_once(__DIR__.'/components/header.php');
require_once(__DIR__.'/../controllers/TeamController.php') ?>
<?php if(!isset($_GET['id'])) { ?>

<main class="main__team">
    <h1 class="team__title">Équipe</h1>
    <div class="team">
        <table id="teammates" style="width: 100%">
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Poste</th>
                <th>Salaire</th>
                <th>Horaires</th>
                <th>Voir</th>
            </tr>
        </thead>
        </table>
    </div>
</main>
<?php } else { 
$teamController = new TeamController;
$employee = $teamController->getEmployee($_GET['id']);
$projects = $teamController->getLastProjects($_GET['id']);
if(isset($_POST)) {
    $teamController->update($_GET['id']);
};
?>
<script>let id = <?= $_GET['id'] ?>;</script>
<main main="employee">
    <div>
        <div class="employee__name">
            <h1 class="team__title"><?= $employee["first_name"].' '.$employee["last_name"] ?></h1>
            <button id="modify" class="button"><i class="fas fa-pencil-alt"></i></button>
        </div>
        <div class="employee__details">
            <div class="column">
                <p>Poste : <?= ucfirst($employee["job"]) ?> <i class="fas fa-briefcase"></i></p>
                <p><?= $employee["salary"] ?>€/mois <i class="fas fa-money-bill-wave"></i>  </p>
                <div>
                    <p class="advantages__title">Avantages salarié</p>
                    <div class="advantages__overlay">
                        <p class="advantages__label"></p>
                    </div>
                    <div class="advantages">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="column column__2">
                <p class="first"><?= $employee["email"] ?> <i class="fas fa-at"></i></p>
                <p><?= $employee["age"] ?> ans <i class="fas fa-hourglass-half"></i></p>
                <p><?= $employee["start_hour"] ?>h | <?= $employee["end_hour"] ?>h  <i class="fas fa-history"></i></p>
                <p><?= $employee["turnover"] ?>€ de chiffres d'affaires <i class="fas fa-cash-register"></i></p>
                <p>Employé depuis le<?= $employee["hire_date"] ?> <i class="fas fa-business-time"></i></p>
            </div>
        </div>
    </div>
    <div class="project-history">
        <p class="history__title">Historique des projets</h1>
        <div class="timeline">
            <?php if (empty($projects)){?>
                <div class="history__card">
                    <p class="project__name no-projects"><?= $employee['first_name'].' '.$employee['last_name'] ?> n'a aucun projet repertorié</p>
                </div>
            <?php } else { foreach($projects as $project) {
                $date = date("d/m/y", strtotime($project['release_date']));    ?>
                <div class="history__card">
                    <p class="project__name"><?= ucfirst($project['name']) ?></p>
                    <p class="client"><?= $project['client'] ?></p>
                    <p class="project__finish">Fini le <?= $date ?></p>
                    <div class="dot"></div>
                </div>
                <div class="line"></div>
            <?php }} ?>
        </div>
    </div>
    <div class="modal__underlay">
        <div class="modal">
            <form method="POST" class="modal__form">
                <p class="dismiss"><i class="fas fa-times"></i></p>
                <div class="form-element">
                    <input type="text" class="input" name="first_name" placeholder=" " value="<?= $employee['first_name'] ?>"/>
                    <span class="label">Prénom</span>
                </div>
                <div class="form-element">
                    <input type="text" class="input" name="last_name" placeholder=" " value="<?= $employee['last_name'] ?>"/>
                    <span class="label">Nom</span>
                </div>
                <div class="form-element">
                    <input type="text" class="input" name="email" placeholder=" " value="<?= $employee['email'] ?>"/>
                    <span class="label">Email</span>
                </div>
                <div class="form-element">
                    <input type="text" class="input" name="job" placeholder=" " value="<?= $employee['job'] ?>"/>
                    <span class="label">Poste</span>
                </div>
                <div class="form-element">
                    <input type="number" class="input" name="age" placeholder=" " value="<?= $employee['age'] ?>"/>
                    <span class="label">Age</span>
                </div>
                <div class="worktime">
                    <div class="form-element">
                        <input type="number" class="input" name="start_hour" placeholder=" " value="<?= $employee['start_hour'] ?>"/>
                        <span class="label">Heure d'arrivée</span>
                    </div>
                    <div class="form-element">
                        <input type="number" class="input" name="end_hour" placeholder=" " value="<?= $employee['end_hour'] ?>"/>
                        <span class="label">Heure de départ</span>
                    </div>
                </div>
                <div class="form-element">
                    <input type="number" class="input" name="turnover" placeholder=" " value="<?= $employee['turnover'] ?>"/>
                    <span class="label">Chiffre d'affaire généré</span>
                </div>
                <div class="form-element">
                    <input type="date" class="input" name="hire_date" placeholder=" " value="<?= $employee['hire_date'] ?>"/>
                    <span class="label">Date d'embauche</span>
                </div>
                <br>
                <div class="buttons">
                    <button type="submit" class="submit button">Enregistrer</button>
                    <button class="button delete"><i class="fas fa-trash"></i></button>
                </div>              
            </form>
        </div>
    </div>
</main>
<?php } require_once(__DIR__.'/components/footer.php');