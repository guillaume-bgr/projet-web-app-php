<?php require_once(__DIR__ . "/components/header.php"); ?>
<div class="login">
    <div class="login__display">
        <img src="../assets/img/illustration.jpg" alt="illustration">
        <h1 class="slogan">Gardez un oeil sur l'évolution de votre entreprise.</h1>
    </div>
    <div class="login__form">
        <h2 class="login__title">J'ai oublié mon mot de passe</h2>
        <form method="post" autocomplete="off">
            <div class="form-element">
                <input type="text" class="input" name="email" placeholder=" "/>
                <span class="label">Adresse email</span>
            </div>
            <a href="#" class="forgot">J'ai oublié mon mot de passe</a>
            <div class="buttons">
                <button class="button pwd-reset" type="submit">Réinitialiser mon mot de passe</button>
            </div>
        </form>
    </div>
</div>
<?php require_once(__DIR__ . "/components/footer.php");