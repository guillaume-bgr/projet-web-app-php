<?php require_once(__DIR__ . "/components/header.php"); ?>
<?php require_once(__DIR__ ."/../controllers/RegisterController.php");
$registerController = new RegisterController;
var_dump($_POST);
if (!empty($_POST)) {
    if (!is_array($registerController->index())) {
        header("Location: /../index.php");
    }
}
?>
<main>
    <div class="register">
        <div class="login__form register-form">
            <h2 class="login__title register-title">S'inscrire</h2>
            <form method="POST" class="flex-form">
                <div class="column">
                    <div class="form-element">
                        <input type="text" class="input" name="first_name" placeholder=" "/>
                        <span class="label">Prénom</span>
                    </div>
                    <?php if (isset($errors['shortString'])) { ?>
                        <p class="error"><i class="fas fa-exclamation-triangle"></i> <?= $errors['shortString'] ?></p>
                    <?php } ?>
                    <div class="form-element">
                        <input type="text" class="input" name="last_name" placeholder=" " />
                        <span class="label">Nom</span>
                    </div>
                    <?php if (isset($errors['shortString'])) { ?>
                        <p class="error"><i class="fas fa-exclamation-triangle"></i> <?= $errors['shortString'] ?></p>
                    <?php } ?>
                    <div class="form-element">
                        <input type="email" class="input" name="email" placeholder=" " />
                        <span class="label">Adresse email</span>
                    </div>
                    <?php if (isset($errors['email'])) { ?>
                        <p class="error"><i class="fas fa-exclamation-triangle"></i> <?= $errors['email'] ?></p>
                    <?php } ?>
                    <div class="form-element">
                        <select class="input" name="role" placeholder=" ">
                            <option>Rôle</option>
                            <option value="1">Administrateur</option>
                            <option value="2">Utilisateur</option>
                            <option value="3">Secrétaire</option>
                        </select>
                    </div>
                </div>
                <div class="column">
                    <div class="form-element">
                        <input type="text" class="input" name="company" placeholder=" " />
                        <span class="label">Entreprise</span>
                    </div>
                    <?php if (isset($errors['shortString'])) { ?>
                        <p class="error"><i class="fas fa-exclamation-triangle"></i> <?= $errors['shortString'] ?></p>
                    <?php } ?>
                    <div class="form-element">
                        <input type="password" class="input" name="password" placeholder=" " />
                        <span class="label">Mot de passe (1 Maj., 1 Min., 8 Chars., 1 Char spéc.)</span>
                    </div>
                    <?php if (isset($errors['password'])) { ?>
                        <p class="error"><i class="fas fa-exclamation-triangle"></i> <?= $errors['password'] ?></p>
                    <?php } ?>
                    <a href="#" class="forgot">J'ai oublié mon mot de passe</a>
                    <div class="buttons">
                        <div></div>
                        <button class="button" type="submit">S'inscrire</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php require_once(__DIR__ . "/components/footer.php");