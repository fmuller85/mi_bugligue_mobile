<div data-role="page">
    <div data-role="header">
        <div data-role="controlgroup" data-type="horizontal">
            <a  data-icon="plus" data-inline="true" data-role="button" data-transition="slide" href="index.php?uc=dash" data-theme="b">Accueil</a>
            <a  data-icon="delete" data-inline="true" data-role="button" data-transition="slide" href="index.php?uc=deconnexion" data-theme="b">Se déconnecter</a>
        </div>
    </div>
    <div data-role="content">
        <a id="<?php echo $the_bug->getId(); ?>" class="bt-rapport" data-icon="edit" data-role="button" data-transition="slide" href="index.php?uc=dash&action=rapport&idbug=<?php echo $idBug; ?>" data-theme="b">Créer un rapport</a>

        <h4>Bienvenue sur votre console de gestion</h4>

        <div>
            <p>Date d'ajout : <?php echo $the_bug->getCreated()->format('d.m.Y'); ?></p>

            <?php
                $engineer = "<select data-theme='b' id='".$the_bug->getId()."' class='select-tech' name='technicien'>";
                Foreach($liste_techniciens as $technicien){
                    if($the_bug->getEngineer() != null){
                        if($the_bug->getEngineer()->getId() == $technicien->getId()){
                            $selected = "selected='true'";
                        }else{
                            $selected = "";
                        }
                    }else{
                        $selected = "";
                    }

                    $engineer .= "<option $selected value='".$technicien->getId()."'>".$technicien->getName()."</option>";
                }
                $engineer .= "</select>";

                $datelimite = "";
                if($the_bug->getDatelimite() != null){
                    $datelimite = $the_bug->getDatelimite()->format('d.m.Y');
                }

                $listeproduct = "";

                foreach ($the_bug->getProducts() as $product) {
                    $listeproduct .=  "- ".$product->getName()." ";
                }

            ?>
            <p>Produit concerné : <?php echo $listeproduct; ?></p>
            <p>Description : <?php echo $the_bug->getDescription(); ?></p>
            <form action="index.php?uc=dash&action=modifierbug" method="POST">
            <p>Affecté à : <?php echo $engineer; ?> </p>
            <?php echo $datelimite; ?>
            <p>Date limite : <input data-theme="b" type="date" name="datelimite" id="date" value="<?php echo $datelimite; ?>"  ></p>
            <p><input data-theme="b" type="hidden" name="idbug" value="<?php echo $the_bug->getId(); ?>"></p>

            <p><input data-theme="b" type="submit" name="valider" value="Valider les changements"></p>

            </form>
        </div>
    </div>
    <div data-role="footer" data-position="fixed" data-theme="b">
        <h4>Pied de page</h4>
    </div>
</div>

<div data-role="dialog" id="ticket_dialog">
    <div data-role="header">
        <h1>Detail du ticket <div id="id_ticket"></div></h1>
    </div>
    <div data-role="content">
        <div id="descri_ticket"></div>
        <hr/>
        <div id="solution_ticket"></div>
    </div>
</div>
<script>
    jQuery(function($){
        alert('coucou !!');
        $(".bt-rapport").click(function(){
            alert('coucou');
            /*var idbug = $(this).attr('id');

            $.mobile.changePage('index.php?uc=dash&action=rapport', {
                type : 'POST',
                data : 'idbug='+idbug
            });*/
        });
    })
</script>

</body>
</html>