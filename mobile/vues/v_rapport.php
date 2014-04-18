<div data-role="page">
    <div data-role="header">
        <div data-role="controlgroup" data-type="horizontal">
            <a  data-icon="plus" data-inline="true" data-role="button" data-transition="slide" href="index.php?uc=dash" data-theme="b">Accueil</a>
            <a  data-icon="delete" data-inline="true" data-role="button" data-transition="slide" href="index.php?uc=deconnexion" data-theme="b">Se déconnecter</a>
        </div>
    </div>
    <div data-role="content">
        <h4>Créer un rapport</h4>
        <div>
            <form action="index.php?uc=dash&action=rapport" method="POST">
                <label for="rapport">Rapport : </label>
                <textarea id="rapport" name="rapport"></textarea>
                <input type="hidden" name="idbug" value="<?php echo $idBug ?>"/>
                <input data-theme="b" type="submit" name="valider" value="Enregistrer le rapport"/>
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
        $(".bt-rapport").click(function(){
            var idbug = $(this).attr('id');

            $.mobile.changePage('index.php?uc=dash&action=rapport', {
                type : 'POST',
                data : 'idbug='+idbug
            });
        });

    })
</script>

</body>
</html>