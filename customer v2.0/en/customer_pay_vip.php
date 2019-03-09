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
            <img class="customer_language" src="../Images/language_icon.png" alt="Change Language">

        </div>

        <div>
            <div class="customer_row">
                <div class="customer_col_50">

                </div>
                <div class="customer_col_50 customer_pay_right customer_pay_center">
                    <div class="customer_pay_h1">
                        <p>Order ID</p>
                    </div>
                    <div class="customer_pay_h1">
                        <p>#
                            <?php echo $confirm_n;?>
                        </p>
                    </div>
                    <br>
                    <h2>We have received your order!</h2>
                    <img src="../Images/VIP_Logo.png">
                    <h3>type in this code to open the refrdige</h3>
                    
                    
                    <h3>Back Fridge Passcode: DF3150</h3>
                    <div class="customer_pay_center"><a href="customer_index.php"><button class="customer_confirm_order_button">create new order</button></a></div>

                </div>
            </div>


        </div>
    </body>

    </html>
