<div data-role="page">
    <div data-role="header">
        <div data-role="controlgroup" data-type="horizontal">
            <a style="width: 49%; display: inline-block" data-icon="plus"  data-role="button" data-transition="slide" href="index.php?uc=dash" data-theme="b">Accueil</a><a style="width: 49%; display: inline-block" data-icon="delete"  data-role="button" data-transition="slide" href="index.php?uc=deconnexion" data-theme="b">Se déconnecter</a>
        </div>
    </div>
    <div data-role="content">
        <h4>Bienvenue sur votre console de gestion</h4>
        <div data-role="collapsible-set" data-theme="b" data-content-theme="a">
            <div id="liste_tickets">
                <div data-role="collapsible" data-collapsed="true">
                    <h3>Tickets en cours</h3>
                    <p>
                    <table>
                        <tr><th></th><th>Date</th><th>Technicien</th><th>Info</th></tr>
                        <?php
                        foreach ($bugs_en_cours as $bug) {
                            if ($bug->getEngineer() != null){
                                $engineer = $bug->getEngineer()->getName();
                            }else{
                                $engineer = "non affecté";
                            }
                            echo "<tr>";
                            echo "<td><img src='../images/en_cours.png' width='30px' height='30px'/></td>";
                            //echo "<td class='colonneid'>".$bug->getId()."</td>";
                            echo "<td class='colonnedate'>".$bug->getCreated()->format('d.m.Y')."</td>";
                            echo "<td class='colonnetech'>".$engineer."</td>";
                            echo "<td class='colonneprod'>";
                            /*foreach ($bug->getProducts() as $product) {
                                echo "- ".$product->getName()." ";
                            }*/
                            echo '<a value="'.$bug->getId().'" class="detail" data-rel="dialog" data-icon="edit" data-inline="false" data-role="button" data-transition="slide" href="" data-theme="b">Traiter</a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    </p>
                </div>

                <div data-role="collapsible">
                    <h3>Tickets cloturés</h3>
                    <p>
                    <table><tr><th></th><th>Numéro</th><th>Date</th><th>Technicien</th><th>Produits concernés</th></tr>
                        <?php
                        foreach ($bugs_fermes as $bug) {
                            if ($bug->getEngineer() != null){
                                $engineer = $bug->getEngineer()->getName();
                            }else{
                                $engineer = "non affecté";
                            }
                            echo "<tr>";
                            echo "<td><img src='../images/ferme.png' width='30px' height='30px'/></td>";
                            echo "<td class='colonneid'>".$bug->getId()."</td>";
                            echo "<td class='colonnedate'>".$bug->getCreated()->format('d.m.Y')."</td>";
                            echo "<td class='colonnetech'>".$engineer."</td>";
                            echo "<td class='colonneprod'>";
                            foreach ($bug->getProducts() as $product) {
                                echo "- ".$product->getName()." ";
                            }
                            echo "</td>";
                            //echo "<td>".$bug->getDescription()."</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                    </p>
                </div>
            </div>
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
        $(".detail").click(function(){
            var idbug = $(this).attr('value');

            $.mobile.changePage('index.php?uc=dash&action=modifierbug', {
                type : 'POST',
                data : 'idbug='+idbug
            });
        });
    })
</script>

</body>
</html>


