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

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID:  </label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <?php
    $sql="SELECT course_id FROM course";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if(isset($_REQUEST['checkid']) && $_REQUEST['checkid']==$row['course_id']){
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($row['course_id']==$_REQUEST['checkid']){
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
                ?>
                <h6 class="mt-5 bg-dark text-white p-2">
                Course Name: <?php if(isset($row['course_name'])){echo $row['course_name'];} ?></h6>
            <?php  
            $sql ="SELECT * FROM lesson WHERE course_id= {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            ?>
            <table class="table">
        <thead>
            <tr>
                <th scope="col">Lesson ID</th>
                <th scope="col">Lesson Name</th>
                <th scope="col">Lesson Link</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <th scope="row"><?php echo $row['lesson_id']; ?></th>
                <td><?php echo $row['lesson_name']; ?></td>
                <td><?php echo $row['lesson_link']; ?></td>
                
                <td>
                    <form action = 'editlesson.php' method="POST" class = "d-inline">
                        <input type = "hidden" name="id" value= <?php echo $row['lesson_id']; ?> >
                        <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button>
                    </form>
                    <form method="POST" class = "d-inline">
                        <input type = "hidden" name="id" value= <?php echo $row['lesson_id']; ?> >
                        <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
            <?php
            }else{
                echo '<div class="alert alert-dark mt-4" role="alert">Course Not Found!</div>';
            }
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM lesson WHERE lesson_id={$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
                }else{
                    echo "Unable to Delete Data";
                }
            }
        }
    }
    ?>
</div>
<?php
if(isset($_SESSION['course_id'])){
    echo '<div>
    <a class="btn btn-primary box" href="addlesson.php"><i class="fas fa-plus fa-2x"></i></a>
</div>';
}
?>

<?php
include('./adminfooter.php');
?>