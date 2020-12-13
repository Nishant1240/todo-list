<?php
    $server = "localhost";
    $user = "root";
    $password ="";
    $database ="todo";

    // connection variable
    $conn = mysqli_connect($server, $user, $password, $database);

    // check connection is established or not
    if(!$conn) {
        echo "Connection fail ".mysqli_error($conn);
    }

?>