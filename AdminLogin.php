<!-- Modal -->
        <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminModalLabel">Admin Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Start of Admin Login Form-->
            <div class="modal-body">
                <form id="adminLoginForm">
                    <div class="form-group">
                        <i class="fa fa-envelope"></i><label for="adminLogEmail" class="pl-2 font-weight-bold">Email</label>
                        <input type="email" 
                        class="form-control" placeholder="Email" name="adminLogEmail" id="adminLogEmail">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i><label for="adminLogPwd" class="pl-2 font-weight-bold">Password</label>
                        <input type="password" 
                        class="form-control" placeholder="Password" name="adminLogPwd" id="adminLogPwd">
                    </div>
                </form>
            </div>
            <!--End of Student Admin Form-->
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkAdminLogin()">Login</button>
            </div>
            </div>
        </div>
        </div>
