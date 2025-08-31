

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/homepage.css">
    <title>Document</title>
</head>

<body>
    <div class="header" id="header">
        <div class="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <nav>
            <a href="./?pg=connexion">Connexion à l'administration</a>
            <div class="switch-container">
                <div>Mode: </div>
                <input type="checkbox" id="toggle-dark-mobile" class="switch-input"/>
                <label for="toggle-dark-mobile" class="switch-label"><span class="day">DAY</span><span class="night">NIGHT</span></label>
            </div>
        </nav>
        <div class="header-title">
            <h1>Carte interactive<img class="loc" src="img/icons8-location-50.png"></h1>
            <h2>Les stations cambio <img src="img/cambio.png" alt="logo" id="cambio"></h2>
        </div>
        <div class="buttonAdmin">
            <div class="switch-container">
                <input type="checkbox" id="toggle-dark" class="switch-input"/>
                <label for="toggle-dark" class="switch-label"><span class="day">DAY</span><span class="night">NIGHT</span></label>
            </div>
            <span>|</span>   <a href="./?pg=connexion">Connexion à l'administration</a>
        </div>
    </div>
    <div class="containeur">
        <div id="carte"></div>
        <div class="liste">
            <div class="headerlist">
                <h2>Liste des points</h2>
                <p>Cliquez sur un élément ci-dessous pour le situer sur la carte</p>
                <br>
            </div>
            <div>
                <ul class="li">
                    <?php foreach ($localisations as $article): ?>
                        <li><a href="#header"><?= $article['nom'] ?> | <?= $article['adresse'] ?> <?= $article['numero'] ?> - <?= $article['codepostal'] ?> <?= $article['ville'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <footer class="footer">
        © <?= date('Y') ?> TI3-2025 — Carte interactive | Réalisé par Massine Abgar
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
    <script src="js/homepage.js"></script>

</body>

</html>