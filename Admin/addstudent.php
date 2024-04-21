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
if(isset($_REQUEST['stuSbmtBtn'])){
    //Checking for Empty Fields
    if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pwd'] == "") 
    || ($_REQUEST['stu_gender'] == "") || ($_REQUEST['stu_occ']==""))
    {
        $msg = "<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    }else{
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pwd = $_REQUEST['stu_pwd'];
        $stu_gender = $_REQUEST['stu_gender'];
        $stu_occ = $_REQUEST['stu_occ'];

        $sql = "INSERT INTO students(stu_name, stu_email, stu_pwd, stu_gender, stu_occ)
        VALUES('$stu_name', '$stu_email', '$stu_pwd', '$stu_gender', '$stu_occ')";

        if($conn->query($sql) == TRUE){
            $msg = "<div class='mt-5' style='text-align: left; color:green;'>Student Added Successfully!</div>";
        }else{
            $msg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Add Student!</div>";
        }
    }
}

?>
<div class="col-sm-6 mt-5 mx-3 ">

    <h3 class="text-center">Add New Student</h3>
    <form action="" method ="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" id="stu_email" name="stu_email">
        </div>
        <div class="form-group">
            <label for="stu_pwd">Password</label>
            <input type="text" class="form-control" id="stu_pwd" name="stu_pwd">
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
        </div>
        <?php 
        if(isset($msg)) echo $msg; 
        ?>
        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-danger" id="stuSbmtBtn" name="stuSbmtBtn">Add Student</button>
            <a href="students.php" class="btn btn-secondary">Cancel</a>
        </div>
        
    </form>
</div>
<?php
include('./adminfooter.php')
?>