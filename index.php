<?php include_once('functioning_tasks.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK MANAGER APP</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <div class="container">
        <h1>Task Management System</h1>
        <!-- add task -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label for="addtask">Add Task:</label>
            <input type="text" name="addtask">
            <input type="submit" name="sub_add_task" value="Add Task" class="btns">
        </form>
        <!-- sort task -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
            <label for="addtask">Show:</label>
            <select name="show" id="show">
                <option value="all">all</option>
                <option value="complete">Complete</option>
                <option value="incomplete">Incomplete</option>
            </select>
            <label for="sort">Sort:</label>
            <select name="sort" id="show">
                <option value="ascending">Ascending</option>
                <option value="descendig">Descending</option>
            </select>
            <input type="submit" name="sub_sort" value="Filter and Sort" class="btns">
        </form>
        <!-- complete task -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="complete_task">Complete Task(Enter Task Index):</label>
            <input type="number" name="complete_task">
            <input type="submit" name="complete_task" value="Complete" class="btns">
        </form>
        <!-- remove task -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="addtask">Remove Task(Enter Task Index):</label>
            <input type="number" name="remove">
            <input type="submit" name="sub_remove_task" value="Remove" class="btns">
        </form>
        <!-- display added tasks here -->
        <div class="display">
          <?php displayTask(); ?>
        </div>
        <!-- Clear all tasks -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="sub_clear_task" value="Clear All Tasks" class="btns">
        </form>
    </div>
</body>

</html>

7:55