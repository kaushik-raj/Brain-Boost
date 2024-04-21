<?php
include('../dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Botstrap css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Custom CSS-->
    <!--<link rel="stylesheet" href="../css/style.css">-->
    <link rel="stylesheet" href="../style.css">
    <title>BarrierBreak</title>
    
    
</head>
<body>

    <section>
    <div class="contaner-fluid  p-2"style="background-color: #225470;">
        <h3 class="text-white">BarrierBreak</h3>
        <a class="btn btn-danger" href="./myCourses.php">My Courses</a>
        
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id = "playlist" class="nav flex-column">
                <?php
                if(isset($_GET['course_id'])){
                    $course_id = $_GET['course_id'];
                    $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            echo '<li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' 
                            style="cursor: pointer;">'.$row['lesson_name'].'</li>';
                        }
                    }
                }
                ?>
                </ul>
            </div>
            <div class="col-sm-8">
            <video id="videoarea" src = "" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div></section>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/ajaxrequest.js"></script>
<script type="text/javascript" src="../js/adminajaxrequest.js"></script>
</body>
</html>