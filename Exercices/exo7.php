<?php
require_once '../utils/connect_db.php';

$sql = "SELECT clients.lastName, clients.firstName, clients.birthDate, cards.cardNumber, cardtypes.type 
FROM clients 
LEFT JOIN cards ON cards.cardNumber = clients.cardNumber 
LEFT JOIN cardtypes ON cardtypes.id = cards.cardTypesId";





try {
    $stmt = $pdo->query($sql);

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat



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
        <h1>Exercice 7 </h1>


        <?php

        foreach ($users as $user) {
        ?>
Afficher tous les clients comme ceci :
            <li>
                <p>


                    <br>Nom : <?= $user['lastName']  ?>

                    <br>Prénom : <?= $user['firstName']  ?>

                    <br>Date de naissance : <?= $user['birthDate']  ?>

                    <br>Carte de fidélité : <?= $user['type']  ?>

                    <br>Numéro de carte : <?= $user['cardNumber']  ?>
                </p>
            </li>


        <?php
        }

        ?>

    </ol>



</body>

</html>