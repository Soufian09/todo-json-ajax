<?php
if (isset($_POST['add']) && !empty($_POST['add'])) {
    if (!empty($_POST['task'])) {
    $task = $_POST['task'];

    //trim
    $task = trim($_POST['task']);

    //sanitisation 
    $sanitisation = array('task' => FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS,);
    $result = filter_input_array(INPUT_POST, $sanitisation);

    //Si le résultat retourné après le filtre est vide ou erreur
    if (isset($task)) {
    //--Récupérer le fichier JSON
    $show = file_get_contents("assets/json/todo.json");
    echo $show;
    
    //--Décoder le fichier JSON en PHP
    $decode = json_decode($todo, true);
    
    //Créer un tableau en php
    $table = array("task" => $task);
    
    //you can turn PHP into JSON with json_encode()
    $encode = json_encode($table);
    $put = file_put_contents("assets/json/todo.json", $encode, LOCK_EX);
    }
    }
} ?>


