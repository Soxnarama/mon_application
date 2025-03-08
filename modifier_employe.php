<?php include 'connexion.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Modifier un Employé</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Modifier un Employé</h1>
        <?php
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM employes WHERE id = $id");
        $row = $result->fetch_assoc();
        ?>
        <form action="modifier_employe.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $row['nom']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="poste">Poste</label>
                <input type="text" class="form-control" name="poste" value="<?php echo $row['poste']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $poste = $_POST['poste'];

            $sql = "UPDATE employes SET nom='$nom', email='$email', poste='$poste' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Employé modifié avec succès!</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Erreur: " . $conn->error . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
