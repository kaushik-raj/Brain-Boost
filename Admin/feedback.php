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
?>
<div class="col-sm-9 mt-5">
    <!--Table-->
    <p class="bg-dark text-white p-2">Feedbacks List</p>
    <?php
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Feedback ID</th>
                <th scope="col">Feedback</th>
                <th scope="col">Student ID</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <th scope="row"><?php echo $row['f_id']; ?></th>
                <td><?php echo $row['f_content']; ?></td>
                <td><?php echo $row['stu_id']; ?></td>
                
                <td>
                    <form method="POST" class = "d-inline">
                        <input type = "hidden" name="id" value= <?php echo $row['f_id']; ?> >
                        <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
        }else{
            $msg = "<div class='mt-2' style='text-align: center; color:Black;'><b>No Feedbacks Yet!</b></div>";
            echo $msg;
        }
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM feedback where f_id = {$_REQUEST['id']}";
            if($conn->query($sql)==TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
            }else{
                echo "Unable to Delete Data";
            }
        }
    ?>
</div>
</div>
<?php
include('./adminfooter.php');
?>