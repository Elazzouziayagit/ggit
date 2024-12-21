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
            background-color: #f4f4f4;
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
        .box {
            width: 200px;
            height: 150px;
            background-color: #007bff;
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
            background-color: #0056b3;
        }
        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Bienvenue dans votre  Bibliothèque</h1>
    <div class="container">
        <div class="box">
            <a href="bibliothecaire.php">Bibliothécaire</a>
        </div>
        <div class="box">
            <a href="client.php">Client</a>
        </div>
    </div>
</body>
</html>