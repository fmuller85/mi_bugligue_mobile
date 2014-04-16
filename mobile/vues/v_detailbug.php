<div data-role="page">
    <div data-role="header">
        <h1>En-tête</h1>
    </div>
    <div data-role="content">
        <h4>Bienvenue sur votre console de gestion</h4>
        <div data-role="controlgroup" data-type="horizontal">
            <a style="width: 50%;" data-icon="plus" data-inline="true" data-role="button" data-transition="slide" href="index.php?uc=dash&action=nouveau" data-theme="b">Nouveau bug</a>
            <a style="width: 50%;" data-icon="delete" data-inline="true" data-role="button" data-transition="slide" href="index.php?uc=deconnexion" data-theme="b">Se déconnecter</a>
        </div>
        <div>
            <p>Date d'ajout : <?php echo $the_bug->getCreated()->format('d.m.Y'); ?></p>

            <p>Affecté à : <?php if ($the_bug->getEngineer() != null){
                                    echo $the_bug->getEngineer()->getName();
                                }else{
                                    echo "non affecté";
                                } ?>
            </p>
            <p>Description : <?php echo $the_bug->getDescription(); ?></p>
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

    })
</script>

</body>
</html>