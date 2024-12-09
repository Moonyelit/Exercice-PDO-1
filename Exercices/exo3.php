<?php
require_once '../utils/connect_db.php';

$sql = "SELECT * FROM `clients`";


try {
    $stmt = $pdo->query($sql);

    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
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
    <ol>
        <h1>Exercice 3 :</h1>
        <h2>Afficher les 20 premiers clients.

        </h2>
        <?php
        foreach ($clients as $client) {
            if ($client["id"] <= 20) {
        ?>
                <li>Nom : <?php echo $client['lastName']  ?> | Prénom : <?= $client['firstName']  ?> </li>

        <?php
            }
        }

        ?>

    </ol>



</body>

</html>