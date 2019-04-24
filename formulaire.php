<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Todolist json</title>
</head>
<body>
    <?php
        require 'contenu.php';
    ?>

<body style="background: rgb(34,193,195);background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);">

    <center>
    <!-- Ajout d'une tache -->
    <fieldset style ="border:1px solid black;">
        <form action="formulaire.php" method="POST">
            <label for="task">Ajouter une tâche :</label>
            <input  name="task" type="text" required placeholder="Ma tâche">
            <input  type="submit" value="ajouter" name="add">
        </form>
    </fieldset>

    <!--ici s'affichera la liste des taches -->
    <form action="formulaire.php" method="POST">
        <?php
        $show = file_get_contents('todo.json');
        $decode = json_decode($show, true);
        echo '<h1> Ma liste de tâche</h1>';
        foreach ($decode as $task) {
            echo '<p><input name="check[]" type="checkbox" value="'.$task['tache'].'">'.$task['tache'].'</p><p></p>';
        }
        ?>
        <!--<input class="del" type="submit" value="supprimer" name="supprimer"> -->
        <input class="done" type="submit" value="archive" name="done">
    </form>

    <!-- Les tache dejà realiser seront rediriger dans l'Archive -->
    <fieldset style ="float:top; height: 350px; border:1px solid black;">
        <?php
        echo '<h3 >ARCHIVE</h3>';
        foreach ($show as $table) {
            echo '<p class="done">' . $table["done"] . '</p>'; 
         }
        ?>
    </fieldset>
    </center>

    <script src="assets/js/todo.js"></script>
</body>

</html>

