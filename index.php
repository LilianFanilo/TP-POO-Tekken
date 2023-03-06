<?php        

      require_once ("Model/start.php");

        if (isset($_GET["action"])) {
            $action = $_GET["action"];

            if ($action == "home") {
                include("./View/view_home.php");
            }

            if ($action == "new") {
                include("./View/view_addCharacter.php");
            }
            
        } else {
            include("./View/view_home.php");
        }
?>