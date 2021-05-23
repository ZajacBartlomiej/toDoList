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
</head>

<body>
    <div class="bz-todo">
        <div class="bz-todo__add">
            <form action="" method="post">
                <input type="text" name="taskName" placeholder="Enter new task..." />
                <button type="submit">Add to the list</button>
            </form>
        </div>
        <?php
        $todoList = $connect->query("SELECT * FROM todo ORDER BY id DESC");
        ?>
        <div class="bz-todo__list">
            <?php if ($todoList->rowCount() <= 0) { ?>
                <div class="bz-todo__empty">
                    There is no task in your list!
                </div>
            <?php } ?>

            <?php while ($todo =  $todoList->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="bz-todo__task">
                    <h2><?php echo $todo['taskName']; ?></h2>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>