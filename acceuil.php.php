<?php
    // Ceci est un exemple de code PHP qui pourrait être utilisé
    $username = "Utilisateur"; // On pourrait récupérer ce nom depuis une session, une base de données, etc.
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la Bibliothèque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-image: url('biblio-Odot-2.jpg'); /* Remplace par le chemin de ton image */
            background-size: cover;  /* Permet à l'image de couvrir tout l'écran */
            background-position: center; /* Centre l'image */
            background-attachment: fixed; /* Garde l'image fixe lors du défilement */
            color: white; /* Texte blanc pour être visible sur l'image */
        }
        h1 {
            margin-top: 50px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            gap: 20px;
        }
        h1 {
             color:rgba(10, 7, 1, 0.84) !important; /* Forcer la couleur */
            margin-top: 50px;
        }

        .box {
            width: 170px;
            height: 120px;
            background-color: rgba(212, 134, 60, 0.7); /* Bleu transparent pour que l'image soit visible derrière */
            color: white;
            border-radius: 6px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
        }
        .box:hover {
            transform: scale(1.1);
            background-color: rgba(66, 50, 4, 0.91); /* Changement de couleur au survol */
        }
        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Bienvenue dans votre Bibliothèque</h1>
    <div class="container">
        <div class="box">
            <a href="bibliothecaire.php">Bibliothécaire</a>
        </div>
        <div class="box">
            <a href="http://localhost/projet%20php/loginUtilisateur.php">Utilisateur</a> <!-- Le lien "Client" redirige maintenant vers login.php -->
        </div>
        <div class="box">
            <a href="stagiere.php">Stagiere</a>
        </div>
    </div>
</body>
</html>
