<?php
if(!isset($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include_once('../dbConnection.php');
if(isset($_SESSION['is_login'])){
    $loginemail= $_SESSION['loginemail'];

}else{
    echo "<script> locaton.href='../index.php';</script>";
}
?>
<div class="container mt-5 ml-4">
    <div class="row">
        <div class="jumborton">
            <h4 class="text-center">My Courses</h4>
            <?php
            if(isset($loginemail)){
                $sql = "SELECT co.order_id, c.course_id, c.course_name,c.course_duration,c.course_desc,c.course_img,
                c.course_author, c.course_original_price,c.course_price 
                FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email = '$loginemail'";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){?>
                    <div class = "bg-light mb-3">
                        <h5 class="card-header"><?php echo $row['course_name'];?></h5>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo $row['course_img'];?>" class="card-img-top mt-4" alt="pic">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card-body">
                                    <p class="card-title"><?php echo $row['course_desc'];?></p>
                                    <small class = "card-text">Duration:<?php echo $row['course_duration'];?></small><br/>
                                    <small class = "card-text">Instructor:<?php echo $row['course_author'];?></small><br/>
                                    <a href="watchcourse.php?course_id=<?php echo $row['course_id']?>" class="btn btn-primary mt-5 float-right">Watch Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                }
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
include('./stuInclude/footer.php');
?>