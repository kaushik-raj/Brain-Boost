//Ajax call for admin login verification
function checkAdminLogin(){
    var adminLogemail=$("#adminLogEmail").val();
    var adminLogpwd=$("#adminLogPwd").val();
    $.ajax({
        url:'Admin/admin.php',
        method: 'POST',
        data:{
            checkLogemail: "checkLogmail",
            adminLogemail: adminLogemail,
            adminLogpwd: adminLogpwd,
        },
        success:function(data){
            if(data==0){
                $("#statusAdminLogMsg").html("<small class='alert alert-danger'>Invalid Email or Password!</small>");
            }else if(data==1){
                $("#statusAdminLogMsg").html("<small class='alert alert-success'>Success Loading...!</small>");
                setTimeout(()=>{
                    window.location.href="Admin/adminDashboard.php";
                },0)
            }
        },
    });
}