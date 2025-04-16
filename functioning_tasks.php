
<?php

///////////////////////////////////////////////////////

session_start();

function addtask($task)
{
    if (empty($_SESSION['task'])) {
        $_SESSION['task'] = [];
    }

    $taskExist = array_column($_SESSION['task'], 'task');
    if (in_array($task, $taskExist) || $_POST['addtask'] === "") {
        echo "<p class='error_msg'>Task already exist</p>";
        return;
    }
    array_push($_SESSION['task'], [
        'task' => $task,
        'completed' => false
    ]);
    echo "<p class='message'>Task Added</p>";
}


function displayTask($completedFilter = 'all')
{
    if (!isset($_SESSION['task']) || empty($_SESSION['task'])) {
        echo " <p class='error_msg'>No Task is added</p>";
        return;
    }

    /////////filter
    //  vidio 5:35

    foreach (array_column($_SESSION['task'], 'task') as $index => $task) {
        $name = $_SESSION['task'];
        $completed = array_column($name, 'completed');
        if ($completed === true) {
            $comv = 'Completed';
        } else {
            $comv = 'Not Completed';
        }
        echo "
         <div>[$index]$task($comv)</div>
         ";
    }

    ////////

}

/////////////////////
//sort
function sortTask()
{
    if ($_POST['sort'] == 'ascending') {
        asort($_SESSION['task']);
    } elseif ($_POST['sort'] == 'descendig') {
        arsort($_SESSION['task']);
    }
}


/////function to remove tasks
function removeTask($index)
{
    unset($_SESSION['task'][$index]);
}

function clearTask()
{
    array_splice($_SESSION['task'], 0);
}

//function to complete task
function completeTask($index) {}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sub_add_task'])) {
        $task = $_POST['addtask'];
        addtask($task);
    } elseif (isset($_POST['sub_sort'])) {
        sortTask();
    } elseif (isset($_POST['sub_remove_task'])) {
        $index = $_POST['remove'];
        removeTask($index);
    } elseif (isset($_POST['sub_clear_task'])) {
        clearTask();
    }
}

?>