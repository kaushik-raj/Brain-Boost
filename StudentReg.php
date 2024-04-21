<!--Student Registration Page Start-->
<div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="RegModalLabel">Student Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <!--Start of Student Registration Form-->
                <form id='stuRegForm'>
                    <div class="form-group">
                        <i class="fa fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><small id="statusMsg1"></small>
                        <input type="text" 
                        class="form-control" placeholder="Name" name="stuname" id="stuname">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label><small id="statusMsg2"></small>
                        <input type="email" 
                        class="form-control" placeholder="Email" name="stuemail" id="stuemail">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i><label for="stuepwd" class="pl-2 font-weight-bold">Password</label><small id="statusMsg3"></small>
                        <input type="password" 
                        class="form-control" placeholder="Password" name="stupwd" id="stupwd">
                    </div>
                    <button id="loginLinkBtn"><script>
                    document.getElementById("loginLinkBtn").onclick = function() {
                        $('#RegModal').modal('hide');
                        $('#LoginModal').modal('show');
                        }</script><a href="#" class="btn" data-toggle="modal" data-target="#LoginModal">Have an Account?</a></button>
                </form>
                <!--End of Student Registration Form-->
            </div>
            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Sing Up</button>
                
            </div>
            </div>
        </div>
        </div>
        <!--Student Registration Page End-->