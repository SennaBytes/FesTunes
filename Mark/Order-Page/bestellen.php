<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['datum'])) {
        echo "Vul een datum in.";
        exit;
    }

    $datum = $_POST['datum'];
    $tijden = $_POST['tijden'];
    $aantal = $_POST['aantal'];
    $versie = $_POST['versie'];

    $query = "
        INSERT INTO FesTunes (datum, tijden, aantal, versie)
        VALUES (:datum, :tijden, :aantal, :versie)
    ";

    $stmt = $pdo->prepare($query);

    $stmt->execute([
            ':datum' => $datum,
            ':tijden' => $tijden,
            ':aantal' => $aantal,
            ':versie' => $versie
    ]);

    $id = $pdo->lastInsertId();

    header("Location: resultaat.php?id=$id");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Pagina</title>
    <link rel="icon" type="image/x-icon" href="../assets/logo/Logo-FesTune.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="order-page.css">
</head>
<body>
<nav>
    <span class="logo"><img src="assets/Logo-FesTune.png" alt="Logo"></span>
    <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="About/about.html">About</a></li>
        <li><a href="Contact/contact.html">Contact</a></li>
        <li><a href="#">Date</a></li>
        <li><a href="#">Orde Page</a></li>
        <li><a href="#">Gallery</a></li>
    </ul>
</nav>

<h1>Bestelling toevoegen</h1>

<form method="post" class="forn-containter">
    
    <label>Datum:</label><br>
    <input type="date" name="datum" required>
    <br><br>

    <label>Tijd:</label><br>
    <input type="time" name="tijden" required>
    <br><br>

    <label>Aantal:</label><br>
    <input type="number" name="aantal" required>
    <br><br>

    <label>Versie:</label><br>
    <select name="versie" required>
        <option value="General">General</option>
        <option value="VIP">VIP</option>
    </select>
    <br><br>
    <button type="submit">Bestellen</button>
    
</form>

</body>
</html>