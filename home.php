<?php
include 'db.php';
$db = new Database();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db->addTelefoon($_POST['merk'], $_POST['model'], $_POST['opslag_in_gb'], $_POST['prijs']);
        echo "<h1>Telefoon toegevoegd</h1>";
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer></script>
    <title>Document</title>
    <style>
        body {
            padding: 1rem;
        }
        form {
            width: 50%;
        }

        .btn {
            width: 100px;
        }

        form .form-control   {
            border: 1px solid gray;
        }
    </style>
</head>
</head>
<body>
<h1>Telefoons Overzicht</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Telefoon ID</th>
                <th scope="col">Merk</th>
                <th scope="col">Model</th>
                <th scope="col">Opslag in GB</th>
                <th scope="col">Prijs</th>
                <th scope="col">Bewerken</th>
                <th scope="col">Verwijderen</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $data = $db ->selectAllTelefoons();
            foreach ($data as $telefoon) {
                echo "<tr>";
                echo "<td>".$telefoon['telefoonID']."</td>";
                echo "<td>".$telefoon['merk']."</td>";
                echo "<td>".$telefoon['model']."</td>";
                echo "<td>".$telefoon['opslag_in_gb']."</td>";
                echo "<td>".$telefoon['prijs']."</td>";
                echo "<td><a href='update.php?telefoonID=" . $telefoon['telefoonID'] . "'>Bewerken</a></td>";
                echo "<td><a href='delete.php?telefoonID=" . $telefoon['telefoonID'] . "'>Verwijderen</a></td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table><br><br>
    <h1>Telefoon toevoegen</h1>
    <form action="" method="post">
        <label for="merk" style="font-size: 25px;">Merk</label><br>
        <input class="form-control" type="text" name="merk"><br>
        <label for="model" style="font-size: 25px;">Model</label>
        <input class="form-control" type="text" name="model"><br>
        <label for="opslag_in_gb" style="font-size: 25px;">Opslag in GB</label>
        <input class="form-control" type="number" name="opslag_in_gb"><br>
        <label for="prijs" style="font-size: 25px;">Prijs</label><br>
        <input class="form-control" type="number" name="prijs"><br>
        <input class="btn btn-primary" name="submit" type="submit" value="Toevoegen">
    </form><br>
</body>
</html>