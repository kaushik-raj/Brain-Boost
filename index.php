<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Botstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="css/all.min.css">
    <!--Google Font-->
    <link rel="stylesheet" href="/path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,600;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>BarrierBreak</title>
    
</head>
<body>
<section class ="header">
            <nav>
            <a href="index.php"><img src="image/logo.png"></a>
                <div class ="nav-links" id ="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="courses.php">Courses</a></li>
                        <?php
                        session_start();
                        if(isset($_SESSION['is_login'])){
                          echo '
                          <li class="nav-item custmo-nav-item"><a href="Student/studentprofile.php" class="nav-link">My Profile</a></li>    
                          <li class="nav-item custmo-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                        }else{
                          echo '<li class="nav-item custmo-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#LoginModal">Login</a></li>    
                          <li class="nav-item custmo-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#RegModal">Signup</a></li>';
                        }
                        ?>  
                    </ul>
                </div>
                <i class="fa fa-compass" onclick="showMenu()"></i>
            </nav>

            <div class ="text-box">
                <h1> World Biggest online platform</h1>
                <p> To do something great you have to start something.Here is the opportunity <br>at the tip of your finger.</p>
                <?php
                if(!isset($_SESSION['is_login'])){
                echo'<a href="#" class="hero-btn " style="text-decoration: none; color: #fff; border-radius: 25px;" data-toggle="modal" data-target="#RegModal">Join Us To Know More</a>';
                }else{
                echo '<a href="Student/studentprofile.php" class="hero-btn "style="text-decoration: none; color: #fff; border-radius: 25px;">My Profile</a>';
                }
                ?>
            </div>
        </section>
        <?php
        include('./HomePage/OfferedCourse.php');
        include('./HomePage/facilities.php');
        include('./HomePage/feedback.php');
        include('./HomePage/banner.php');
        ?>
    </div>
</div>

<?php
include('./MainInclude/Footer.php')
?>
  
