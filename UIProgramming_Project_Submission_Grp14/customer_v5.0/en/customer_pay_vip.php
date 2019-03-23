<?php

@include('connect.php');

$sql="select * from temp";
$result=mysqli_query($conn, $sql);

//set total price
$total=0;
//random order ID
$confirm_n=rand(0,99999);
$confirm_n = str_pad($confirm_n, 5, '0', STR_PAD_LEFT);

$vip_id=$_GET['id'];

if($result){
    while($row=mysqli_fetch_array($result)){
        //select beverage name
        $sql1="select * from beverage where B_id='".$row['b_id']."'";
        $result1=mysqli_query($conn, $sql1);
        $row1=mysqli_fetch_array($result1);
        //count price
        $price=$row1['price(sell)']*$row['quantity'];
        $total=$total+$price;
        //insert into drink list
        $sql2="INSERT INTO `drink list` (`No.`, `O_id`, `B-id`, `amount`, `price`) VALUES (".$confirm_n.",".$confirm_n.",".$row['b_id'].",".$row['quantity'].",".$price.")";
        $result2=mysqli_query($conn, $sql2);
    }
    
    $sql3="INSERT INTO `order list` (`O_id`, `total`, `VIP_id`) VALUES (".$confirm_n.", ".$total.",".$vip_id.")";
    $result3=mysqli_query($conn, $sql3);
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Customer Pay</title>

        <!-- load customer style sheet -->
        <link rel="stylesheet" type="text/css" href="customer_test.css">

    </head>

    <body class="customer_pay_body">

        <div class="customer_header">
            <img id="switch_lang" class="customer_language" src="../Images/language_icon.png" alt="Change Language">

        </div>

        <div>
            <div class="customer_row">
                <div class="customer_col_50">

                </div>
                <div class="customer_col_50 customer_pay_right customer_pay_center">
                    <div class="customer_pay_h1">
                        <p lang="en">Order ID</p>
                        <p lang="ch">訂單編號</p>
                    </div>
                    <div class="customer_pay_h1">
                        <p>#
                            <?php echo $confirm_n;?>
                        </p>
                    </div>
                    <br>
                    <h2 lang="en">We have received your order!</h2>
                    <h2 lang="ch">我們已經收到您的訂單了！</h2>
                    <img src="../Images/VIP_Logo.png">
                    <h3 lang="en">type in this code to open the fridge</h3>
                    <h3 lang="ch">輸入此密碼以開啟冰箱</h3>
                    
                    
                    <h3 lang="en">Back Fridge Passcode: DF3150</h3>
                    <h3 lang="ch">冰箱密碼: DF3150</h3>
                    <div class="customer_pay_center"><a href="customer_index.php">
                        <button lang="en" class="customer_confirm_order_button">create new order</button>
                        <button lang="ch" class="customer_confirm_order_button">建立新訂單</button>
                        </a></div>

                </div>
            </div>


        </div>
        <script src="language_switch.js"></script>
    </body>

    </html>
