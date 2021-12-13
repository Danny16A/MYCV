
<?php
// Include config file
include_once(__DIR__ . './../config/db.php');


if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users (username, password)
    VALUES ('$username','$password')";

    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Successful";
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="\MYCV\admin\assets\css\admin.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container">
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Register</h2>
                <div class="card my-5">
                    <form class="card-body cardbody-color p-lg-5" action="register.php" method="POST">
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="Username" aria-describedby="emailHelp" placeholder="User Name" name="username">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder="password" name="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100" value="register" name="submit">Register</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark"><a href="Login.php" class="text-dark fw-bold"> Back to Login</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>