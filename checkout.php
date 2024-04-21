<?php
include('./dbConnection.php');
session_start();
$stuEmail = $_SESSION['loginemail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Botstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Custom CSS-->
    <!--<link rel="stylesheet" href="../css/style.css">-->
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 jumborton">
                <h3 class="mb-5">Welcome to Payment Page</h3>
                <form method="POST"action="payscript.php">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
                        <div class="col-sm-8">
                            <input id = "ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
                            autocomplete="off"
                            value="<?php echo 'ORDS'.rand(10000,99999999)?>"readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
                        <div class="col-sm-8">
                            <input id = "CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID"
                            autocomplete="off"
                            value="<?php if(isset($stuEmail)){echo $stuEmail;}?>"readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                        <div class="col-sm-8">
                            <input id = "TXN_AMOUNT" class="form-control" tabindex="10"type="text" name="TXN_AMOUNT"
                            value="200"readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!--<label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label">INDUSTRY TYPE ID</label>-->
                        <div class="col-sm-8">
                            <input id = "INDUSTRY_TYPE_ID" class="form-control" tabindex="4" type="hidden" maxlength="12" size="12" 
                            name="INDUSTRY_TYPE_ID" autocomplete="off"
                            value="RETAIL"readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!--<label for="CHANNEL_ID" class="col-sm-4 col-form-label">CHANNEL ID</label>-->
                        <div class="col-sm-8">
                            <input id = "CHANNEL_ID" class="form-control" tabindex="4" type="hidden" maxlength="12" size="12" 
                            name="CHANNEL_ID" autocomplete="off"
                            value="WEB"readonly>
                        </div>
                    </div>
                    
                </form>
                <form style="margin-left:30%;"><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LiWl4Ka6dmfRsa" async> </script> </form>
                    <form style = "margin-left:38%;" method="post" action="index.php">
                    <button class="btn btn-secondary" type="submit" name="cancel" value="true">Cancel</button>
                    </form>
                <small style="margin-left:15%;"class="mt-5 form-text text-muted">Note: Complete Payment By Clicking Razorpay Button</small>
            </div>
        </div>
    </div> 
    <?php
    ?>
</body>
</html>