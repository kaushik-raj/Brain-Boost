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
    $stu_name = $row["stu_name"];
    $stu_occ = $row["stu_occ"];
    $stu_img = $row["stu_img"];
}
if(isset($_REQUEST['updateStuNameBtn'])){
    if($_REQUEST['stu_name']==""){
        $passmsg="<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    }else{
        $stu_name = $_REQUEST["stu_name"];
        $stu_occ = $_REQUEST["stu_occ"];
        $stu_img = $_FILES['stu_img']['name'];
        $stu_img_temp = $_FILES['stu_img']['tmp_name'];
        $img_folder = '../image/stu/'.$stu_img;
        move_uploaded_file($stu_img_temp, $img_folder);
        $sql = "UPDATE students SET stu_name = '$stu_name',stu_occ = '$stu_occ',stu_img = '$img_folder' WHERE stu_email = '$stu_email'";
        if($conn->query($sql) == TRUE){
            $passmsg = "<div class='mt-5' style='text-align: left; color:green;'>Student Added Successfully!</div>";
        }else{
            $passmsg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Add Student!</div>";
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
            <label for="stu_email">Email</label>
            <input type="email" class="form-control" id="stu_email" name="stu_email" value="<?php echo $stu_email ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($stu_name)){echo $stu_name;} ?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($stu_occ)){echo $stu_occ;} ?>">
        </div>
        <div class="form-group">
            <label for="stu_img">Update Image</label>
            <input type="file" class="form-control-file" id="stu_img" name="stu_img">
        </div>
        <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
        <?php if(isset($passmsg)){echo $passmsg;}?>
    </form>
</div>
</div>

<?php
include('./stuInclude/footer.php');
?>