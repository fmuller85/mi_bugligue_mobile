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
        <h4>Bienvenue sur votre console de gestion</h4>

        <div data-role="collapsible-set" data-theme="b" data-content-theme="a">

            <div data-role="collapsible" data-collapsed="true">
                <h3>Tickets en cours</h3>
                <p>
                <table><tr><th></th><th>Numéro</th><th>Date</th><th>Technicien</th><th>Produits concernés</th></tr>
                    <tr>
                        <td><img src='../images/en_cours.png' width='30px' height='30px'/></td>
                        <td class='colonneid'>45</td>
                        <td class='colonnedate'>01/02/2014</td>
                        <td class='colonnetech'>Toto</td>
                        <td class='colonneprod'>
                        </td>
                    </tr>
                </table>
                </p>
            </div>

            <div data-role="collapsible">
                <h3>Tickets cloturés</h3>
                <p>
                <table><tr><th></th><th>Numéro</th><th>Date</th><th>Technicien</th><th>Produits concernés</th></tr>
                    <tr>
                        <td><img src='../images/en_cours.png' width='30px' height='30px'/></td>
                        <td class='colonneid'>45</td>
                        <td class='colonnedate'>01/02/2014</td>
                        <td class='colonnetech'>Toto</td>
                        <td class='colonneprod'>
                        </td>
                    </tr>
                </table>
                </p>
            </div>
        </div>
    </div>
    <div data-role="footer" data-position="fixed">
        <h4>Pied de page</h4>
    </div>
</div>
</body>
</html>