<?php
// Include config file
include_once(__DIR__ . '/config/db.php');

// get posts

$id = $_GET['id'];
$sql = "SELECT p.*, u.username, c.name FROM posts p 
LEFT JOIN users u ON u.id = p.author_id 
LEFT JOIN blog_categories c ON c.id = p.category_id 
WHERE p.id=$id
LIMIT 1
";
$result = $conn->query($sql);

$post = null;

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
}

$profile = [

    'name' => 'Danny Nguyen',
    'job' => 'Web Developer',
    'avatar' => '/public/assets/images/pro5/pic.jpg'
];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/base.css">
    <link rel="stylesheet" href="/public/assets/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="/public/assets/libs/OwlCarousel/assets/owl.carousel.min.css">
    <title>Resume</title>
    <style>
        .list-item span {
            display: block;
        }
    </style>
</head>

<body>
    <div class="resume-container">
        <div class="d-flex">
            <div class="col-3 fullsize-menu">
                <div class="menu">
                    <ul class="menu-list">
                        <li class="list-item"><a class="page-link active-aqua" href="/">
                                <i class="list-icon lnr lnr-home"></i>
                                <p>Home</p>
                            </a></li>
                        <li class="list-item" ><a class="page-link" href="/index.php?tab=about">
                                <i class="list-icon lnr lnr-user"></i>
                                <p>About Me</p>
                            </a></li>
                        <li class="list-item" ><a class="page-link" href="/index.php?tab=resume"><i class="list-icon lnr lnr-graduation-hat"></i>
                                <p>Resume</p>
                            </a></li>
                        <li class="list-item" ><a class="page-link" href="/index.php?tab=portfolio"><i class="list-icon lnr lnr-briefcase"></i>
                                <p>Portfolio</p>
                            </a></li>
                        <li class="list-item" ><a class="page-link" href="/index.php?tab=blogs"><i class="list-icon lnr lnr-book"></i>
                                <p>Blogs</p>
                            </a></li>
                        <li class="list-item" ><a class="page-link" href="/index.php?tab=contact"><i class="list-icon lnr lnr-envelope"></i>
                                <p>Contact</p>
                            </a></li>
                        <li class="list-item bd-bt"><a class="page-link" href="/admin/index.php"><i class="list-icon fas fa-user-cog"></i>
                                <p>Admin</p>
                            </a></li>
                    </ul>
                </div>
                <div class="info-card">
                    <img src="<?= $profile['avatar'] ?>" alt="profile picture" class="profile-pic">
                    <h2><?= $profile['name'] ?></h2>
                    <h3 style="color: #aaa;"><?= $profile['job'] ?></h3>
                    <div class="social-media">
                        <a href="https://www.linkedin.com/in/danny-nguyen-749659211/" target="_blank"><i class="fab fa-linkedin social-media-icon"></i></a>
                        <a href="https://www.facebook.com/duonghnpro/" target="_blank"><i class="fab fa-facebook-square social-media-icon"></i></a>
                        <a href="https://www.instagram.com/dnyy.16/" target="_blank"><i class="fab fa-instagram social-media-icon"></i></a>
                    </div>
                    <div class="mg-top">
                        <a href="/public/files/Danny_Nguyen_-_Web_Developer.pdf" class="download-btn">Download CV</a>
                    </div>
                    <div class="copy-right">
                        <p>© 2021 All rights reserved.</p>
                    </div>
                </div>
            </div>
            <div class="responsive-sidebar">
                <div class="responsive-menu-toggle" onclick="showSideBar()">
                    <i class="fas fa-align-justify"></i>
                </div>
                <div class="responsive-menu">
                    <img src="<?= $profile['avatar'] ?>" alt="profile picture" class="profile-pic" style="margin-top: -10px;">
                    <h2><?= $profile['name'] ?></h2>
                    <h3 style="color: #aaa;"><?= $profile['job'] ?></h3>
                    <ul class="res-menu-list">
                        <li><a class="page-link" href="#">

                                <p>Home</p>
                            </a></li>
                        <li onclick="openLink(this, 'about')"><a class="page-link" href="#">

                                <p>About Me</p>
                            </a></li>
                        <li onclick="openLink(this, 'resume')"><a class="page-link" href="#">
                                <p>Resume</p>
                            </a></li>
                        <li onclick="openLink(this, 'portfolio')"><a class="page-link" href="#">
                                <p>Portfolio</p>
                            </a></li>
                        <li onclick="openLink(this, 'blogs')"><a class="page-link" href="#">
                                <p>Blogs</p>
                            </a></li>
                        <li onclick="openLink(this, 'contact')"><a class="page-link" href="#">
                                <p>Contact</p>
                            </a></li>
                        <li><a class="page-link" href="\MYCV\admin\index.php">
                                <p>Admin</p>
                            </a></li>
                    </ul>
                    <div class="social-media">
                        <a href="https://www.linkedin.com/in/danny-nguyen-749659211/" target="_blank"><i class="fab fa-linkedin social-media-icon"></i></a>
                        <a href="https://www.facebook.com/duonghnpro/" target="_blank"><i class="fab fa-facebook-square social-media-icon"></i></a>
                        <a href="https://www.instagram.com/dnyy.16/" target="_blank"><i class="fab fa-instagram social-media-icon"></i></a>
                    </div>
                    <div class="mg-top">
                        <a href="" class="download-btn">Download CV</a>
                    </div>
                    <div class="copy-right">
                        <p>© 2021 All rights reserved.</p>
                    </div>
                </div>
            </div>
            <div class="main-content col-9">
                <div id="home" class="post-page page show">
                    <div class="container">
                        <div class="pd-thumbnail">
                            <img src="<?= $post['thumbnail'] ?>" alt="">
                        </div>
                        <h1 class="pd-title"><?= $post['title'] ?></h1>
                        <p class="pd-description"><?= $post['description'] ?></p>
                        <p class="pd-content"><?= $post['content'] ?></p>
                        <h5 class="pd-author"><?= $post['username'] ?></h5>
                        <h5 class="pd-author"><?= $post['create_time'] ?></h5>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="./public/assets/libs/Jquery/jquery-3.6.0.min.js"></script>
    <script src="./public/assets/libs/OwlCarousel/owl.carousel.min.js"></script>
    <script src="./public/assets/js/app.js"></script>
</body>

</html>