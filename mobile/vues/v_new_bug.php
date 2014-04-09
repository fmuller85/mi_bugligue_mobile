
<form name="new_bug" method="POST" action="index.php?uc=dash&action=nouveau">
    <fieldset>
    <legend>Signalement d'un nouveau bug</legend>
    <p>
        <label for="objet">Objet : </label>
        <input id="objet" type="text" name="objet" size="50" maxlength="50">
    </p>
    <p>
        <label for="libelle">Description du problème : </label>
        <textarea id="libelle" name="libelle" size="500" maxlength="500"></textarea>
    </p>
    <p>
        <label for="apps">Application(s) concernées : </label>
        <select multiple id="apps" name="apps[]">
            <?php
            foreach($the_products as $p){
                echo '<option value="'.$p->getId().'">'.$p->getName().'</option>';
            }
            ?>
        </select>
    </p>
    <p>
        <input type="submit" value="Valider" name="valider">
        <input type="reset" value="Annuler" name="annuler">
    </p>
    </fieldset>
</form>