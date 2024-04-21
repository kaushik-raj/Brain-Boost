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
$adminEmail = $_SESSION['adminLogemail'];
if(isset($_REQUEST['adminPwdUpdate'])){
    if($_REQUEST['newpwd']=="" || $_REQUEST['oldpwd']=="" || $_REQUEST['confirmpwd']==""){
        $pwdmsg="<div class='mt-5' style='text-align: left; color:red;'>All Fields Are Mandatory!</div>";
    }elseif($_REQUEST['newpwd'] != $_REQUEST['confirmpwd']) {
        $pwdmsg = "<div class='mt-5' style='text-align: left; color:red;'>Password does not match!</div>";
    }
    else{
        $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $row = $result->fetch_assoc();
            if($_REQUEST['oldpwd']===$row['admin_pwd']) {
                $newpwd = $_REQUEST['newpwd'];
                $sql = "UPDATE admin SET admin_pwd = '$newpwd' WHERE admin_email = '$adminEmail'";
                if($conn->query($sql) == TRUE){
                    $pwdmsg = "<div class='mt-5' style='text-align: left; color:green;'>Updated Successfully!</div>";
                }else{
                    $pwdmsg = "<div class='mt-5' style='text-align: left; color:red;'>Unable to Update!</div>";
                }
            } else {
                $pwdmsg = "<div class='mt-5' style='text-align: left; color:red;'>Incorrect old password!</div>";
            }
        }
        
    }
}
?>
<div class = "col-sm-9 mt-5">
    <div class= "row">
        <div class = "col-sm-6">
            <form class = "mt-5 mx-5">
                <div class="form-group">
                    <label for="inputemail">Email</label>
                    <input type="email" class= "form-control" id="inputemail" value="<?php echo $adminEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputoldpwd">Old Password</label>
                    <input type="text" class= "form-control" id="inputoldpwd" placeholder="Old Password" name= "oldpwd">
                </div>
                <div class="form-group">
                    <label for="inputnewpwd">New Password</label>
                    <input type="text" class= "form-control" id="inputnewpwd" placeholder="New Password" name= "newpwd">
                </div>
                <div class="form-group">
                    <label for="confirmpwd">Confirm Password</label>
                    <input type="text" class= "form-control" id="confirmpwd" placeholder="Confirm New Password" name= "confirmpwd">
                </div>
                <?php if(isset($pwdmsg)){echo $pwdmsg;}?>
            <button type="submit" class="btn btn-primary mr-4 mt-4" name="adminPwdUpdate">Change Password</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            
        </div>
            </form>
        </div>
    </div>
</div>
<?php
include('./adminfooter.php');
?>