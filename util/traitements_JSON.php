<?php

switch($_POST['action']){
    case 'affecter_technicien':{
        include_once('../bootstrap.php');
        $bugId = $_POST['bug_id'];
        $techId = $_POST['tech_id'];

        $bug = $entityManager->find("Bug", $bugId);
        $tech = $entityManager->find("User", $techId);

        $bug->setEngineer($tech);

        $entityManager->persist($bug);
        $entityManager->flush();

        break;
    }

    case 'liste_technicien':{
        include_once('../bootstrap.php');

        $dql = "SELECT u FROM User u WHERE u.fonction = 'Technicien' OR u.fonction = 'Responsable'";

        $query = $entityManager->createQuery($dql);
        $lesTechniciens = $query->getResult();

        $tableauTechnicien = array();

        Foreach($lesTechniciens as $technicien){
            $tableauTechnicien[] = $technicien->toString();
        }

        echo json_encode($tableauTechnicien);
        exit();
        break;
    }

    case 'set_date_limite':{
        include_once('../bootstrap.php');

        $bugId = $_POST['bug_id'];
        $dateLimite = $_POST['date_limite'];

        $bug = $entityManager->find("Bug", $bugId);

        $bug->setDateLimite(new DateTime($dateLimite));

        $entityManager->persist($bug);
        $entityManager->flush();

        break;
    }

}