<?php
    require_once("Model/start.php");

    $persoId = $_GET["id"];
    $perso = $personnageManager->getOne($persoId);
?>
<!DOCTYPE html>
<html lang="fr" class="change-page">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">
    <title>Modifier <?= $perso->getNom(); ?></title>
</head>
<body>
    <nav>
        <a href="./index.php">Accueil</a>
    </nav>

    <h1>Modifier le personnage</h1>
    <h2><?= $perso->getNom();?></h2>
    <Table border="1">
    <tr>
        <th>Apparence</th>
        <th>Nom</th>
        <th>Atk</th>
        <th>PV de Base</th>
        <th>PV Actuels</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td>
          <?php if (!empty($perso->getImg())): ?>
              <img class="img_perso" src="data:image/webp;base64,<?= base64_encode($perso->getImg()) ?>" alt="<?= $perso->getNom() ?>"/>
          <?php else: ?>
            <img class="default_img" src="./src/250Combot.png" alt="">
          <?php endif; ?>
        </td>


        <td class="tekken_font"><?php echo $perso->getNom(); ?></td>
        <td class="tekken_font"><?php echo $perso->getAtk(); ?></td>
        <td class="tekken_font"><?php echo $perso->getPV(); ?></td>
        <td class="tekken_font"><?php echo $perso->getCurrentPV(); ?></td>
        <td>

          <form action="Controller/controller-Personnage.php" method="post" class="form-reset">
          <input type="hidden" name="id_perso" value="<?php echo $perso->getId(); ?>">
          <input type="submit" value="Réanimer" name="reset_perso">
          </form>

          <form action="Controller/controller-Personnage.php" method="post" class="form-delete">
          <input type="hidden" name="id_perso" value="<?php echo $perso->getId(); ?>">
          <input type="submit" value="Supprimer" name="delete_perso" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');">
          </form>
        </td>
      </tr>
      <th>Nouvelles modifications</th>
      <tr>
        <form action="Controller/controller-Personnage.php" method="POST">
            <td>
                <label for="name_perso">Nom du personnage</label>
                <input type="text" name="name_perso">
            </td>
            <td>
                <label for="">Attaque (ATK)</label>
                <input type="number" name="atk_perso">
            </td>
            <td>
                <label for="pv_perso">Points de vie (PV)</label>
                <input type="number" name="pv_perso">
            </td>
            <td>
                <input type="hidden" name="id" value="<?=$perso->getId()?>">
                <input type="submit" value="Enregistrer" name="modif_perso">
            </td>
        </form>
      </tr>
    </Table>

</body>
</html>