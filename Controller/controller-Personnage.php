<?php
require_once dirname(__DIR__) . '/Model/start.php';

    if(isset($_POST['create_perso'])) {
        $name = $_POST["name_perso"];
        $file = $_FILES["img_perso"];
        if ($file["error"] == UPLOAD_ERR_OK) {
            $img = file_get_contents($file["tmp_name"]);
        } else {
            // handle the error
            echo "Error uploading file.";
            exit;
        }
        $atk = $_POST["atk_perso"];
        $pv = $_POST["pv_perso"];
        $personnage = $personnageManager->insertPerso($name, $img, $atk, $pv);
        header("Location: ../index.php");
    }


    if(isset($_POST['delete_perso'])) {
		$id_perso = $_POST['id_perso'];
        $personnage = $personnageManager->deletePersonnage($id_perso);
		header('Location: ../index.php');
	}

    if (isset($_POST['reset_perso'])) {
        $id_perso = $_POST['id_perso'];
        $perso = $personnageManager->getOne($id_perso);
        $personnageManager -> resetPersonnage($perso);
        header("Location: ../index.php");
    }

    if(isset($_POST['modif_perso'])){
        $id = $_POST["id"];
        $name = $_POST["name_perso"];
        $atk = $_POST["atk_perso"];
        $pv = $_POST["pv_perso"];
        $personnage = $personnageManager->ModifPersonnage($id, $name, $atk, $pv);
        header("Location: ../change.php?id=$id");
    }
?>