<?php

if(!isset($_REQUEST['action']))
    $action = 'list';
else
    $action = $_REQUEST['action'];

switch($action){
    case 'list':{

        $the_bugs = getAllBugs();
        $bugs_en_cours = $the_bugs[0];
        $bugs_fermes =  $the_bugs[1];
        $liste_techniciens = getAllTech();

        include("vues/v_dashresp.php");
        break;
    }

    case 'nouveau':{
        if (isset($_POST['objet'])){
            $message = ajouterNewBug();
            include("vues/v_message.php");
        }
        $the_products = getAllProducts();

        include("vues/v_new_bug.php");
        break;
    }
    /*case 'reparer':{
        $idBug = $_GET['idBug'];
        $the_bug = getBugById($idBug);
        if(isset($_POST['valider'])){
            if(isset($_POST['rapport'])){
                $message = ajouterRapport($idBug);
                include("vues/v_message.php");
            }
        }
        include("vues/v_rapport_bug.php");
        break;
    }*/

    case 'modifierbug':{
        if(isset($_POST['idbug'])){
            if(isset($_POST['valider'])){
                $datelimite = $_POST['datelimite'];
                $technicien = $_POST['technicien'];
                $idBug = $_POST['idbug'];

                $message = updatebug($idBug, $technicien, $datelimite);
                include("vues/v_message.php");
            }else{
                $idBug = $_POST['idbug'];
                $the_bug = getBugById($idBug);
                $liste_techniciens = getAllTech();
                /*if(isset($_POST['valider'])){
                    if(isset($_POST['rapport'])){
                        $message = ajouterRapport($idBug);
                        include("vues/v_message.php");
                    }
                }*/
                include("vues/v_modifierbug.php");
            }
        }else{
            $message = "Bug non trouvé";
            include("vues/v_message.php");
        }
        break;
    }

    case 'rapport':{
        if(isset($_POST['valider'])){
            if(isset($_POST['rapport'])){
                $idBug = $_POST['idbug'];
                $message = ajouterRapport($idBug);
                include("vues/v_message.php");
                echo "<script> window.location='index.php?uc=dash';</script>";
            }
        }else{
            $idBug = $_GET['idbug'];
            $the_bug = getBugById($idBug);
            include("vues/v_rapport.php");
        }
        break;
    }
}

?>