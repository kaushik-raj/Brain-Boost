<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('..//dbConnection.php');
//Checking already registered emails
if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
    $stuemail = $_POST['stuemail'];
    $sql = "SELECT stu_email FROM students WHERE stu_email = '".$stuemail."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

//Insert Student
if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupwd'])){
$stuname = $_POST['stuname'];
$stuemail = $_POST['stuemail'];
$stupwd = $_POST['stupwd'];

$sql= "INSERT INTO students(stu_name, stu_email, stu_pwd) VALUES
('$stuname', '$stuemail', '$stupwd')";
if($conn->query($sql) == TRUE){
echo json_encode("OK");
} else{
echo json_encode("Failed");
}
}
//Student Login vderification
if(!isset($_SESSION['is_login'])){
    if(isset($_POST['checkLogemail']) && isset($_POST['loginemail']) && isset($_POST['loginpwd'])){
        $loginemail=$_POST['loginemail'];
        $loginpwd=$_POST['loginpwd'];
        $sql = "SELECT stu_email, stu_pwd FROM students WHERE stu_email='".$loginemail."' AND stu_pwd='".$loginpwd."'";
        $result=$conn->query($sql);
        $row=$result->num_rows;
        if($row==1){
            $_SESSION['is_login']=true;
            $_SESSION['loginemail']=$loginemail;
            echo json_encode($row);

        }else if($row==0){
            echo json_encode($row);
        }
    }
}
?>