<?php
require 'config.php';

$id = $_GET['id'];

$query = "SELECT * FROM FesTunes WHERE id = :id";
$stmt = $pdo->prepare($query);

$stmt->execute([
        ':id' => $id
]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultaat</title>
    <link rel="icon" type="image/x-icon" href="../assets/logo/Logo-FesTune.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resultaat.css">
</head>
<body>
<nav>
    <span class="logo"><img src="assets/Logo-FesTune.png" alt="Logo"></span>
    <ul class="nav-links">
        <li><a href="../index.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="#">Date</a></li>
        <li><a href="#">Orde Page</a></li>
        <li><a href="#">Gallery</a></li>
    </ul>
</nav>

<h1>Bestelling toegevoegd</h1>

<div class="container-result">
    <p>ID: <?= $result['id'] ?></p>
    <p>Datum: <?= $result['datum'] ?></p>
    <p>Tijd: <?= $result['tijden'] ?></p>
    <p>Aantal: <?= $result['aantal'] ?></p>
    <p>Versie: <?= $result['versie'] ?></p>

    <br>
    <button type="button"><a href="bestellen.php">Nieuwe bestelling</a></button>

</div>

</body>
</html>