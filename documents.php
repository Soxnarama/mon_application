<?php
$servername = "localhost";
$username = "employe"; // Remplace par ton nom d'utilisateur
$password = "passer"; // Remplace par ton mot de passe
$dbname = "gestion_employes"; // Remplace par le nom de ta base de données

// Afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Créer un document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $nom = $_POST['nom'];
    $chemin = $_POST['chemin'];

    $sql = "INSERT INTO documents (nom, chemin) VALUES ('$nom', '$chemin')";
    if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
    }
}

// Lire les documents
$result = $conn->query("SELECT * FROM documents");

// Mettre à jour un document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $chemin = $_POST['chemin'];

    $sql = "UPDATE documents SET nom='$nom', chemin='$chemin' WHERE id=$id";
    if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
    }
}

// Supprimer un document
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM documents WHERE id=$id");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Documents</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Gestion des Documents</h1>

    <!-- Formulaire pour ajouter un document -->
    <form method="POST" class="mb-4">
        <h3>Ajouter un Document</h3>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" name="nom" required>
        </div>
        <div class="form-group">
            <label>Chemin</label>
            <input type="text" class="form-control" name="chemin" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Ajouter</button>
    </form>

    <!-- Tableau des documents -->
    <h3>Liste des Documents</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Chemin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['chemin']; ?></td>
                        <td>
                            <a href="documents.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Modifier</button>
                        </td>
                    </tr>

                    <!-- Modal pour modifier un document -->
                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier le Document</h5>
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
                                            <label>Chemin</label>
                                            <input type="text" class="form-control" name="chemin" value="<?php echo $row['chemin']; ?>" required>
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
            <?php else: ?>
                <tr>
                    <td colspan="4">Aucun document trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
