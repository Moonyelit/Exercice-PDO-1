<?php
require_once '../utils/connect_db.php';

$sql = "SELECT clients.lastName, clients.firstName, clients.cardNumber, cardtypes.type 
FROM clients 
INNER JOIN cards ON cards.cardNumber = clients.cardNumber 
INNER JOIN cardtypes ON cardtypes.id = cards.cardTypesId 
WHERE cardtypes.type LIKE 'Fidélité'";





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
        <h1>Exercice 4 :</h1>
        <h2>N'afficher que les clients possédant une carte de fidélité.


        </h2>
        <?php
    
        foreach ($users as $user) {
        ?>
            <li> 
            <br>Ce client possède la carte fidélité  : 
            <br> Nom :<?= $user['lastName']  ?> 
            <br> Prénom : <?= $user['firstName']  ?> |
            <br>  Numéro de carte : <?= $user['cardNumber']  ?>
            <br>  Fidélité : <?= $user['type']  ?> </li>

        <?php
        }

        ?>

    </ol>



</body>

</html>