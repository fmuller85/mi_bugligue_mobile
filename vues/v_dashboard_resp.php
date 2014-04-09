<div id="liste_tickets">
    <h2>Tickets en cours</h2>
    <br />
    <table>
        <tr><th></th><th >Affecté à</th><th class="col-produit" >Produit</th><th class="col-date">Date de création</th><th class="col-date">Date limite</th><th class="col-description">Description</th><th class="col-rapport">Rapport</th></tr>
    <?php
    foreach ($bugs_en_cours as $bug) {
        if ($bug->getEngineer() != null){
            $engineer = $bug->getEngineer()->getName();
        }else{
            $engineer = "<select id='".$bug->getId()."' class='select-tech' name='technicien'>";
            Foreach($liste_techniciens as $technicien){

                 $engineer .= "<option value='".$technicien->getId()."'>".$technicien->getName()."</option>";
            }
            $engineer .= "</select>";

        }

        if($bug->getDatelimite() != null){
                $datelimite = $bug->getDatelimite()->format('d.m.Y');
            if($bug->getDatelimite()->getTimeStamp() >= $bug->getCreated()->getTimeStamp()){
                $nbJourRestant = date('d', $bug->getDatelimite()->getTimeStamp() - $bug->getCreated()->getTimeStamp())."j ";
                $nbMoisRestant = date('m', $bug->getDatelimite()->getTimeStamp() - $bug->getCreated()->getTimeStamp());
                $nbMoisRestant = intval($nbMoisRestant)-1;
                $nbMoisRestant .= "m restant(s)";
            }else{
                $nbJourRestant = "";
                $nbMoisRestant = "";
            }
        }else{
            $nbJourRestant = "";
            $nbMoisRestant = "";
            $datelimite = "<input style='width: 100px;' type='text' class='datepicker' placeholder='0000-00-00'>";
        }



        echo "<tr class='unticket' value='".$bug->getId()."'>";
        echo "<td><img src='./images/en_cours.png' width='30px' height='30px'/></td>";
        echo "<td><span class='nomTechnicien' >".$engineer."</span> <img class='deverouiller' src='./images/cadena2.png'></td>";

        echo "<td>";
        foreach ($bug->getProducts() as $product) {
            echo "".$product->getName()." ";
        }
        echo "</td>";

        echo "<td>".$bug->getCreated()->format('d.m.Y')."</td>";
        echo "<td><span class='dateLimite'>".$datelimite."</span><img class='icoCalendrier' src='images/iconeCalendrier.gif' title='modifier la date' />".$nbJourRestant.$nbMoisRestant."</td>";
        echo "<td><span class='bt-voir-description'>Voir description</span></td>";
        echo "<td><a href='index.php?uc=dash&action=reparer&idBug=".$bug->getId()."'> Créer un rapport de résolution</a></td>";

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
    <h2>Tickets fermés</h2>
    <br />
    <table>
        <tr><th></th><th >Affecté à</th><th class="col-produit" >Produit</th><th class="col-date">Date de création</th><th class="col-date">Date de résolution</th><th class="col-description">Description</th></tr>
        <?php


        foreach ($bugs_fermes as $bug) {
            if ($bug->getEngineer() != null){
                $engineer = $bug->getEngineer()->getName();
            }else{
                $engineer = "Non affecté";
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
        var listeTechnicien = $('.select-tech');

        /*listeTechnicien.on('change', function(){
            var idbug = $(this).attr('id');
            var idbug = id.replace('list', "");
            alert(idbug);
        });*/

        $( "body" ).on( "click",'option', function() {
            var idTech = $(this).val();
            var idbug = $(this).parent().parent().parent().parent().attr('value');

            $.ajax({
                type:"POST",
                url:"/ppe5/PPE5_MI/util/traitements_JSON.php",
                dataType:"json",
                data:"action=affecter_technicien&tech_id="+idTech+"&bug_id="+idbug,
                success: function(data){
                    alert('Technicien affecté');
                    window.location='index.php?uc=dash';
                }
            });

        });

        $('.deverouiller').click(function(){ // con on click sur deverouiller
            var emplacementTech = $(this).parent().find('.nomTechnicien');
            emplacementTech.html('');

            $.ajax({
                type:"POST",
                url:"/ppe5/PPE5_MI/util/traitements_JSON.php",
                dataType:"json",
                data:"action=liste_technicien",
                success: function(data){
                    var i = 0;
                    var select = document.createElement("select");
                    emplacementTech.append(select);

                    while(i < data.length){
                        var option = document.createElement("option");
                        var nom = data[i].nom;
                        option.setAttribute('value', data[i].id);

                        option.innerHTML = nom;

                        select.appendChild(option);



                        i++;
                    }
                }
            });


        });

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

        $( ".datepicker" ).datepicker({
            onSelect: function(date) {
                var idbug = $(this).parent().parent().parent().attr('value');

                $.ajax({
                    type:"POST",
                    url:"/ppe5/PPE5_MI/util/traitements_JSON.php",
                    data:"action=set_date_limite&bug_id="+idbug+"&date_limite="+date,
                    success: function(data){
                        window.location='index.php?uc=dash';
                    }
                });

                /*$.post("/ppe5/PPE5_MI/util/traitements_JSON.php",
                    {action: "set_date_limite", bug_id: idbug, date_limite: date },
                    function(data){
                        window.location='index.php?uc=dash';
                    }
                );*/

            },
            dateFormat:"yy-mm-dd"
        });

        $( "body" ).on( "click",'.icoCalendrier', function() {
            var champDate = $(this).parent().find('.dateLimite');
            var date = champDate.text();
            champDate.html("<input style='width: 100px;' type='text' class='datepicker' placeholder='"+date+"'>");

            $( ".datepicker" ).datepicker({
                onSelect: function(date) {
                    var idbug = $(this).parent().parent().parent().attr('value');

                    /*$.post("/ppe5/PPE5_MI/util/traitements_JSON.php",
                        {action: "set_date_limite", bug_id: idbug, date_limite: date },
                        function(data){
                            champDate.html(date);
                        }
                    );*/

                    $.ajax({
                        type:"POST",
                        url:"/ppe5/PPE5_MI/util/traitements_JSON.php",
                        data:"action=set_date_limite&bug_id="+idbug+"&date_limite="+date,
                        success: function(data){
                            window.location='index.php?uc=dash';
                        }
                    });
                },
                dateFormat:"yy-mm-dd"
            });
        });

    });
</script>