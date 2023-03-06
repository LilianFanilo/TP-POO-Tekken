<?php

require_once("Model/start.php");

$perso1Id = $_GET["perso1"];
$perso1 = $personnageManager->getOne($perso1Id);

$perso2Id = $_GET["perso2"];
$perso2 = $personnageManager->getOne($perso2Id);

if (isset($_POST["atk_perso1"])) {
    $perso1->attaque($perso2);
    $perso2->reinitPVMIN();
    $perso2->is_alive();
    $personnageManager->updatePersonnage($perso2);
}

if (isset($_POST["soin_perso1"])) {
    $perso1->regenerer();
    $perso1->reinitPVMax();
    $personnageManager->updatePersonnage($perso1);
}

if (isset($_POST["atk_perso2"])) {
    $perso2->attaque($perso1);
    $perso1->reinitPVMIN();
    $perso1->is_alive();
    $personnageManager->updatePersonnage($perso1);
}

if (isset($_POST["soin_perso2"])) {
    $perso2->regenerer();
    $perso2->reinitPVMax();
    $personnageManager->updatePersonnage($perso2);
}

?>

<!DOCTYPE html>
<html lang="fr" class="fight">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <title>fight</title>
</head>
<body>

    <nav>
        <a href="./index.php">Accueil</a>
    </nav>

    <div class="battlefield">

        <div class="card">
            <?php if (!empty($perso1->getImg())): ?>
                <img class="img_perso" src="data:image/webp;base64,<?= base64_encode($perso1->getImg()) ?>" alt="<?= $perso1->getNom() ?>"/>
            <?php else: ?>
                <img class="default_img" src="./src/250Combot.png" alt="">
            <?php endif; ?>
            <div class="card_stats">
                <?= $perso1->getNom(); ?>
                <br>
                <?= "Atk : ". $perso1->getAtk(); ?>
                <?= "PV : ". $perso1->getCurrentPV(); ?>
            </div>
            <form method="POST">
            <input type="submit" value="Attaque" class="tekken_font">
            <input type="hidden" name="atk_perso1">
            </form>
            <form method="POST">
            <input type="submit" value="Soin" class="tekken_font">
            <input type="hidden" name="soin_perso1">
            </form>

        </div>

        <img class="tekken_logo" src="./src/Tekken_7_Logo.svg" alt="">

        <div class="card">
            <?php if (!empty($perso2->getImg())): ?>
                <img class="img_perso" src="data:image/webp;base64,<?= base64_encode($perso2->getImg()) ?>" alt="<?= $perso2 ->getNom() ?>"/>
            <?php else: ?>
                <img class="default_img" src="./src/250Combot.png" alt="">
            <?php endif; ?>   
            <div class="card_stats">
                <?= $perso2->getNom(); ?>
                <br>
                <?= "Atk :". $perso2->getAtk(); ?>
                <?= "PV : ". $perso2->getCurrentPV(); ?>
            </div>         
            <form  method="POST">
            <input type="submit" value="Attaque" class="tekken_font">
            <input type="hidden" name="atk_perso2">
            </form>
            <form method="POST">
            <input type="submit" value="Soin" class="tekken_font">
            <input type="hidden" name="soin_perso2">
            </form>

        </div>
        <?php 
        ?>
    </div>

</body>
</html>
