<?php
try {
    include "db.php";
    $db = new Database();

    if ($_GET['telefoonID']) {
        $db->deleteTelefoon($_GET['telefoonID']);
    }
}   catch(Exception $e) {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Gegevens zijn verwijderd</h1>
    <a href="home.php">Terug naar overzihct</a>
</body>
</html>