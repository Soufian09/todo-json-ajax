<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Todolist json</title>
</head>
<body>
    <?php
        require 'contenu.php';
    ?>

<body>
    <!-- Ajout d'une tache -->
    <fieldset class="form">
        <form action="formulaire.php" method="POST">
            <label for="task">Ajouter une tâche</label>
            <input  name="task" type="text" required placeholder="Ma tâche">
            <input name="add" type="submit" value="ajouter" >
        </form>
    </fieldset>

    <!--ici s'affichera la liste des taches -->
    <form action="formulaire.php" method="POST">
        <?php
        echo '<h1> Ma liste de tâche</h1>';
        foreach ($table as $task) {
            echo '<p class="draggable"><input name="check[]" type="checkbox" value="' . $task . '">' . $task . '</p><p></p>';
        }
        echo '</div>';
        ?>
        <input class="del" type="submit" value="supprimer" name="supprimer">
        <input class="done" type="submit" value="archive" name="done">
        <p></p>
    </form>

    <!-- Les tache dejà realiser seront rediriger dans l'Archive -->
    <fieldset class="dropper"style ="float : top;">
        <?php
        echo '<h3 >ARCHIVE</h3>';
        foreach ($show as $composent) {
            echo '<p class="done">' . $composent["done"] . '</p>'; //check[] parce qu'on peut check plusieurs en même temps
         }
        ?>
    </fieldset>



    <script src="assets/js/main.js"></script>
</body>

</html>

