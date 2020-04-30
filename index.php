<?php
    //we setup logic for todo list here.
    session_start(); 
    if (!isset($_SESSION['tasks'])) { // If it DOESN'T exist, let's make a default value (this way we can array_push to it later!)
        $_SESSION['tasks'] = array();
    }
    $_SESSION['tasks'] = array_values($_SESSION['tasks']);

    //logic behind submite task in form
    if (isset($_POST) && !empty($_POST)) //making sure something is submitted
    {
        array_push($_SESSION['tasks'], $_POST['task']);

        //before any output, you must declare if you would like to use session.
    //lets check our session entry exists
    
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
</head>

<body>
    <h1>Add a To-Do List</h1>

    <form action="./index.php" method="POST"><?php //forms can use get and post method.
                                                ?>
        <label for="task">
            Enter a new task:
            <input type="text" name="task" id="task">
        </label>

        <input type="submit" value="Add to List">
        <input type="button" value="Reset">
    </form>

    <?php
    //two styles for and foreach method by php 
    //one is here and second one is below
    if (!empty($_SESSION['tasks'])) {
        echo '<h2>Active -To-Do List</h2><ul>';
        foreach ($_SESSION['tasks'] as $task) {
            echo "<li><input type='checkbox'>$task</li>";
        }
        echo '</ul>';
    }
    ?>


</body>

</html>