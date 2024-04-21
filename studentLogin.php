<!--Start Student Login Modal-->
        <!-- Modal -->
        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LoginModalLabel">Student Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Start of Student Login Form-->
            <div class="modal-body">
                <form id="stuLoginForm">
                    <div class="form-group">
                        <i class="fa fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label>
                        <input type="email" 
                        class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i><label for="stuLogPwd" class="pl-2 font-weight-bold">Password</label>
                        <input type="password" 
                        class="form-control" placeholder="Password" name="stuLogPwd" id="stuLogPwd">
                    </div>
                    <button id="signupLinkBtn"><script>
                    document.getElementById("signupLinkBtn").onclick = function() {
                        $('#LoginModal').modal('hide');
                        $('#RegModal').modal('show');
                        }</script><a href="#" class="btn" data-toggle="modal" data-target="#RegModal">Sign Up?</a></button>
                </form>
            </div>
            <!--End of Student Login Form-->
            
            <div class="modal-footer">
                <small id = "statusLogMsg"></small>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="chckStuLogin()">Login</button>
            </div>
            </div>
        </div>
        </div>
        <!--End Student Login Modal-->