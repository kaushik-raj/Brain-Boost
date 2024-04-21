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
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
$totalstu = $result->num_rows;

$sql = "SELECT * FROM courseorder";
$result = $conn->query($sql);
$totalsold = $result->num_rows;
?>
    <div class="col-sm-9 mt-5">
        <div class="row mx-5 text-center">
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-danger mb-3" style="max-width: 22rem;">
                    <div class="card-header">Courses</div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $totalcourse; ?>
                            </h4>
                            <a class="btn text-white" href="courses.php">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-success mb-3" style="max-width: 22rem;">
                    <div class="card-header">Students</div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $totalstu; ?>
                            </h4>
                            <a class="btn text-white" href="students.php">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-5">
                    <div class="card text-white bg-info mb-3" style="max-width: 22rem;">
                    <div class="card-header">Sold</div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $totalsold; ?>
                            </h4>
                            <a class="btn text-white" href="sellReport.php">View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-6 mt-5 text-center">
                <!--Table-->
                <p class="bg-dark text-white p-2" >Course Ordered</p>
                <?php 
                $sql = "SELECT * FROM courseorder";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Course ID</th>
                            <th scope="col">Student Email</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while($row = $result->fetch_assoc()){
                       echo '<tr>
                            <th scope="row">'.$row["order_id"].'</th>
                            <td>'.$row["course_id"].'</td>
                            <td>'.$row["stu_email"].'@gmail.com</td>
                            <td>'.$row["order_date"].'</td>
                            <td>'.$row["amount"].'</td>
                        </tr>';
                    }
                    echo '</tbody>
                </table>';
                }else{
                    echo '0 Result';
                }?>
            </div>
        </div>
    </div>
</div>
<?php
include('./adminfooter.php')
?>