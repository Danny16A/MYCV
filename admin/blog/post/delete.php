<?php
// Include config file
include_once(__DIR__ . '../../../../config/db.php');


$id = $_GET['id'];

$sql = "DELETE FROM posts where id = $id";

if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "Post deleted";
    header('location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}