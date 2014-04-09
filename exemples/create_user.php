<?php
// create_user.php
require_once "../bootstrap.php";

$newUserName = $argv[1];
$newUserPrenom = $argv[2];
$newUserFonction = $argv[3];
$newUserLogin = $argv[4];
$newUserPass = $argv[5];
$newUserMail = $argv[6];

$user = new User();
$user->setName($newUserName);
$user->setPrenom($newUserPrenom);
$user->setFonction($newUserFonction);
$user->setLogin($newUserLogin);
$user->setMdp($newUserPass);
$user->setCourriel($newUserMail);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";