<?php require_once(__DIR__ . "/views/components/header.php");
require_once(__DIR__ . "/controllers/LoginController.php");
$loginCtrl = new LoginController;
$errors = $loginCtrl->index();
// if ($_SESSION) {
//     var_dump($_SESSION);
// }
?>
<main>
    <div class="login">
        <div class="login__display">
            <img src="assets/img/illustration.jpg" alt="illustration">
            <h1 class="slogan">Gardez un oeil sur l'évolution de votre entreprise.</h1>
        </div>
        <div class="login__form">
            <h2 class="login__title">Se connecter</h2>
            <form method="post">
                <div class="form-element">
                    <input type="text" class="input" name="email" placeholder=" " value="<?= $_POST['email'] ?? '' ?>" />
                    <span class="label">Adresse email</span>
                    <?php if (isset($errors['email'])) { ?>
                        <p class="error"><i class="fas fa-exclamation-triangle"></i> <?= $errors['email'] ?></p>
                    <?php } ?>
                </div>
                <div class="form-element">
                    <input type="password" class="input" name="password" placeholder=" " />
                    <span class="label">Mot de passe</span>
                    <?php if (isset($errors['password'])) { ?>
                        <p class="error"><i class="fas fa-exclamation-triangle"></i> <?= $errors['password'] ?></p>
                    <?php } ?>
                </div>
                <a href="/views/forgot.php" class="forgot">J'ai oublié mon mot de passe</a>
                <div class="buttons">
                    <a class="button register" href="/views/register.php">S'inscrire</a>
                    <button class="button" type="submit"">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php require_once(__DIR__ . "/views/components/footer.php");