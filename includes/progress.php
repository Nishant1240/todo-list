<?php include "config.php"; ?>
<?php

$table = "tasks";
$progress = $_POST['progress'];
$id = $_POST['id'];

$query = "UPDATE `$table` SET `task_progress` = '$progress' WHERE `task_id`= $id;";
if (mysqli_query($conn, $query)) {
    echo 1;
} else {
    echo 0;
}


?>