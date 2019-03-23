<?php

@include('connect.php');

$sql="select * from temp";
$result=mysqli_query($conn, $sql);

$total=0;
?>
    <div class="customer_confirm_order_table">
        <table>
            <?php
    while($row=mysqli_fetch_array($result)){
    $sql1="select * from beverage where B_id='".$row['b_id']."'";
    $result1=mysqli_query($conn, $sql1);
    $row1=mysqli_fetch_array($result1);
    $total=$total+$row1['price(sell)']*$row['quantity'];
?>
                <tr>
                    <td>
                        <?php echo $row1['b_name'];?>
                    </td>
                    <td>
                        <div style="line-height: 30px;">
                            <img src="../Images/minus_icon.png" onclick="Minus(<?php echo $row['quantity'];?>, <?php echo $row['b_id'];?>)">

                            <?php echo $row['quantity'];?>

                            <img src="../Images/plus_icon.png" onclick="Plus(<?php echo $row['quantity'];?>, <?php echo $row['b_id'];?>)">
                        </div>
                    </td>
                    <td>
                        <?php echo $row1['price(sell)'];?>kr
                    </td>
                </tr>
                <?php } ?>
        </table>
    </div>
    <hr>
    <h3 lang="en" style="float: right">Total:
        <?php echo $total;?>kr</h3>

    <h3 lang="ch" style="float: right">總金額:
        <?php echo $total;?>kr</h3>
