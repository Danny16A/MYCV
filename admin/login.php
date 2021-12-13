<?php
// Include config file
include_once(__DIR__ . './../config/db.php');


if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //validate 

    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password' LIMIT 1";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $row['logged'] = time();
            $_SESSION['user'] = $row;
        }
        header('location: index.php');
    } else {
        $_SESSION['error'] = "Wrong username or password";
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
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="msg" style="background-color: red;">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </div>
    <?php endif ?>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Login</h2>
                <div class="card my-5">
                    <form class="card-body cardbody-color p-lg-5" action="login.php" method="POST">
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="Username" aria-describedby="emailHelp" placeholder="User Name" name="username">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder="password" name="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100" value="login" name="submit">Login</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                            Registered? <a href="register.php" class="text-dark fw-bold"> Create an
                                Account</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>