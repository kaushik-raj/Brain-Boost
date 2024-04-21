<?php
include('./dbConnection.php');
include('./MainInclude/Header.php');
?>
<h1>All Courses</h1>
</section>
<div class="container mt-5">
    
    <!--Start MOst popular course 1st card deck-->
    <div class="row mt-4">
        <?php 
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result-> fetch_assoc()){
                $course_id = $row['course_id'];
                echo '
                <div class="courses col-sm-4 mb-4" style=" flex-basis: 32%; background: #f8f2f2; border-radius: 20px; margin-bottom: 5%;padding: 20px 12px;">
                <a href="CourseDetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img src="'.str_replace('..','.',$row['course_img']).'" class="card-img-top" alt="Guitar"/>
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;">'.$row['course_name'].'</h5>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small><span
                            class="font-weight-bolder ml-2">&#8377 '.$row['course_price'].'</span></p><a class="btn btn-primary text-weight font-weight-bolder
                            float-right" href="CourseDetails.php?course_id='.$course_id.'" style=" padding: 12px 34px; font-size: 12px;  
                            border: 1px solid #f44336; background: #b84927;">Enroll</a>
                    </div>
                </div>
                </a>
                </div>';
            }
        }
        ?>
    </div>
    
</div>
<style>
.courses:hover{
    box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);   
    transition: 0.6s; 
}
</style>
<?php
include('./MainInclude/Footer.php')
?>