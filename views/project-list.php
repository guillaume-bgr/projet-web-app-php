<?php require_once(__DIR__ . '/components/header.php');
require_once(__DIR__ . '/../controllers/ProjectController.php');
$projectController = new ProjectController;
if (!isset($_GET['id'])) {
    $projects = $projectController->index();
    if (!empty($_POST)) {
        $projectController->update($_GET['form_id']);
    };
?>
    <main class="projects">
        <h1 class="project__title">Projets</h1>
        <div class="project__list__overlay"></div>
        <div class="project__list" id="display">
            <?php for ($i = 4; $i < 9; $i++) { ?>
                <div class="project__card" data-id="<?= $projects[$i]['id'] ?>">
                    <div class="content">
                        <h2 class="title"><?= ucfirst($projects[$i]['name']); ?></h2>
                        <p class="client"><?= ucfirst($projects[$i]['client']); ?></p>
                        <p class="finish-date">Fini le <?= date("d/m/y", strtotime($projects[$i]['release_date'])); ?></p>
                    </div>
                </div>
            <?php } ?>
            <?php for ($i = 0; $i < 4; $i++) { ?>
                <div class="project__card" data-id="<?= $projects[$i]['id'] ?>">
                    <div class="content">
                        <h2 class="title"><?= ucfirst($projects[$i]['name']); ?></h2>
                        <p class="client"><?= ucfirst($projects[$i]['client']); ?></p>
                        <p class="finish-date">Fini le <?= date("d/m/y", strtotime($projects[$i]['release_date'])); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="project__controls">
            <div class="navigate">
                <button class="previous button" id="previous-project"><i class="fas fa-long-arrow-alt-left"></i> Précédent</button>
                <a href="" class="get-current button">Voir le projet</a>
                <button class="next button" id="next-project">Suivant <i class="fas fa-long-arrow-alt-right"></i></button>
            </div>
            <button class="start button">Démarrer un nouveau projet</button>
        </div>
    </main>
<?php } else if (isset($_GET['id'])) {
    $project = $projectController->getProject($_GET['id']);
    $steps = $projectController->getProjectSteps($_GET['id']);
    $staffs = $projectController->getProjectStaff($_GET['id']);
    $meetings = $projectController->getProjectMeetings($_GET['id']);
?>
    <div class="title-container">
        <h1 class="single__project__title">Projet <?= ucfirst($project['name']) ?></h1>
        <button id="modifyDetails" class="button"><i class="fas fa-pen"></i></button>
    </div>
    <main class="see-project">
        <div class="general">
            <div class="details">
                <div>
                    <p class="client">Client : <?= $project['client'] ?></p>
                    <p>Description : <?= $project['specs'] ?></p>
                </div>
                <p class="delivery">Date livrable : <?= $project['release_date'] ?></p>
            </div>
        </div>
        <div class="team-meetings">
            <div>
                <div class="title-container">
                    <h2>Equipe</h2>
                </div>
                <ul>
                    <?php foreach ($staffs as $staff) { ?>
                        <li><?= $staff['first_name'] . ' ' . $staff['last_name'] . ' : ' . $staff['role'] ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div>
                <h2>Réunions à venir</h2>
                <ul>
                    <?php foreach ($meetings as $meeting) { ?>
                        <li><i class="dot fas fa-circle"></i> <?= date("d/m", strtotime($meeting['datetime'])) . ' ' . date("G:i", strtotime($meeting['datetime'])) . ' ' . $meeting['label'] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="steps">
            <h2>Dernières étapes</h2>
            <?php foreach ($steps as $step) { ?>
                <div>
                    <h3><?= $step['title'] ?></h3>
                    <p><?= $step['description'] ?></p>
                </div>
            <?php } ?>

        </div>
    </main>
    <div class="modal__underlay" id="detailModal">
        <div class="modal">
            <form method="POST" action="/views/project-list.php?form_id=<?= $_GET['id'] ?>&type_of_data=details" class="modal__form">
                <p class="dismiss"><i class="fas fa-times"></i></p>
                <div class="form-element">
                    <input type="text" class="input" name="name" placeholder=" " value="<?= $project['name'] ?>" />
                    <span class="label">Nom projet</span>
                </div>
                <div class="form-element">
                    <input type="text" class="input" name="client" placeholder=" " value="<?= $project['client'] ?>" />
                    <span class="label">Client</span>
                </div>
                <div class="form-element">
                    <input type="text" class="input" name="specs" placeholder=" " value="<?= $project['specs'] ?>" />
                    <span class="label">Description</span>
                </div>
                <br>
                <div class="buttons">
                    <button type="submit" class="submit button">Enregistrer</button>
                    <button class="button delete"><i class="fas fa-trash"></i></button>
                </div>
            </form>
        </div>
    </div>
<?php }
require_once(__DIR__ . '/components/footer.php');
