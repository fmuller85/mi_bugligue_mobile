<a data-mini="true" data-inline="true" data-role="button" data-transition="slide" href="index.php?uc=dash" data-theme="c"><span class="ui-btn-inner"><span class="ui-btn-text">Dashboard Club</span></span></a>
<form name="new_bug" method="POST" action="index.php?uc=dash&action=nouveau" data-rel="dialog">
    <fieldset>
    <legend>Signalement d'un nouveau bug</legend>
        <div data-role="fieldcontain">
            <label for="objet">Objet : </label>
            <input id="objet" type="text" name="objet" size="50" maxlength="50">
        </div>
        <div data-role="fieldcontain">
            <label for="libelle">Description du problème : </label>
            <textarea id="libelle" name="libelle" size="500" maxlength="500"></textarea>
        </div>
        <div data-role="fieldcontain">
            <label for="apps">Application(s) concernées : </label>
            <select data-native-menu="false" multiple id="apps" name="apps[]">
                <?php
                foreach($the_products as $p){
                    echo '<option value="'.$p->getId().'">'.$p->getName().'</option>';
                }
                ?>
            </select>
        </div>
    <p>
        <input data-theme="b" type="submit" value="Valider" name="valider">
        <input data-theme="b" type="reset" id='bt-annuler' value="Annuler" name="annuler">
    </p>
    </fieldset>
</form>
<script>
    $('#bt-annuler').click(function(){
        window.location="index.php?uc=dash";
    });
</script>