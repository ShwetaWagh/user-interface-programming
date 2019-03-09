<?php

@include('connect.php');

$sql="select * from temp";
$result=mysqli_query($conn, $sql);

//set total price
$total=0;
//random order ID
$confirm_n=rand(0,99999);
$confirm_n = str_pad($confirm_n, 5, '0', STR_PAD_LEFT);

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
    echo $total;
    $sql3="INSERT INTO `order list` (`O_id`, `total`) VALUES (".$confirm_n.", ".$total.")";
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
                    <h1>We have received your order!</h1>

                    <h3>Collect your drink at the bar when your order number is shown on the screen =D</h3>
                    <div class="customer_pay_center"><a href="customer_index.php"><button class="customer_confirm_order_button">create new order</button></a></div>

                </div>
            </div>


        </div>
    </body>

    </html>
