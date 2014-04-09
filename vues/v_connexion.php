<form name="connexion" method="POST" action="index.php?uc=connexion">
    <div class="center form-connexion">
        <legend>Connexion au Help Desk</legend>
        <br />
        <ul>
            <li>
                <label for="pseudo">Pseudo</label>
                <input id="pseudo" type="text" name="pseudo" size="30" maxlength="45">
            </li>
            <li>
                <label for="mdp">Mot de passe</label>
                <input id="mdp" type="password" name="mdp" size="30" maxlength="45">
            </li>
        </ul>
        <p>
            <input type="submit" value="Valider" name="valider">
            <input type="reset" value="Annuler" name="annuler">
        </p>
    </div>
</form>