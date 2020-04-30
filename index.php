<?php
//we setup logic for todo list here.
//session start
session_start();

//if session post reset then session unset
if (isset($_POST['reset'])) {
    session_unset();
    session_destroy();
}

if (!isset($_SESSION['tasks'])) { // If it DOESN'T exist, let's make a default value (this way we can array_push to it later!)
    $_SESSION['tasks'] = array();
    $_SESSION['completed'] = array();
}
$_SESSION['tasks'] = array_values($_SESSION['tasks']);
$_SESSION['completed'] = array_values($_SESSION['completed']);

//logic behind submit task in form
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

    <form action="./index.php" method="POST"><?php //forms can use get and post method.?>
        <label for="task">
            Enter a new task:
            <input type="text" name="task" id="task">
        </label>

        <input type="submit" value="Add to List">
        <input type="submit" value="Reset">
    </form>


    
    <?php if (!empty($_SESSION['tasks'])) {
    ?>
        <h2>Active To-Dos</h2>
        <ul>
            <?php foreach ($_SESSION['tasks'] as $task) { 
            ?>
                <li>
                    <input type="checkbox" onChange="submit();" name="<?php echo $task; ?>" id="<?php echo $task; ?>" value="checked" >
                    <?php echo $task; ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <?php if (!empty($_SESSION['completed'])) {
    ?>
        <h2>Completed To-Dos</h2>
        <ul>
            <?php foreach ($_SESSION['completed'] as $complete) {
            ?>
                <li>
                    <?php echo $complete; ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>


    <pre>
        <strong>$_SESSION contects:</strong>
        <?php var_dump($_SESSION); ?>
    </pre>
    <pre>
        <strong>$_POST contents:</strong>
        <?php var_dump($_POST); ?>
    </pre>
    
</body>

</html>