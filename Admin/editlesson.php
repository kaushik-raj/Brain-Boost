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
    if(($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") 
    || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name']==""))
    {
        $msg = "<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    } 
    else{
        $lesson_id = $_REQUEST['lesson_id'];
        $lesson_name = $_REQUEST['lesson_name'];
        $lesson_desc = $_REQUEST['lesson_desc'];
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $lesson_link = '../lesson/video/'.$_FILES['lesson_link']['name'];

        $sql = "UPDATE lesson SET lesson_id='$lesson_id', lesson_name= '$lesson_name',lesson_desc='$lesson_desc',
        course_id ='$course_id', course_name ='$course_name', lesson_link='$lesson_link' where lesson_id ='$lesson_id' ";
        if($conn->query($sql) == TRUE){
            $msg = "<div class='mt-5' style='text-align: left; color:green;'>Updated Successfully!</div>";
        }else{
            $msg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Update Lesson!</div>";
        }
    }
}
?>



<div class="col-sm-6 mt-5 mx-3 jumbotron">

    <h3 class="text-center">Update Lesson Details</h3>
    <?php
    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM lesson WHERE lesson_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="" method ="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])){echo $row['lesson_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])){echo $row['lesson_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2><?php if(isset($row['lesson_desc'])){echo $row['lesson_desc'];} ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){echo $row['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" onkeypress="isInputNumber(event)" value="<?php if(isset($row['course_name'])){echo $row['course_name'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php if(isset($row['lesson_link'])){echo $row['lesson_link'];} ?>" allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>
        <?php 
        if(isset($msg)) echo $msg; 
        ?>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-primary" id="update" name="update">Apply Changes</button>
            <a href="lessons.php" class="btn btn-secondary">Cancel</a>
        </div>
        
    </form>
</div>

<?php
include('./adminfooter.php');
?>