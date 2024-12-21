<?php
// Vérifiez si le bouton "Déconnexion" a été cliqué
if (isset($_POST['logout'])) {
    // Redirigez l'utilisateur vers la page d'accueil
    header("Location: http://localhost/projet%20php/acceuil.php.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface de Login / Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ddb892;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #7f5539;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: rgb(196, 162, 90);
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #7f5539;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: rgb(196, 162, 90);
        }
        .switch {
            text-align: center;
            margin-top: 10px;
        }
        .switch a {
            text-decoration: none;
            color: #cc8d5a;
        }
        .switch a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Bouton de déconnexion -->
<form method="POST">
    <button type="submit" name="logout" class="logout-btn">Déconnexion</button>
</form>

<div class="container">
    <h2>Connexion / Inscription</h2>
    
    <?php
    // Par défaut, afficher le formulaire de connexion
    if (isset($_GET['login'])) {
        // Formulaire de connexion
    ?>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn">Se connecter</button>
        </form>
        <div class="switch">
            <p>Pas encore de compte ? <a href="?signup=true">S'inscrire</a></p>
        </div>
    <?php
    } else {
        // Formulaire d'inscription
    ?>
        <form method="POST">
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Numéro de Téléphone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <!-- Champ ID qui peut être affiché ou masqué -->
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="12345" <?php echo isset($_GET['show_id']) ? '' : 'style="display:none;"'; ?> >
                <input type="checkbox" id="show_id" name="show_id" value="1" onchange="toggleIdVisibility()"> Afficher l'ID
            </div>

            <!-- Champ mot de passe -->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn">S'inscrire</button>
        </form>
        <div class="switch">
            <p>Vous avez déjà un compte ? <a href="?login=true">Se connecter</a></p>
        </div>
    <?php
    } // Fin de la condition
    ?>
</div>

<script>
    function toggleIdVisibility() {
        var idField = document.getElementById('id');
        var checkbox = document.getElementById('show_id');
        if (checkbox.checked) {
            idField.style.display = 'block'; // Afficher l'ID
        } else {
            idField.style.display = 'none'; // Masquer l'ID
        }
    }
</script>

</body>
</html>









