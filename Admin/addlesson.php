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
if(isset($_REQUEST['lessonSbmtBtn'])){
    //Checking for Empty Fields
    if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") 
    || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") 
    )
    {
        $msg = "<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    } 
    else{
        $lesson_name = $_REQUEST['lesson_name'];
        $lesson_desc = $_REQUEST['lesson_desc'];
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_tmp = $_FILES['lesson_link']['tmp_name'];
        $link_folder = '../lesson/video/'.$lesson_link;
        move_uploaded_file($lesson_link_tmp, $link_folder);
        $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES ('$lesson_name', 
        '$lesson_desc', '$link_folder', '$course_id', '$course_name')";
        if($conn->query($sql) == TRUE){
            $msg = "<div class='mt-5' style='text-align: left; color:green;'>Lesson Added Successfully!</div>";
        }else{
            $msg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Add Lesson!</div>";
        }
    }
}

?>
<div class="col-sm-6 mt-5 mx-3 ">

    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method ="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>
        <?php 
        if(isset($msg)) echo $msg; 
        ?>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger" id="lessonSbmtBtn" name="lessonSbmtBtn">Add Lesson</button>
            <a href="lessons.php" class="btn btn-secondary">Cancel</a>
        </div>
        
    </form>
</div>
<?php
include('./adminfooter.php')
?>