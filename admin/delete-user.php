<?php

include 'config.php';

$userid = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = '$userid'";

if (mysqli_query($conn, $sql)) {
    header('Location: http://localhost/news-infinity/admin/users.php');
} else {
    echo "cannot delete user";
}

mysqli_close($conn);
