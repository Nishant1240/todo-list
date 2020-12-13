<?php include "config.php"; ?>
<?php


$table = "recycles";
$id = $_POST['id'];

// DELETE
$delete_query = "DELETE FROM `$table` WHERE `task_id`='$id';";
if (mysqli_query($conn, $delete_query)) {
    echo 1;
} else {
    echo 0;
}

?>