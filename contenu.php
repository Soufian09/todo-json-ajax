<?php
if (isset($_POST['add']) && !empty($_POST['add'])) {
    if (!empty($_POST['task'])) {
    $task = $_POST['task'];
    echo $task;

    //trim :  Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $task = trim($_POST['task']);

    //sanitisation du tableau 
    $sanitisation = array('task' => FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS,);
    $result = filter_input_array(INPUT_POST, $sanitisation);


    if (isset($task)) {
    //--Récupérer le fichier JSON
    $show = file_get_contents("assets/json/todo.json");
    echo $show;
    
    //--Décoder le fichier JSON en PHP
    $decode = json_decode($task, true);
    
    //Créer un tableau en php
    $table = array("tache" => $task);
    
    //json_encode--> converti le php en json 
    $encode = json_encode($table);
    $put = file_put_contents("assets/json/todo.json", $encode, LOCK_EX);
    }
    }
} ?>


