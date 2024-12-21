<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '2005', 'dblibrary');

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Recherche et affichage des livres
$searchQuery = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $searchQuery = "WHERE ISBN LIKE '%$search%' OR AUTEUR LIKE '%$search%' OR TITRE LIKE '%$search%'";
}

// Récupération des livres
$booksQuery = "SELECT LIVRE.IDLIVRE, DOCUMENT.TITRE, LIVRE.AUTEUR, LIVRE.ISBN
               FROM LIVRE
               JOIN DOCUMENT ON LIVRE.REF = DOCUMENT.REF $searchQuery";
$booksResult = $conn->query($booksQuery);

// Enregistrement du type d'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['typeOffre'])) {
    $idUtilisateur = $_POST['idUtilisateur'];
    $typeOffre = $_POST['typeOffre'];

    $updateQuery = "UPDATE UTILISATEUR SET TYPEUTILISA = '$typeOffre' WHERE IDUTILISA = '$idUtilisateur'";
     if ($conn->query($updateQuery) === TRUE) {
        echo "<script>alert('Type d\'offre enregistré avec succès !');</script>";
    } else {
        echo "<script>alert('Erreur : " . $conn->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Library - Accueil</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-attachment: fixed;
            background: linear-gradient(135deg, #6E4B3A, #D2B48C); /* Dégradé de marron à beige */
        }

        header {
            background: linear-gradient(135deg, #3B2F2A, #D2B48C); /* Dégradé du marron foncé au beige */
            color: white;
            padding: 15px;
            text-align: center;
        }

        .navbar {
            display: flex;
            justify-content: space-around;
            background-color: #E1C69E; /* Beige clair pour le fond des liens */
            padding: 10px 0;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            text-decoration: none;
            color: #4E3629; /* Marron foncé */
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a:hover {
            background-color: #C8A57D; /* Beige moyen */
            color: white;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 248, 220, 0.8); /* Beige clair transparent */
            border-radius: 10px;
            max-width: 90%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            width: 60%;
            padding: 10px;
            border: 1px solid #4E3629; /* Marron foncé */
            border-radius: 4px;
        }

        .search-bar button {
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #8B6D5C; /* Marron clair */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-bar button:hover {
            background-color: #D2B48C; /* Beige clair */
        }

        .content h2 {
            color: #65A5B1; /* Beige doux */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #D2B48C; /* Beige */
        }

        .offres select {
            width: 100%;
            padding: 10px;
            border: 1px solid #D2B48C; /* Bordure beige */
            border-radius: 4px;
            background-color: white;
            color: #8B6D5C; /* Marron clair */
        }

        .emprunter-bar {
            margin-top: 40px;
            text-align: center;
            padding: 20px;
            background-color: #8B6D5C; /* Marron clair */
            color: white;
            font-size: 18px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .emprunter-bar a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: 2px solid white;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .emprunter-bar a:hover {
            background-color: white;
            color: #8B6D5C; /* Marron clair */
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenue à DB Library</h1>
    </header>
    <nav class="navbar">
        <a href="#recherche">Recherche</a>
        <a href="#listeLivres">Liste des Livres</a>
        <a href="#offres">Offres</a>
    </nav>

    <div class="container" id="recherche">
        <div class="search-bar">
            <input type="text" placeholder="Recherchez un livre par titre, auteur ou ISBN..." id="searchInput">
            <button onclick="rechercherLivre()">Rechercher</button>
        </div>
    </div>

    <div class="container" id="listeLivres">
        <h2>Liste des Livres</h2>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>ISBN</th>
                    <th>Éditeur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                $conn = new mysqli('localhost', 'root', '2005', 'dblibrary');
                if ($conn->connect_error) {
                    die("Connexion échouée : " . $conn->connect_error);
                }

                // Récupération des livres
                $sql = "SELECT LIVRE.IDLIVRE, DOCUMENT.TITRE, LIVRE.AUTEUR, LIVRE.ISBN, DOCUMENT.EDITEUR 
                        FROM LIVRE 
                        INNER JOIN DOCUMENT ON LIVRE.REF = DOCUMENT.REF";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['TITRE']) . "</td>
                            <td>" . htmlspecialchars($row['AUTEUR']) . "</td>
                            <td>" . htmlspecialchars($row['ISBN']) . "</td>
                            <td>" . htmlspecialchars($row['EDITEUR']) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun livre trouvé</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div class="container" id="offres">
        <h2>Offres</h2>
        <div class="offres">
            <select>
                <option value="occasionnel">Utilisateur Occasionnel - 1 document, 15 jours</option>
                <option value="abonne">Abonné - 4 documents, 1 mois</option>
                <option value="privilegie">Abonné Privilégié - 8 documents, 1 mois</option>
            </select>
        </div>
    </div>

    <div class="emprunter-bar">
        <p>Prêt à emprunter un livre ?</p>
        <a href="emprunter.php">Emprunter un Livre</a>
    </div>

    <script>
        function rechercherLivre() {
            const input = document.getElementById('searchInput').value;
            if (input.trim() === '') {
                alert("Veuillez entrer un terme de recherche !");
                return;
            }
            // Redirige ou traite la recherche selon les besoins
            window.location.href = recherche.php?q=${encodeURIComponent(input)};
        }
    </script>
</body>
</html>





  
  


