<?php include "config.php"; ?>
<?php


$table = "recycles";
$id = $_POST['id'];
// Insert 
$query = "INSERT INTO `tasks`(`task_id`, `task_priority`, `task_name`, `task_due_date`, `task_progress`, `user_id`) SELECT `task_id`, `task_priority`, `task_name`, `task_due_date`, `task_progress`, `user_id` FROM `$table` WHERE `task_id`='$id';";

if (mysqli_query($conn, $query)) {
    // Delete
    $delete_query = "DELETE FROM `$table` WHERE `task_id`='$id';";
    if (mysqli_query($conn, $delete_query)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}

?>