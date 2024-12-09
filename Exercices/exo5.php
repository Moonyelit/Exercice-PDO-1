<?php
require_once '../utils/connect_db.php';

$sql = "SELECT clients.lastName, clients.firstName 
FROM clients 
WHERE clients.lastName LIKE 'M%' 
ORDER BY clients.lastName;";





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
        <h1>Exercice 5 :</h1>
        <h2>Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". </h2>
        <h3><br> Les afficher comme ceci :
            <br> Nom : Nom du client
            <br> Prénom : Prénom du client
            <br> Trier les noms par ordre alphabétique.
        </h3>

        <?php

        foreach ($users as $user) {
        ?>
        <p>Voici les clients qui ont un prénom qui commence par "M" par ordre alphabétique :</p>
           
        <li>
                Nom :<?= $user['lastName']  ?>
                <br> Prénom : <?= $user['firstName']  ?> |

            </li>

        <?php
        }

        ?>

    </ol>



</body>

</html>