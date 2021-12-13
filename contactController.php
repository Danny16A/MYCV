<?php
// Include config file
include_once(__DIR__ . '/config/db.php');


if (isset($_POST['submit'])) {

    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $subject = $_POST['subject'];
    
    $sql = "INSERT INTO contacts
            (fullName, email, subject, content, status)
            VALUES('$fullName', '$email', ' $subject' ,'$content',  0)";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Message Sent";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    mysqli_close($conn);

    header('location: index.php');


}



?>
