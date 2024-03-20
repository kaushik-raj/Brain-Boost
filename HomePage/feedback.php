<?php
include('./dbConnection.php');
?>
<section class="testimonials">
            <h1> What our Student Says..</h1>
            <p>Our Students Speak: Transforming Lives Through Education</p>
            <div class="row">
            <?php
                
                    
                    $sql = "SELECT s.stu_name, s.stu_img, f.f_content FROM students AS s JOIN feedback AS f ON s.stu_id = f.stu_id LIMIT 2";
                    $result = $conn->query($sql);
                    if($result->num_rows>0){
                        while($row = $result-> fetch_assoc()){
                            $stu_img = $row['stu_img'];
                            $n_img = str_replace('..','.',$stu_img);
                    ?>
                    <div class="testimonial-col">
                    <img src="<?php echo $n_img; ?>">
                    <div>
                        <p>
                            <?php echo $row['f_content'];?>
                        </p>
                        <h3><?php echo $row['stu_name'];?></h3>
                        <i class="fa fa-star" aria-hidden></i>
                        <i class="fa fa-star" aria-hidden></i>
                        <i class="fa fa-star" aria-hidden></i>
                        <i class="fa fa-star" aria-hidden></i>
                        <i class="fa fa-star" aria-hidden></i>
                    </div>
                    
                </div>
                <?php
                }}
                ?>
            </div>
        </section>