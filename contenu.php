<?php
if (isset($_POST['add']) AND ($_POST['task'])){

    $task = $_POST['task'];

    //--Récupérer le fichier JSON
    $show = file_get_contents("todo.json");
    
    //--Décoder le fichier JSON en PHP
    $decode = json_decode($show, true);

    $san = filter_var($_POST['task'], FILTER_SANITIZE_STRING);
    
    //Créer un tableau en php
    $decode[] = array("tache" => $task,"done"=>true);
    
    //json_encode--> converti le php en json 
    file_put_contents("todo.json", json_encode($decode));
    
} 

// if(isset($_POST['add']) AND ($_POST['task'])){
//     $task = $_POST['task'];
//     echo $task;
//     $show = file_get_contents('todo.json');
//     $decode = json_decode($show, true);
//     $decode[] = array('tache' => $task);

//     file_put_contents('todo.json', json_encode($decode));
// }

?>


