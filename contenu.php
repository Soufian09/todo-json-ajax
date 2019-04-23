<?php
if (isset($_POST['ajout']) && !empty($_POST['ajout'])) {
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
            $todo = file_get_contents("assets/todo.json");
            
            //--Décoder le fichier JSON en PHP
            $decode = json_decode($todo, true);
            
            //Créer un tableau en php
            $table = array("tache" => $task);
            
            //you can turn PHP into JSON with json_encode()
            $encode = json_encode($table);
            

            $put = file_put_contents("assets/todo.json", $encode, LOCK_EX);
        }
    }
}