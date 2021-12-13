<?php
// Include config file
include_once(__DIR__ . '/config/db.php');

// get posts

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

$posts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}



$sql = "SELECT * FROM views LIMIT 1";
$result = $conn->query($sql);


$view = null;

if ($result->num_rows > 0) {
        $view = $result->fetch_assoc();
        $count = $view['count'] + 1;
        $sql = "UPDATE views
        SET count=$count;
        ";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
}
else {
    $sql = "INSERT INTO views
    (count)
    VALUES(0);
    ";
    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}



// get data db from table user

$profile = [

    'name' => 'Danny Nguyen',
    'job' => 'Web Developer',
    'avatar' => '/public/assets/images/pro5/pic.jpg'
];


$categories = [
    [
        'id' => 1,
        'name' => "new"
    ],
    [
        'id' => 2,
        'name' => "hot"
    ],
    [
        'id' => 3,
        'name' => "trending"
    ],
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
                        <li id="btn-home" class="list-item" onclick="openLink(this, 'home')"><a class="page-link active-aqua" href="#">
                                <i class="list-icon lnr lnr-home"></i>
                                <p>Home</p>
                            </a></li>
                        <li id="btn-about" class="list-item" onclick="openLink(this, 'about')"><a class="page-link" href="#">
                                <i class="list-icon lnr lnr-user"></i>
                                <p>About Me</p>
                            </a></li>
                        <li id="btn-resume" class="list-item" onclick="openLink(this, 'resume')"><a class="page-link" href="#"><i class="list-icon lnr lnr-graduation-hat"></i>
                                <p>Resume</p>
                            </a></li>
                        <li id="btn-portfolio" class="list-item" onclick="openLink(this, 'portfolio')"><a class="page-link" href="#"><i class="list-icon lnr lnr-briefcase"></i>
                                <p>Portfolio</p>
                            </a></li>
                        <li id="btn-blogs" class="list-item" onclick="openLink(this, 'blogs')"><a class="page-link" href="#"><i class="list-icon lnr lnr-book"></i>
                                <p>Blogs</p>
                            </a></li>
                        <li id="btn-contact" class="list-item" onclick="openLink(this, 'contact')"><a class="page-link" href="#"><i class="list-icon lnr lnr-envelope"></i>
                                <p>Contact</p>
                            </a></li>
                        <li  class="list-item bd-bt"><a class="page-link" href="/admin/index.php"><i class="list-icon fas fa-user-cog"></i>
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
                        <li  onclick="openLink(this, 'home')"><a class="page-link" href="#">

                                <p>Home</p>
                            </a></li>
                        <li  onclick="openLink(this, 'about')"><a class="page-link" href="#">

                                <p>About Me</p>
                            </a></li>
                        <li  onclick="openLink(this, 'resume')"><a class="page-link" href="#">
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
                        <li ><a class="page-link" href="\MYCV\admin\index.php">
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
                <div id="home" class="home-page page show">
                    <div>
                        <h1 class="home-page-name"><?= $profile['name'] ?></h1>
                        <h2 style="color: #aaa;" class="home-page-job"><?= $profile['job'] ?></h2>
                    </div>
                </div>
                <div id="about" class="about-page page">
                    <div class="container">
                        <div class="about-header pd-l-20">
                            <span class="text-light"> About </span>
                            <span class="text-aqua"> Me </span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-7 about-me">
                                <p class="pd-r-10 pd-l-20">Graduated Web Developer currently working on front-end and back-end of
                                    web
                                    development.
                                    Knowledgeable in user interface, testing, and debugging processes. Equipped with a diverse and
                                    promising skill-set. Proficient in an assortment of technologies, including HTML, CSS, JS, PHP
                                    Laravel, WordPress, and MySQL. Willing to learn in order to improve and highly responsible at
                                    work. </p>
                            </div>
                            <div class="col-xs-12 col-sm-5 contact">
                                <p><span class="text-aqua pd-r-5 pd-l-20">Age </span><span class="text-light"> 21</span></p>
                                <p><span class="text-aqua pd-r-5 pd-l-20">Nationality </span><span class="text-light">
                                        Vietnamese</span></p>
                                <p><span class="text-aqua pd-r-5 pd-l-20">Address </span><span class="text-light"> 100 Castlereagh,
                                        Liverpool, NSW</span></p>
                                <p><span class="text-aqua pd-r-5 pd-l-20">e-mail </span><span class="text-light">
                                        naduong1620@gmail.com</span></p>
                                <p><span class="text-aqua pd-r-5 pd-l-20">Phone </span><span class="text-light"> +61
                                        449988312</span></p>
                            </div>
                        </div>
                        <div class="ido-header pd-l-20">
                            <span class="text-light">What</span>
                            <span class="text-aqua">I do</span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="pd-l-20">
                                    <i class="lnr lnr-laptop-phone text-aqua ido-icon"></i>
                                    <h3 class="ido-title text-light">Web Design</h3>
                                    <p class="ido-des text-light">Confident in designing any type of layout including Ecommerce, Blog or Forum.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="pd-l-20">
                                    <i class="fas fa-database text-aqua ido-icon"></i>
                                    <h3 class="ido-title text-light">Database</h3>
                                    <p class="ido-des text-light">Capable of working with backend</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="pd-l-20">
                                    <i class="fas fa-server text-aqua ido-icon"></i>
                                    <h3 class="ido-title text-light">Hardware</h3>
                                    <p class="ido-des text-light">Be able to handle hardware problems</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="pd-l-20">
                                    <i class="fas fa-robot text-aqua ido-icon"></i>
                                    <h3 class="ido-title text-light">Data analytics & AI</h3>
                                    <p class="ido-des text-light">Knowledgeable about Data Analytics and Artificial Intelligence</p>
                                </div>
                            </div>
                        </div>
                        <div class="ido-header pd-l-20">
                            <span class="text-light">Software</span>
                        </div>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="./public/assets/images/Logo/WordPress_logo.svg" alt="" style="height: 2.5rem;">
                            </div>
                            <div class="item">
                                <img src="./public/assets/images/Logo/Laravel.svg" alt="" style="height: 2.5rem;">
                            </div>
                            <div class="item">
                                <img src="./public/assets/images/Logo/Oracle_logo.svg" alt="" style="height: 2.5rem;">
                            </div>
                            <div class="item">
                                <img src="./public/assets/images/Logo/Shopify_logo_2018.svg" alt="" style="height: 2.5rem;">
                            </div>
                            <div class="item">
                                <img src="./public/assets/images/Logo/squarespace-seeklogo.com.svg" alt="" style="height: 2.5rem;">
                            </div>
                            <div class="item">
                                <img src="./public/assets/images/Logo/Wix_logo.svg" alt="" style="height: 2.5rem;">
                            </div>
                        </div>
                        <div class="ido-header pd-l-20">
                            <span class="text-light">Fun</span>
                            <span class="text-aqua">facts</span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="fun-fact">
                                    <i class="lnr lnr-heart"></i>
                                    <h4>Status</h4>
                                    <span>Single</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="fun-fact">
                                    <i class="lnr lnr-clock"></i>
                                    <h4>Working Hours</h4>
                                    <span>452</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="fun-fact">
                                    <i class="lnr lnr-star"></i>
                                    <h4>Languages</h4>
                                    <span>3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="resume" class="resume-page page">
                    <div class="container">
                        <div class="about-header pd-l-20">
                            <span class="text-light"> Resume</span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-7">
                                <h3 class="text-light pd-l-20">Education</h3>
                                <div class="timeline">
                                    <div class="entry">
                                        <div class="title">
                                            <h3>July 2018 - July 2019</h3>
                                            <p>University of Technology Sydney</p>
                                        </div>
                                        <div class="body">
                                            <p>Diploma of Information Technology</p>
                                            <ul>
                                                <li>I spent 1 year at UTS Insearch and graduated with a degree of Diploma of Information Technology
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="entry">
                                        <div class="title">
                                            <h3>July 2019 - July 2021</h3>
                                            <p>University of Technology Sydney</p>
                                        </div>
                                        <div class="body">
                                            <p>Bachelor of Science in Information Technology</p>
                                            <ul>
                                                <li>After graduated from UTS Insearch, I moved to UTS to study Bachelor</li>
                                                <li>With 2 years of hard working, I graduated with major in Enterprise System Development</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-light pd-l-20 mg-t-20">Employment</h3>
                                <div class="timeline">
                                    <div class="entry">
                                        <div class="title">
                                            <h3>Nov 2020 - Sep 2021</h3>
                                            <p>The Savoury Dining</p>
                                        </div>
                                        <div class="body">
                                            <p>ICT Consultant</p>
                                            <ul>
                                                <li>Work with third parties in terms of software installation and operation.</li>
                                                <li>Implement, manage, and maintain software such as POS system, Website, and booking system. </li>
                                                <li>Maintain hardware devices such as Computers, Routers, and Switches. </li>
                                                <li>Propose new implementation for new technologies.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <div class="skill-header">
                                    <span class="text-light"> Working </span>
                                    <span class="text-aqua"> Skills </span>
                                </div>
                                <div class="skill-info">
                                    <div class="skill-clearfix mg-t-20">
                                        <h4>Ability to Multitask</h4>
                                        <h4 class="skill-percentage">90%</h4>
                                    </div>
                                    <div class="percentage-container skill-1">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                    <div class="skill-clearfix">
                                        <h4>Ability to Work Under Pressure</h4>
                                        <h4 class="skill-percentage">85%</h4>
                                    </div>
                                    <div class="percentage-container skill-2">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                    <div class="skill-clearfix">
                                        <h4>Ability to Work in a Team</h4>
                                        <h4 class="skill-percentage">95%</h4>
                                    </div>
                                    <div class="percentage-container skill-3">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                    <div class="skill-clearfix">
                                        <h4>Fast Learning</h4>
                                        <h4 class="skill-percentage">80%</h4>
                                    </div>
                                    <div class="percentage-container skill-4">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                    <div class="skill-clearfix">
                                        <h4>Hard Working</h4>
                                        <h4 class="skill-percentage">100%</h4>
                                    </div>
                                    <div class="percentage-container skill-5">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-header mg-t-20">
                                    <span class="text-light"> Coding </span>
                                    <span class="text-aqua"> Skills </span>
                                </div>
                                <div class="skill-info">
                                    <div class="skill-clearfix mg-t-20">
                                        <h4>HTML/CSS</h4>
                                        <h4 class="skill-percentage">90%</h4>
                                    </div>
                                    <div class="percentage-container skill-6">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                    <div class="skill-clearfix">
                                        <h4>JavaScript</h4>
                                        <h4 class="skill-percentage">80%</h4>
                                    </div>
                                    <div class="percentage-container skill-7">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                    <div class="skill-clearfix">
                                        <h4>PHP</h4>
                                        <h4 class="skill-percentage">85%</h4>
                                    </div>
                                    <div class="percentage-container skill-8">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                    <div class="skill-clearfix">
                                        <h4>API</h4>
                                        <h4 class="skill-percentage">75%</h4>
                                    </div>
                                    <div class="percentage-container skill-9">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                    <div class="skill-clearfix">
                                        <h4>MySQL</h4>
                                        <h4 class="skill-percentage">85%</h4>
                                    </div>
                                    <div class="percentage-container skill-10">
                                        <div class="percentage-bar">
                                        </div>
                                    </div>
                                </div>

                                <div class="hobby mg-t-20">
                                    <div class="skill-header">
                                        <span class="text-light">Hobby</span>
                                    </div>
                                    <ul class="hobby-list">
                                        <li>Travelling</li>
                                        <li>Socializing</li>
                                        <li>Working</li>
                                        <li>Gaming</li>
                                        <li>Driving</li>
                                        <li>Listening to Music</li>
                                        <li>Coding</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="portfolio" class="portfolio-page page">
                    <div class="container">
                        <div class="about-header pd-l-20">
                            <span class="text-light"> Portfolio </span>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <img id="img-1" src="./public/assets/images/others/tsd-1.png" class="port-img pd-l-20" alt="" style="width: 100%; height: 225px;" onclick="showModalOne()">
                                </div>
                                <div class="mg-t-20">
                                    <span class="pd-l-20 text-light card-title mg-t-20">E-commerce</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <img id="img-2" src="./public/assets/images/others/tsd-2.png" class="port-img pd-l-20" alt="" style="width: 100%; height: 225px;" onclick="showModalTwo()">
                                </div>
                                <div class="mg-t-20">
                                    <span class="pd-l-20 text-light card-title ">E-commerce</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <img id="img-3" src="./public/assets/images/others/agent.png" class="port-img pd-l-20" alt="" style="width: 100%; height: 225px;" onclick="showModalThree()">
                                </div>
                                <div class="mg-t-20">
                                    <span class="pd-l-20 text-light card-title mg-t-20">Agency</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <img id="img-4" src="./public/assets/images/others/port.png" class="port-img pd-l-20" alt="" style="width: 100%; height: 225px;" onclick="showModalFour()">
                                </div>
                                <div class="mg-t-20">
                                    <span class="pd-l-20 text-light card-title mg-t-20">Portfolio</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <img id="img-5" src="./public/assets/images/others/personal.png" class="port-img pd-l-20" alt="" style="width: 100%; height: 225px;" onclick="showModalFive()">
                                </div>
                                <div class="mg-t-20">
                                    <span class="pd-l-20 text-light card-title mg-t-20">Personal Website</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="modal-1">
                        <button class="modal-close">&times;</button>
                        <img class="modal-content" src="./public/assets/images/others/tsd-1.png">
                    </div>
                    <div class="modal" id="modal-2">
                        <button class="modal-close">&times;</button>
                        <img class="modal-content" src="./public/assets/images/others/tsd-2.png">
                    </div>
                    <div class="modal" id="modal-3">
                        <button class="modal-close">&times;</button>
                        <img class="modal-content" src="./public/assets/images/others/agent.png">
                    </div>
                    <div class="modal" id="modal-4">
                        <button class="modal-close">&times;</button>
                        <img class="modal-content" src="./public/assets/images/others/port.png">
                    </div>
                    <div class="modal" id="modal-5">
                        <button class="modal-close">&times;</button>
                        <img class="modal-content" src="./public/assets/images/others/personal.png">
                    </div>
                </div>
                <div id="blogs" class="blogs-page page">
                    <div class="container">
                        <div class="about-header">
                            <span class="text-light"> Portfolio </span>
                        </div>
                        <div class="row">
                            <?php foreach ($posts as $post) : ?>
                                <div class="col-md-6 col-sm-12">
                                    <div class="post-card">
                                        <div class="post-thumbnail">
                                        <a href="/postDetail.php?id=<?= $post['id'] ?>">
                                            <img src="<?= $post['thumbnail'] ?>" alt="" class="blog-thumbnail">
                                        </a>
                                        </div>
                                        <div class="post-title">
                                            <h6><?= $post['create_time'] ?></h6>
                                            <h4><?= $post['title'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>

                    </div>
                </div>
                <div id="contact" class="contact-page page">
                    <div class="container">
                        <div class="about-header pd-l-20">
                            <span class="text-light"> Contact </span>
                        </div>
                        <div class="row pd-l-20">
                            <div class="col-xs-12 col-sm-4">
                                <div class="info-block">
                                    <i class="lnr lnr-map-marker"></i>
                                    <h4>Sydney</h4>
                                </div>
                                <div class="info-block">
                                    <i class="lnr lnr-phone-handset"></i>
                                    <h4>+61 449 988 312</h4>
                                </div>
                                <div class="info-block">
                                    <i class="lnr lnr-envelope"></i>
                                    <h4>naduong1620@gmail.com</h4>
                                </div>
                                <div class="info-block">
                                    <i class="lnr lnr-checkmark-circle"></i>
                                    <h4>Remote Working</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <div class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.58206458523!2d150.9174004157466!3d-33.926154529470296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b1295a1ae3f4b0f%3A0xf04beca787478ed3!2s100%20Castlereagh%20St%2C%20Liverpool%20NSW%202170!5e0!3m2!1sen!2sau!4v1638787702354!5m2!1sen!2sau" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>

                                <div class="contact-header">
                                    <span class="text-light"> How Can I </span>
                                    <span class="text-aqua">Help You?</span>
                                </div>
                                <form action="/contactController.php" method="POST">
                                    <div class="contact-form" style="display: flex;">
                                        <div class="col-md-6">
                                            <div class="contact-form-info">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="fullName" placeholder="Fullname">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" class="send-btn">Send Message</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-info">
                                                <div class="form-group">
                                                    <textarea id="" cols="30" rows="10" name="content" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['message'])) : ?>
                                        <div class="msg">
                                            <?php
                                            echo $_SESSION['message'];
                                            unset($_SESSION['message']);
                                            ?>
                                        </div>
                                    <?php endif ?>
                                </form>
                            </div>
                        </div>
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