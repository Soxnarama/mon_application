<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = 'localhost';
$db = 'gestion_employes';
$user = 'employe'; // ou ton nom d'utilisateur
$pass = 'passer'; // mot de passe, vide par défaut

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection échouée: " . $conn->connect_error);
}
?>

