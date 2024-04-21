<?php
if(!isset($_SESSION)){
    session_start();
}
include('./adminheader.php');
include('../dbConnection.php');
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogemail'];
}else{
    echo "<script>location.href='../index.php';</script>";
}
if(isset($_REQUEST['courseSbmtBtn'])){
    //Checking for Empty Fields
    if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_duration'] == "") 
    || ($_REQUEST['course_original_price']=="") || ($_REQUEST['course_price']==""))
    {
        $msg = "<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    } 
    else{
        $course_name = $_REQUEST['course_name'];
        $course_author = $_REQUEST['course_author'];
        $course_desc = $_REQUEST['course_desc'];
        $course_duration = $_REQUEST['course_duration'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_price = $_REQUEST['course_price'];
        $course_img = $_FILES['course_img']['name'];
        $course_img_tmp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../image/courseimage/'.$course_img;
        move_uploaded_file($course_img_tmp, $img_folder);

        $sql = "INSERT INTO Course(course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price)
        VALUES('$course_name', '$course_desc', '$course_author', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";

        if($conn->query($sql) == TRUE){
            $msg = "<div class='mt-5' style='text-align: left; color:green;'>Course Added Successfully!</div>";
        }else{
            $msg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Add Course!</div>";
        }
    }
}

?>
<div class="col-sm-6 mt-5 mx-3 ">

    <h3 class="text-center">Add New Course</h3>
    <form action="" method ="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" id="course_desc" name="course_desc"></textarea>
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <?php 
        if(isset($msg)) echo $msg; 
        ?>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger" id="courseSbmtBtn" name="courseSbmtBtn">Add Course</button>
            <a href="courses.php" class="btn btn-secondary">Cancel</a>
        </div>
        
    </form>
</div>
<?php
include('./adminfooter.php')
?>