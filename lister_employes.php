<?php include 'connexion.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Liste des Employés</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Liste des Employés</h1>
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
                <?php
                $result = $conn->query("SELECT * FROM employes");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nom']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['poste']}</td>
                        <td>
                            <a href='modifier_employe.php?id={$row['id']}' class='btn btn-warning'>Modifier</a>
                            <a href='supprimer_employe.php?id={$row['id']}' class='btn btn-danger'>Supprimer</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
