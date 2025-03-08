<?php include 'connexion.php'; ?>

<?php
$id = $_GET['id'];
$sql = "DELETE FROM employes WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: lister_employes.php"); // Redirige après la suppression
} else {
    echo "Erreur: " . $conn->error;
}
?>
