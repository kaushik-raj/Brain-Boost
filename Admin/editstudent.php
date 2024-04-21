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
    if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pwd'] == "") || ($_REQUEST['stu_gender'] == "") 
    || ($_REQUEST['stu_occ']==""))
    {
        $msg = "<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    } 
    else{
        $stu_id = $_REQUEST['stu_id'];
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pwd = $_REQUEST['stu_pwd'];
        $stu_gender = $_REQUEST['stu_gender'];
        $stu_occ = $_REQUEST['stu_occ'];

        $sql = "UPDATE students set stu_name= '$stu_name',stu_email='$stu_email',stu_pwd='$stu_pwd',
        stu_gender='$stu_gender',stu_occ='$stu_occ' where stu_id ='$stu_id' ";
        if($conn->query($sql) == TRUE){
            $msg = "<div class='mt-5' style='text-align: left; color:green;'>Updated Successfully!</div>";
        }else{
            $msg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Update!</div>";
        }
    }
}
?>



<div class="col-sm-6 mt-5 mx-3">

    <h3 class="text-center">Update Course Details</h3>
    <?php
    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM students WHERE stu_id={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="" method ="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($row['stu_id'])){echo $row['stu_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($row['stu_name'])){echo $row['stu_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($row['stu_email'])){echo $row['stu_email'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_pwd">Password</label>
            <input type="text" class="form-control" id="stu_pwd" name="stu_pwd" value="<?php if(isset($row['stu_pwd'])){echo $row['stu_pwd'];} ?>">
        </div>
        <div class="form-group mt-3">
                <label class="mt-3">Gender:</label>
                <tr class = "ml-5">Male <input type="radio" id="stu_gender" name= "stu_gender" value = "Male" required></tr>
                <tr>Female <input type="radio" id="stu_gender" name= "stu_gender" value = "Female" required></tr>
        </div>
        <div class="form-group mt-3">
            <label for="stu_occ">Occupation:</label>
            <select id="stu_occ" name="stu_occ">
                <option value="Student">Student</option>
                <option value="Engineer">Engineer</option>
                <option value="Entrepreneur">Entrepreneur</option>
                <option value="Freelancer">Freelancer</option>
                <option value="Accountant">Accountant</option>
                <option value="Architect">Architect</option>
                <option value="Artist">Artist</option>
                <option value="Chef">Chef</option>
                <option value="Doctor">Doctor</option>
                <option value="Farmer">Farmer</option>
                <option value="Journalist">Journalist</option>
                <option value="Lawyer">Lawyer</option>
                <option value="Photographer">Photographer</option>

            </select>
        <?php 
        if(isset($msg)) echo $msg; 
        ?>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-primary" id="update" name="update">Apply Changes</button>
            <a href="students.php" class="btn btn-secondary">Cancel</a>
        </div>
        
    </form>
</div>

<?php
include('./adminfooter.php');
?>