<?php
$servername = "localhost";
$username = "employe"; // Remplace par ton nom d'utilisateur
$password = "passer"; // Remplace par ton mot de passe
$dbname = "gestion_employes"; // Remplace par le nom de ta base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Créer un employé
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $poste = $_POST['poste'];

    $sql = "INSERT INTO employes (nom, email, poste) VALUES ('$nom', '$email', '$poste')";
    $conn->query($sql);
}

// Lire les employés
$result = $conn->query("SELECT * FROM employes");

// Mettre à jour un employé
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $poste = $_POST['poste'];

    $sql = "UPDATE employes SET nom='$nom', email='$email', poste='$poste' WHERE id=$id";
    $conn->query($sql);
}

// Supprimer un employé
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM employes WHERE id=$id");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Gestion des Employés</h1>

    <!-- Formulaire pour ajouter un employé -->
    <form method="POST" class="mb-4">
        <h3>Ajouter un Employé</h3>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" name="nom" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label>Poste</label>
            <input type="text" class="form-control" name="poste" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Ajouter</button>
    </form>

    <!-- Tableau des employés -->
    <h3>Liste des Employés</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Poste</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['poste']; ?></td>
                    <td>
                        <a href="employes.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Modifier</button>
                    </td>
                </tr>

                <!-- Modal pour modifier un employé -->
                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier l'Employé</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" name="nom" value="<?php echo $row['nom']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Poste</label>
                                        <input type="text" class="form-control" name="poste" value="<?php echo $row['poste']; ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" name="update" class="btn btn-primary">Mettre à jour</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
