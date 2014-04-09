<a id='lnkDialog' href="#ticket_dialog" data-transition="flip" style='display:none;'></a>

<div data-role="page">
    <div data-role="header">
        <h1>En-tête</h1>
    </div>
    <div data-role="content">
        <h4>Bienvenue sur votre console de gestion</h4>
        <a data-mini="true" data-inline="true" data-role="button" data-transition="slide" href="index.php?uc=dash&action=nouveau" data-theme="c"><span class="ui-btn-inner"><span class="ui-btn-text">Nouveau bug</span></span></a>

        <div data-role="collapsible-set" data-theme="b" data-content-theme="a">
            <div id="liste_tickets">
            <div data-role="collapsible" data-collapsed="true">
                <h3>Tickets en cours</h3>
                <p>
                <table><tr><th></th><th>Numéro</th><th>Date</th><th>Technicien</th><th>Produits concernés</th></tr>
                    <?php
                    foreach ($bugs_en_cours as $bug) {
                        if ($bug->getEngineer() != null){
                            $engineer = $bug->getEngineer()->getName();
                        }else{
                            $engineer = "non affecté";
                        }
                        echo "<tr>";
                        echo "<td><img src='../images/en_cours.png' width='30px' height='30px'/></td>";
                        echo "<td class='colonneid'>".$bug->getId()."</td>";
                        echo "<td class='colonnedate'>".$bug->getCreated()->format('d.m.Y')."</td>";
                        echo "<td class='colonnetech'>".$engineer."</td>";
                        echo "<td class='colonneprod'>";
                        foreach ($bug->getProducts() as $product) {
                            echo "- ".$product->getName()." ";
                        }
                        echo "</td>";
                        //echo "<li>".$bug->getDescription()."</li>";
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
    <div data-role="footer" data-position="fixed">
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

</body>
</html>