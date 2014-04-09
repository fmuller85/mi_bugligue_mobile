<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eric
 * Date: 20/02/14
 * Time: 19:10
 * To change this template use File | Settings | File Templates.
 */

if(!isset($_REQUEST['action']))
    $action = 'list';
else
    $action = $_REQUEST['action'];

switch($action){
    case 'list':{
        $the_bugs = getAssignedBugByUser($_SESSION['login']['id']);
        $bugs_en_cours = $the_bugs[0];
        $bugs_fermes =  $the_bugs[1];
        include("vues/v_dashboard_tech.php");
        break;
    }
    case 'reparer':{
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
    }
}

?>