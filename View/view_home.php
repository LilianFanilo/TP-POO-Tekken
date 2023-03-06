<!DOCTYPE html>
<html lang="fr" class="main-page">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js" defer></script>
    <script src="script.js" defer></script>
    <title>TP POO : TEKKEN</title>
</head>
<body>
<section class="container">
  <img class="logo js-logo" src="./src/Tekken_7_Logo.svg" alt="">
  <div class="select-perso">
    <p class="tekken_font getReady">Get ready for the next battle !</p>
    <form action="Controller/controller-fight.php" method="POST">
      <div class="selection">
        <select name="perso1" id="perso_1" class="tekken_font black">
          <?php
            foreach ($personnages as $personnage) {
          ?>
          <option value="<?php echo $personnage->getId(); ?>"><?php echo $personnage->getNom(); ?></option>
          <?php
            };
          ?>
        </select>
        <p class="tekken_font">VS</p>
        <select name="perso2" id="perso_2" class="tekken_font black">
          <?php
            foreach ($personnages as $personnage) {
          ?>
          <option value="<?php echo $personnage->getId(); ?>"><?php echo $personnage->getNom(); ?></option>
          <?php
            };
          ?>
        </select>
      </div>
      <input type="submit" value="Fight!">
      <input type="hidden" name="fight">
    </form>
  </div>
  <div class="list-perso">
    <!-- Afficher la liste des personnages -->
    <table border="1">
      <tr>
        <th>Personnages</th>
        <th class="new-perso"><a href="index.php?action=new">Ajouter un nouveau personnage</a></th>
      </tr>
      <tr>
        <th>Apparence</th>
        <th>Nom</th>
        <th class="stats">Atk</th>
        <th class="stats">PV de Base</th>
        <th class="stats">PV Actuels</th>
        <th>Actions</th>
      </tr>
      <?php 
        foreach ($personnages as $personnage) {
      ?>
      <tr>
        <td>
          <?php if (!empty($personnage->getImg())): ?>
              <img class="img_perso" src="data:image/webp;base64,<?= base64_encode($personnage->getImg()) ?>" alt="<?= $personnage->getNom() ?>"/>
          <?php else: ?>
            <img class="default_img" src="./src/250Combot.png" alt="">
          <?php endif; ?>
        </td>


        <td class="tekken_font"><?php echo $personnage->getNom(); ?></td>
        <td class="tekken_font"><?php echo $personnage->getAtk(); ?></td>
        <td class="tekken_font"><?php echo $personnage->getPV(); ?></td>
        <td class="tekken_font"><?php echo $personnage->getCurrentPV(); ?></td>
        <td>
          <div class="buttons">

            <form action="Controller/controller-Personnage.php" method="post" class="form-reset">
            <input type="hidden" name="id_perso" value="<?php echo $personnage->getId(); ?>">
            <input type="submit" value="Réanimer" name="reset_perso">
            </form>

            <form action="Controller/controller-Personnage.php" method="post" class="form-delete">
            <input type="hidden" name="id_perso" value="<?php echo $personnage->getId(); ?>">
            <input type="submit" value="Supprimer" name="delete_perso" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');">
            </form>
            
            <a href="change.php?id=<?php echo $personnage->getId(); ?>">Modifier</a>

          </div>
          </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</section>
    
</body>
</html>
