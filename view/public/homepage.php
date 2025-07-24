

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
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            background-color:white;
            color: #333;
            line-height: 1.6;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        .header{
            background: linear-gradient(90deg,#1e88e5,#0d47a1);
            color:white;
            padding: 2rem 1rem;
            text-align:center;
            margin-bottom: 2rem;
        }

        .header h1{
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items:center;
            justify-content: center;
            gap:10px;
        }

        .header h2{
            font-size: 1.5rem;
            margin-bottom: 1rem;
            display:flex;
            align-items:center;
            justify-content: center;
            gap: 10px;
        }

        .loc, #cambio{
            height:40px;
            width:auto;
        }

        .buttonAdmin{
            display:flex;
            justify-content:center;
            align-items:center;
            gap:2em;
        }

        .buttonAdmin a{
            display:flex;
            align-items:center;
            gap:8px;
            background-color: white;
            color: #0d47a1;
            padding:0.8rem 1.5rem;
            border-radius:30px;
            text-decoration:none;
            font-weight:600;
            transition: all 0.3s ease;
        }

        .buttonAdmin a:hover{
            background-color: #e3f2fd;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .containeur{
            width: 90%;
            max-width: 1400px;
            margin:0 auto;
            display:flex;
            flex:1;
            gap:2em;
            padding-bottom:2rem;
        }

        #carte{
            flex:2;
            height:600px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .liste{
            flex:1;
            background-color: white;
            border-radius:12px;
            padding:1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-height: 600px;
            overflow-y: auto;
        }

        .headerlist {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }

        .headerlist h2{
            color: #0d47a1;
            margin-bottom:0.5rem;
            text-align:center;
        }

        .headerlist p{
            font-size: 0.9rem;
        }

        .li li {
            padding: 0.8rem 0;
            border-bottom: 1px solid #eee;
            transition: all 0.2s ease;
        }

        .li li:last-child {
            border-bottom: none;
        }

        .li li a {
            color: #333;
            text-decoration: none;
            display: block;
            transition: all 0.2s ease;
        }

        .li li a:hover {
            color: #1e88e5;
            transform: translateX(5px);
        }

        .li {
            list-style-type: none;
        }

        .footer {
            background-color: #0d47a1;
            color: white;
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        .switch-input{
            display: none;
        }

        .switch-label{
            display: block;
            color: black;
            width: 80px;
            height: 26px;
            background-color: #ccc;
            border-radius: 26px;
            position: relative;
            cursor: pointer;
            transition: background 0.3s;
        }

        .switch-label .night{
            /* font-size: 0.1rem; */
            display:none;
            position: absolute;
            left: 10px;
            font-size: 0.9rem;
            left: 9px;
            top: 2px;
            color: white;
        }

        .switch-label .day{
            /* font-size: 0.1rem; */
            position: absolute;
            left: 15px;
            font-size: 0.9rem;
            left: 30px;
            top: 2px;
            /* color: white; */
        }


        .switch-label::after{
            content:"";
            position: absolute;
            left: 3px;
            top:3px;
            width:20px;
            height:20px;
            border-radius:50%;
            background-color: #fff;
        }

        .switch-input:checked + .switch-label{
            background-color: black;
        }

        .switch-input:checked + .switch-label::after{
            transform: translateX(52px);
            background: #aaa;
        }

        body.dark-mode {
        background-color: #1a1a1a;
        color: #e0e0e0;
        }

        body.dark-mode .header {
            background: linear-gradient(90deg, #2c3e50, #1a252f);
        }

        body.dark-mode .containeur {
            background-color: transparent;
        }

        body.dark-mode #carte {
            background-color: #2d2d2d;
            border: 1px solid #404040;
        }

        body.dark-mode .liste {
            background-color: #2d2d2d;
            color: #e0e0e0;
            border: 1px solid #404040;
        }

        body.dark-mode .headerlist h2 {
            color: #e0e0e0;
        }

        body.dark-mode .headerlist {
            border-bottom: 1px solid #404040;
        }

        body.dark-mode .li li {
            border-bottom: 1px solid #404040;
        }

        body.dark-mode .li li a {
            color: #e0e0e0;
        }

        body.dark-mode .li li a:hover {
            color: #f1c40f;
        }

        body.dark-mode .buttonAdmin a {
            background-color: #2d2d2d;
            color: #e0e0e0;
            border: 1px solid #404040;
        }

        body.dark-mode .buttonAdmin a:hover {
            background-color: #404040;
        }

        body.dark-mode .footer {
            background-color: #1a1a1a;
            border-top: 1px solid #404040;
        }

        body.dark-mode .switch-label {
            background: #404040;
        }

        body.dark-mode .switch-input:checked + .switch-label {
            background: #404040;
        }

    </style>
    <title>Document</title>
</head>

<body>
    <div class="header" id="header">
        <h1>Carte interactive<img class="loc" src="img/icons8-location-50.png"></h1>
        <h2>Les stations cambio <img src="img/cambio.png" alt="logo" id="cambio"></h2>
        <div class="buttonAdmin">
            <div class="switch-container">
                <input type="checkbox" id="toggle-dark" class="switch-input"/>
                <label for="toggle-dark" class="switch-label"><span class="day">DAY</span><span class="night">NIGHT</span></label>
            </div>
            |   <a href="./?pg=connexion">Connexion à l'administration</a>
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

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
    <script src="js/homepage.js"></script>

</body>

</html>