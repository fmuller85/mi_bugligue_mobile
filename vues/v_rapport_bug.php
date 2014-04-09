<?php
    $bugDescription =  $the_bug->getDescription();

    foreach ($the_bug->getProducts() as $product) {
        $productName = $product->getName();
    }

?>

<article>

    <form name="new_rapport" method="POST" action="index.php?uc=dash&action=reparer&idBug=<?php echo $the_bug->getId(); ?>"  >
        <h3>Enregistrement d'un rapport</h3>
        <ul>
            <li>
                <label>Nom de l'appli : </label>
                <label><?php echo $productName; ?></label>
            </li>
            <li>
                <label>Description du problème : </label>
                <label><?php echo $bugDescription; ?></label>
            </li>
            <li>
                <label for="text">Rapport : </label>
                <textarea id="text" name="rapport" size="500" maxlength="500"></textarea>
            </li>
        </ul>
        <p>
            <input class="action" type="submit" value="Valider" name="valider">
            <input id="bt_retour" type="button" value="Retour" name="retour">
        </p>
    </form>
</article>

<script>
    jQuery(function($){
        $('#bt_retour').click(function(){
            window.location="index.php?uc=dash";
        });
    })
</script>