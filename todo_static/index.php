<?php

/**
 * Template name: Lista todo
 */

require 'db_conntect.php';
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ToDo List app</title>
    <!--*****************-->
    <!--******meta*******-->
    <!--*****************-->
    <meta name="description" content="ToDo List app">
    <meta name="author" content="Bartłomiej Zając">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            height: 100vh;
            background-color: #9cb8d1;
        }
        .bz-todo {
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            padding: 100px 200px;
            background-color: #9bb0df;
            border: 2px solid #2f3645;
            border-radius: 15px;
        }
        .bz-todo__task {
            margin: 5px 0;
        }
        .bz-todo__task--name {
            padding: 5px 5px;
            border: 1px solid #000;
            border-radius: 5px;
        }
        .bz-todo__task--checked {
            text-decoration: line-through;
            color: #858585;
        }
    </style>
</head>

<body>
    <div class="bz-todo">
        <h1>Task list</h1>
        <div class="bz-todo__add">
            <form action="addTask.php" method="POST" autocomplete="off">
                <input type="text" name="taskName" placeholder="Enter new task..." />
                <br>
                <button type="submit">Add to the list</button>
            </form>
        </div>
        <?php
        $todoList = $connect->query("SELECT * FROM zajac199_todo.todolist ORDER BY id DESC");
        ?>
        <div class="bz-todo__list">
            <?php if ($todoList->rowCount() <= 0) { ?>
                <div class="bz-todo__empty">
                    There is no task in your list!
                </div>
            <?php } ?>

            <?php while ($todo =  $todoList->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="bz-todo__task">
                    <input type="checkbox" <?php if($todo['done'] == 1) { echo 'checked'; } ?>>
                    <input type="text" name="taskName" value="<?php echo $todo['taskName']; ?>" class="bz-todo__task--name <?php if($todo['done'] == 1) { echo 'bz-todo__task--checked'; } ?>"></input>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>