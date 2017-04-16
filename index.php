<?php

require_once(__DIR__. '/config.php');
require_once(__DIR__. '/functions.php');
require_once(__DIR__. '/Todo.php');

//get todos

$todoApp = new \MyApp\Todo();
$todos = $todoApp->getAll();

/**
var_dump($todos);
exit;
**/

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>MyTodos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Todos</h1>
        <form action=""> 
            <input type="text" id="new_todo" name="" placeholder="What needs to be done?"/>
            <input type="submit" value="Submit" class="btn btn-primary"/>
        </form>
        
        <ul id="todos">
            <?php foreach($todos as $todo): ?>
            <li id="todo_<?= h($todo->id); ?>" data-id="<?= h($todo->id); ?>">
                <input type="checkbox" class="update_todo" <?php if($todo->state == '1'){echo 'checked';} ?>>
                <span class="todo_title <?php if($todo->state == '1'){echo 'done';} ?>"><?= h($todo->title); ?></span>
                <div class="delete_todo">x</div>
            </li>
            <?php endforeach; ?>

        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="todo.js"></script>
</body>
</html>