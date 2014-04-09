<div id="liste_tickets">
    <h2>Tickets en cours</h2>
    <table>
        <tr><th></th><th >Affecté à</th><th class="col-produit" >Produit</th><th class="col-date">Date de création</th><th class="col-date">Date limite</th><th class="col-description">Description</th><th class="col-rapport">Rapport</th></tr>
        <?php
        foreach ($bugs_en_cours as $bug) {
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "Non affecté";

            }

            if($bug->getDatelimite() != null){
                $datelimite = $bug->getDatelimite()->format('d.m.Y');
                if($bug->getDatelimite()->getTimeStamp() <= $bug->getCreated()->getTimeStamp()){
                    $nbJourRestant = date('d', $bug->getDatelimite()->getTimeStamp() - $bug->getCreated()->getTimeStamp())."j ";
                    $nbMoisRestant = date('m', $bug->getDatelimite()->getTimeStamp() - $bug->getCreated()->getTimeStamp());
                    $nbMoisRestant = intval($nbMoisRestant)-1;
                    $nbMoisRestant .= "m restant(s)";
                }else{
                    $nbJourRestant = "";
                    $nbMoisRestant = "";
                }

            }else{
                $datelimite = "non défini";
                $nbJourRestant = "";
                $nbMoisRestant = "";
            }

            echo "<tr class='unticket' value='".$bug->getId()."'>";
            echo "<td><img src='./images/en_cours.png' width='30px' height='30px'/></td>";
            echo "<td><span class='nomTechnicien' >".$engineer."</span></td>";

            echo "<td>";
            foreach ($bug->getProducts() as $product) {
                echo "".$product->getName()." ";
            }
            echo "</td>";

            echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
            echo "<td><span class='dateLimite'>".$datelimite."</span>".$nbJourRestant.$nbMoisRestant."</td>";
            echo "<td><span class='bt-voir-description'>Voir description</span></td>";
            echo "<td><a href='index.php?uc=dash&action=reparer&idBug=".$bug->getId()."'> Créer un rapport de résolution</a></td><br>";

            if ($bug->getEngineer() == null){

            }

            echo "</tr>";
            echo "<tr id='description".$bug->getId()."' class='description hidden'><td colspan='6'><img src='".$bug->getScreen()."' />".$bug->getDescription()."</td></tr>";

        }
        ?>
    </table>
</div>

<br />
<br />

<div id="liste_tickets">
    <h2>Tickets résolus</h2>
    <br />
    <table>
        <tr><th></th><th >Affecté à</th><th class="col-produit" >Produit</th><th class="col-date">Date de création</th><th class="col-date">Date de résolution</th><th class="col-date">Date limite</th><th class="col-description">Description</th></tr>
        <?php


        foreach ($bugs_fermes as $bug) {
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "Non affecté";
            }

            if($bug->getDatelimite() != null){
                $datelimite = $bug->getDatelimite()->format('d.m.Y');
            }else{
                $datelimite = '00-00-0000';
            }

            echo "<tr class='unticket' value='".$bug->getId()."'>";
            echo "<td><img src='./images/ferme.png' width='30px' height='30px'/></td>";
            echo "<td><span class='nomTechnicien' >".$engineer."</span></td>";

            echo "<td>";
            foreach ($bug->getProducts() as $product) {
                echo "".$product->getName()." ";
            }
            echo "</td>";

            echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
            echo "<td>".$bug->getRapport()->getCreated()->format('d.m.Y')."</td>";
            echo "<td>".$datelimite."</td>";
            echo "<td><span class='bt-voir-description'>Voir description</span></td>";


            if ($bug->getEngineer() == null){

            }

            echo "</tr>";
            echo "<tr id='description".$bug->getId()."' class='description hidden'><td colspan='6'><img src='".$bug->getScreen()."' />".$bug->getDescription()."</td></tr>";

        }
        ?>
    </table>
</div>

<script>
    jQuery(function($){

        $( "body" ).on( "click",'.bt-voir-description', function() {
            $('.description').hide();
            var idbug = $(this).parent().parent().attr('value');
            $('.bt-cacher-description').each(function(){
                $(this).parent().html('<span class="bt-voir-description">Voir description</span>');
            });
            var description = $('#description'+idbug);
            description.slideDown();
            $(this).parent().html('<span class="bt-cacher-description">Cacher description</span>');
        });

        $( "body" ).on( "click",'.bt-cacher-description', function() {
            var idbug = $(this).parent().parent().attr('value');
            $('.description').hide();
            $(this).parent().html('<span class="bt-voir-description">Voir description</span>');
        });


    });
</script>