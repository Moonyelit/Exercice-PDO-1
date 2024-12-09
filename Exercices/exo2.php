
<?php
require_once '../utils/connect_db.php';

$sql = "SELECT * FROM `showtypes`";


try {
    $stmt = $pdo->query($sql);
    
    $showtypes = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
        <h1>Exercice 2 :</h1>
        <h2>Afficher tous les types de spectacles possibles</h2>
        <?php
        foreach ($showtypes as $showtype) {
        ?>
            <li>Nom : <?= $showtype['type']  ?> </li>

        <?php
        }

        ?>

    </ol>

 

</body>

</html>