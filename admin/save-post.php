<?php

include "config.php";

if (isset($_FILES['fileToUpload'])) {

    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];

    $file_size = $_FILES['fileToUpload']['size'];

    $file_tmp = $_FILES['fileToUpload']['tmp_name'];

    $file_type = $_FILES['fileToUpload']['type'];



    $file_exte = explode('.', $file_name);

    $file_ext = end($file_exte);

    $extensions = array("jpeg", "jpg", "png");


    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "This file extension is not allowed.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be less than 2 MB';
    }

    if (empty($errors) == true) {

        move_uploaded_file($file_tmp, "upload/" . $file_name);
    } else {
        print_r($errors);
        die();
    }
}



// $post_id = $_POST['post_id'];

$title = $_POST['post_title'];

$description = $_POST['postdesc'];

$category = $_POST['category'];

session_start();


$author = $_SESSION['user_id'];



$date = date("Y-m-d");

// $content = $_POST['fileToUpload'];

$tittle = mysqli_real_escape_string($conn, $title);

$description = mysqli_real_escape_string($conn, $description);

$category = mysqli_real_escape_string($conn, $category);



$sql = "INSERT INTO post ( title, description, category, post_date, author, post_img) VALUES ('$title', '$description', '$category', '$date', '$author', '$file_name');";

$sql1 = "UPDATE category SET post = post + 1 WHERE category_id = '$category' ";




if (mysqli_query($conn, $sql) > 0) {

    mysqli_query($conn, $sql1);

    header("Location: http://localhost/news-infinity/admin/post.php");
} else {
    echo "Error: querry failed " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
