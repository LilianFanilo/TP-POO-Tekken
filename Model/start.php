<?php
    $db = new PDO("mysql:host=localhost;dbname=tp_poo_tekken;port=3306;charset=utf8",'root','');

    function chargerClasse($classe)
    {
        require_once 'Class/'.$classe . '.php';
    }
    spl_autoload_register('chargerClasse');

    $personnageManager = new PersonnageManager($db);
    $personnages = $personnageManager->getList();
