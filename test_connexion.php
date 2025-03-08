<?php
$host = 'localhost';
$db = 'gestion_employes';
$user = 'root'; // ou le nom de l'utilisateur
$pass = 'musellmi'; // le mot de passe correct

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection échouée: " . $conn->connect_error);
} else {
    echo "Connexion réussie à la base de données.";
}
?>
