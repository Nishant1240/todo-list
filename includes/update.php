<?php include "config.php"; ?>
<?php

$table = "tasks";
$id = $_POST['id'];

if (isset($_POST['update'])) {

    $task = $_POST['task'];
    $priority = $_POST['priority'];
    $date = $_POST['date'];

    $update_query = "UPDATE `$table` SET `task_priority`='$priority',`task_name`='$task',`task_due_date`='$date' WHERE `task_id`='$id';";
    if (mysqli_query($conn, $update_query)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    // fetch which data should be updated
    $query = "SELECT `task_priority`, `task_name`, `task_due_date` FROM `$table` WHERE `task_id`= '$id';";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo json_encode($row);
        }
    } else {
        echo 0;
    }
}


?>