<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunuGestion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers CSS personnalisé -->
    <style>
        body {
            background-color: #e9ecef;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .header {
            background-image: url('header-bg.jpg'); /* Image d'en-tête */
            background-size: cover;
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        .header h1 {
            font-size: 3rem;
        }
        .card {
            margin: 20px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .feature-icon {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SunuGestion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="employes.php">Employés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clients.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="documents.php">Documents</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="header">
        <h1>Bienvenue sur SunuGestion</h1>
        <p>Gérez vos employés, clients et documents en toute simplicité.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon">&#128101;</div> <!-- Icône Employé -->
                        <h5 class="card-title">Gestion des Employés</h5>
                        <p class="card-text">Ajoutez, modifiez et supprimez des informations sur vos employés.</p>
                        <a href="employes.php" class="btn btn-primary">Gérer les Employés</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon">&#128100;</div> <!-- Icône Client -->
                        <h5 class="card-title">Gestion des Clients</h5>
                        <p class="card-text">Accédez à la base de données de vos clients.</p>
                        <a href="clients.php" class="btn btn-primary">Gérer les Clients</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon">&#128196;</div> <!-- Icône Document -->
                        <h5 class="card-title">Gestion des Documents</h5>
                        <p class="card-text">Téléchargez et partagez des documents facilement.</p>
                        <a href="documents.php" class="btn btn-primary">Gérer les Documents</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 SunuGestion par soxnarama. Tous droits réservés.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
