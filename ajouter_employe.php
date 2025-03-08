<?php include 'connexion.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Ajouter un Employé</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Ajouter un Employé</h1>
        <form action="ajouter_employe.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="poste">Poste</label>
                <input type="text" class="form-control" name="poste" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $poste = $_POST['poste'];

            $sql = "INSERT INTO employes (nom, email, poste) VALUES ('$nom', '$email', '$poste')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Employé ajouté avec succès!</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Erreur: " . $conn->error . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
