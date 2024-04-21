<?php
if(!isset($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stu_email = $_SESSION['loginemail'];
}else{
    echo "<script>location.href='../index.php';</script>";
}
$sql = "SELECT * FROM students WHERE stu_email= '$stu_email'";
$result = $conn->query($sql);
if($result->num_rows ==1){
    $row = $result->fetch_assoc();
    $stu_id = $row["stu_id"];
}
if(isset($_REQUEST['submitFeedbackBtn'])){
    if($_REQUEST['f_content']==""){
        $passmsg="<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    }else{
        $f_content = $_REQUEST["f_content"];
        $sql= "INSERT INTO feedback(f_content, stu_id) VALUES('$f_content', '$stu_id')";
        if($conn->query($sql) == TRUE){
            $passmsg = "<div class='mt-5' style='text-align: left; color:green;'>SubmittedSuccessfully!</div>";
        }else{
            $passmsg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Submit!</div>";
        }
    }
}
?>
<div class="col-sm-6 mt-5">
    <form class= "mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($stu_id)){echo $stu_id;} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="f_content">Write Feedback:</label>
            <textarea class="form-control" id="f_content" name="f_content" row=2></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Update</button>
        <?php if(isset($passmsg)){echo $passmsg;}?>
    </form>
</div>
</div>

<?php
include('./stuInclude/footer.php');
?>