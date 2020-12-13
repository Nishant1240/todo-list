<?php session_start(); ?>
<?php include "config.php"; ?>
<?php

$table = "recycles";
$user_id = $_SESSION['user_id'];

$query = "SELECT `task_id`, `task_priority`, `task_name`, `task_due_date`, `task_progress` FROM `$table` WHERE `user_id`='$user_id';";

$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        $due_date = $row['task_due_date'];
        $cur_date = time();
        $day = ceil((strtotime($due_date) - $cur_date) / 60 / 60 / 24);

        $expired_color = '';

        if(!($day > 0)) {
            $day = 'Date expired';
            $expired_color = 'text-danger';
        } else {
            $day .= " days ($due_date)";
            $expired_color = '';
        }

        $color = $row['task_progress'] == 'Completed' ? 'text-success' : 'text-primary';
        $priority_color = $row['task_priority'] == 'High' ? 'high__priority'
            : ($row['task_priority'] == 'Medium' ? 'medium__priority'
                : ($row['task_priority'] == 'Low' ? 'low__priority'
                    : ''));
        echo "<tr>
        <td class='{$priority_color}'>{$row['task_priority']}</td>
        <td>    
            {$row['task_name']}
        </td>
        <td class='{$expired_color}'>{$day}</td>
        <td class='task__progress {$color}'>{$row['task_progress']}</td>
        <td>
        <a href='#' id='{$row['task_id']}' class='task__recycle text-decoration-none'>
        <i class='fa fa-recycle mx-1'></i>
        </a>
            <a href='#' id='{$row['task_id']}' class='task__delete text-decoration-none'>
                <i class='fa fa-trash-alt mx-1 text-danger'></i>
            </a>
        </td>
    </tr>";
    }
} else {
    echo 0;
}


?>