$(document).ready(function(){
    // Ajax Call form Already Exists Email Verification
    $('#stuemail').on("keypress blur", function () {
        var reg=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url:"Student/addstudent.php" ,
            method :"POST",
            data: {
                checkemail: "checkmail" ,
                stuemail: stuemail,
            },
            success: function (data) {
                console.log(data);
                if(data!=0){
                   $('#statusMsg2').html("<small style='color:red;'>Email Already Exists!</small>");
                    $("#signup").attr("disabled", true);
                }else if(data==0 && reg.test(stuemail)){
                    $('#statusMsg2').html("<small style='color:green;'></small>");
                    $("#signup").attr("disabled", false);
                 }else if(data==0 && !reg.test(stuemail)){
                    $('#statusMsg2').html("<small style='color:red;'>Please Enter Valid Email e.g example@gmail.com</small>");
                    $("#signup").attr("disabled", false);
                 }
                
            },
        });
    });
});



function addStu(){
    var reg=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupwd = $("#stupwd").val();
    if(stuname.trim()==""){
        $('#statusMsg1').html("<small style='color:red;'>Please Enter Name!</small>");
        $("#stuname").focus();
        return false;
    }
    else if(stuemail.trim()==""){
        $('#statusMsg2').html("<small style='color:red;'>Please Enter Email!</small>");
        $("#stuemail").focus();
        return false;
    }
    else if(stuemail.trim()!="" &&!reg.test(stuemail)){
        $('#statusMsg2').html("<small style='color:red;'>Please Enter Valid Email e.g example@gmail.com</small>");
        $("#stuemail").focus();
        return false;
    }
    else if(stupwd.trim()==""){
        $('#statusMsg3').html("<small style='color:red;'>Please Enter Password!</small>");
        $("#stupwd").focus();
        return false;
    }
    else{
        $.ajax({
            url:'Student/addstudent.php',
            method: 'POST',
            dataType: "json",
            data:{
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupwd: stupwd,
            },
            success:function(data){
                console.log(data);
                if (data == "OK"){
                    $('#successMsg').html("<span class='alert alert-success' style='color: blue;'>Registration Successful!</span>");
                    clearStuRegField()
                }
                else if(data == "Failed"){
                    $('#successMsg').html("<span class='alert alert-danger' style='color: red;'>Unable to Register</span>");
                }
            }
        })
    }
    
}
function clearStuRegField(){
    $('#stuRegForm').trigger('reset');
    $('#statusMsg1').html(" ");
    $('#statusMsg2').html(" ");
    $('#statusMsg3').html(" ");
}
//Ajax call for student login verification
function chckStuLogin(){
    var loginemail=$("#stuLogEmail").val();
    var loginpwd=$("#stuLogPwd").val();
    $.ajax({
        url:'Student/addstudent.php',
        method: 'POST',
        data:{
            checkLogemail: "checkLogmail",
            loginemail: loginemail,
            loginpwd: loginpwd,
        },
        success:function(data){
            if(data==0){
                $("#statusLogMsg").html("<small class='alert alert-danger'>Invalid Email or Password!</small>");
            }else if(data==1){
                $("#statusLogMsg").html("<small class='alert alert-success'>Success Loading...!</small>");
                setTimeout(()=>{
                    window.location.href="index.php";
                },0)
            }
        },
    });
}