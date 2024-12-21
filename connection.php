<?php
// les informations de connexion
$hostname = "localhost";  //  serveur Mysql
$username = "root";         // nom d'utilisateur MySQL
$password = "2005";             // le mot de passe MySQL 
$databasename = "dblibrary";    // le nom de la base de données


// Créer une connexion
$conn = new mysqli($hostname, $username, $password, $databasename);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
} else {
    echo "Connexion réussie à la base de données MySQL.";
}

// Exemple de requête SQL pour récupérer les données
$sql = "SELECT * FROM DOCUMENT";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les résultats de la requête
    while($row = $result->fetch_assoc()) {
        echo "REF: " . $row["REF"] . " - TITRE: " . $row["TITRE"] . " - EDITEUR: " . $row["EDITEUR"] . "<br>";
    }
} else {
    echo "0 résultats";
}

// Fermer la connexion
$conn->close();
?>



