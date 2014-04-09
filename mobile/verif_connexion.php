<?php
session_start();

?>

<!doctype html>
<html>
<head>
    <title>jQuery Mobile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./lib/jquery.mobile-1.4.2.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="./lib/jquery.mobile-1.4.2.min.js"></script>
</head>
<body>
<div data-role="page">
    <div data-role="header">
        <h1>En-tête</h1>
    </div>
    <div data-role="content">
        <h4>Authentification</h4>
        <p>Veuillez vous authentifier pour continuer votre navigation sur la plate forme</p>

    </div>
    <div data-role="footer" data-position="fixed">
        <h4>Pied de page</h4>
    </div>
</div>
</body>
</html>