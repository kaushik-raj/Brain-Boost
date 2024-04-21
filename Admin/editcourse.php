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
if(isset($_REQUEST['update'])){
    //Checking for Empty Fields
    if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_duration'] == "") 
    || ($_REQUEST['course_original_price']=="") || ($_REQUEST['course_price']==""))
    {
        $msg = "<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    } 
    else{
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $course_author = $_REQUEST['course_author'];
        $course_desc = $_REQUEST['course_desc'];
        $course_duration = $_REQUEST['course_duration'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_price = $_REQUEST['course_price'];
        $course_img = '../image/courseimage/'.$_FILES['course_img']['name'];

        $sql = "UPDATE course set course_name= '$course_name',course_author='$course_author',course_desc='$course_desc',
        course_duration='$course_duration',course_original_price='$course_original_price',course_price='$course_price',
        course_img='$course_img' where course_id ='$course_id' ";
        if($conn->query($sql) == TRUE){
            $msg = "<div class='mt-5' style='text-align: left; color:green;'>Updated Successfully!</div>";
        }else{
            $msg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Update Course!</div>";
        }
    }
}
?>



<div class="col-sm-6 mt-5 mx-3 ">

    <h3 class="text-center">Update Course Details</h3>
    <?php
    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM Course WHERE course_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="" method ="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){echo $row['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){echo $row['course_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($row['course_author'])){echo $row['course_author'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" id="course_desc" name="course_desc"><?php if(isset($row['course_desc'])){echo $row['course_desc'];} ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($row['course_duration'])){echo $row['course_duration'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if(isset($row['course_original_price'])){echo $row['course_original_price'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if(isset($row['course_price'])){echo $row['course_price'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php if(isset($row['course_img'])){echo $row['course_img'];} ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <?php 
        if(isset($msg)) echo $msg; 
        ?>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-primary" id="update" name="update">Apply Changes</button>
            <a href="courses.php" class="btn btn-secondary">Cancel</a>
        </div>
        
    </form>
</div>

<?php
include('./adminfooter.php');
?>