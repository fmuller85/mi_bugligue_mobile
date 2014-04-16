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
        var_dump($_POST);
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
        break;
    }
}

?>