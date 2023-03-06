<?php
    if (isset($_POST["fight"])) {
        $perso1 = $_POST["perso1"];
        $perso2 = $_POST["perso2"];
        if ($perso1 === $perso2) {
            header("Location: ../index.php");
        } else {
            header("Location: ../fight.php?perso1={$perso1}&perso2={$perso2}");
        }
    };

?>