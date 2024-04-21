<?php
include('../dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
    $loginemail = $_SESSION['loginemail'];
}
if(isset($loginemail)){
    $sql = "SELECT stu_img FROM students WHERE stu_email='$loginemail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>
<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Botstrap css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../css/stustyle.css">

</head>
<body>
<!--Top navbar-->
<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="studentprofile.php">BarrierBreak</a>
    </nav>
    <!--Side Bar-->
    <div class = "container-fluid mb-5" style="margin-top: 40px; ">
        <div class = "row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky"style="height:100vh;">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="studentimage" class= "img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="studentprofile.php">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">
                                <i class="fas fa-house"></i>
                                Home Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="myCourses.php">
                                <i class="fa-solid fa-book"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stufeedback.php">
                                <i class="fa-regular fa-comment"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stuchangepwd.php">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>