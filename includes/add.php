<?php session_start(); ?>
<?php include "config.php"; ?>
<?php

$table_name = "tasks";

$task = $_POST['task'];
$priority = $_POST['priority'];
$date = $_POST['date'];
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO `$table_name`(`task_priority`, `task_name`, `task_due_date`, `user_id`) VALUES ('$priority', '$task', '$date', '$user_id');";

// execute query
if(mysqli_query($conn, $query)) {
    echo 1;
} else {
    echo 0;
}

?>

