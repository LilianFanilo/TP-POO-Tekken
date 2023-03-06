<!-- Ajout réussit -->
<!DOCTYPE html>
<html lang="fr" class="create-perso">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>création de personnage</title>
</head>
<body>
    <nav>
        <a href="./index.php">Accueil</a>
    </nav>
    <section>
        <form action="Controller/controller-Personnage.php" method="POST" enctype="multipart/form-data">
            <label for="name_perso">Nom du personnage</label>
            <input type="text" name="name_perso" required>
            <label for="">Attaque (ATK)</label>
            <input type="number" name="atk_perso" required>
            <label for="pv_perso">Points de vie (PV)</label>
            <input type="number" name="pv_perso" required>
            <label for="img_perso">Image Personnage (Pas obligatoire)</label>
            <input type="file" name="img_perso">
            <input type="submit" value="Enregistrer" name="create_perso">
        </form>
    </section>
</body>
</html>