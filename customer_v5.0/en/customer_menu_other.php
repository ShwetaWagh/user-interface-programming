<?php
    @include('connect.php');

//select and display all beverage by default
$sql = "SELECT * FROM beverage WHERE C_id not in ('7', '8')";
$result=mysqli_query($conn, $sql);

?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Customer Menu</title>

        <!-- load customer style sheet -->
        <link rel="stylesheet" type="text/css" href="customer_test.css">
        <!--load jQuery for DnD-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="language_switch.js"></script>
        <script src="customer_DnD_undo.js"></script>

    </head>

    <body class="customer_menu_body">

        <div class="customer_header">
            <img id="switch_lang" class="customer_language" src="../Images/language_icon.png" alt="Change Language">

        </div>

        <div>
            <div class="customer_row">
                <!--left part of the web:menu-->
                <div class="customer_col_70">
                    <div class="customer_menu_left">
                        <div class="customer_menu_left_header">

                            <!--Place holder for filter button, to be implement in the next phase-->
                            <span lang="en" class="customer_menu_h1">Drink Menu</span>
                            
                            <span lang="ch" class="customer_menu_h1">菜單</span>
                            <a href="customer_menu_beer.php"><button class="customer_menu_sub_header">Beer</button></a>
                            <a href="customer_menu_wine.php"><button class="customer_menu_sub_header">Wine</button></a>
                            <a href="customer_menu_other.php"><button class="customer_menu_sub_header">Other</button></a>
                            <a href="customer_menu.php"><button class="customer_menu_sub_header">ALL</button></a>
                        </div>
                        <!--Menu table-->

                        <!--show selected data-->
                        <?php
                    while ($row = mysqli_fetch_array($result))
                    {
                        $B_id=$row['B_id'];
                        //$add="INSERT INTO temp ('b_id') VALUES(".$B_id.")";
                        $name=$row['b_name'];
                        $price=$row['price(sell)'];
                        $produce=$row['producer'];
                        $alcohol=$row['Alcohol level'];
                        $k=$row['kosher'];
       
                        if($k==0) $kosher='No';
                        else $kosher='Yes';
                    ?>

                            <!--Each drink on the menu-->
                        
                            <div draggable="true"class="product_drag customer_menu_item_name" data-id="<?php echo $B_id;?>" data-quantity="1" style="cursor:move">
                                <h1>
                                    <img src="../Images/create_icon.png">
                                    <?php echo $name;?>
                                </h1>
                                <table class="customer_menu_table">

                                    <tr>
                                        <td colspan="2"></td>
                                        <td rowspan="5">
                                            <?php echo $price; ?>kr</td>
                                    </tr>
                                    <tr>
                                        <td lang="en">Producer</td>
                                        <td lang="ch">製造商</td>
                                        <td>
                                            <?php echo $produce; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td lang="en">Alcohol content (%)</td>
                                        <td lang="ch">酒精濃度(%)</td>
                                        <td>
                                            <?php echo $alcohol; ?>%</td>
                                    </tr>
                                    <tr>
                                        <td>Kosher</td>
                                        <td>
                                            <?php echo $kosher; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td lang="en">Serving size</td>
                                        <td lang="ch">每份份量</td>
                                        
                                        <td>1 Bottle</td>
                                    </tr>
                                </table>
                            </div>
                            <?php } ?>
                        
                            <!--end insert data of one drink-->

                    </div>
                </div>

                <!--right part of the web:order list-->
                <div class="customer_col_30 product_drag_area">
                    <div class="customer_menu_right">
                        <div class="customer_menu_center">
                            <div class="customer_menu_h3">
                                <span lang="en" class="">Your Order</span>
                                <span lang="ch" class="">你的訂單</span>
                            </div>
                            <!--order list-->
                            <table class="customer_menu_order_table_head">
                                <tr>
                                    <td lang="en">Beverage</td>
                                    <td lang="ch">飲料</td>
                                    <td lang="en">Qtn.</td>
                                    <td lang="ch">數量</td>
                                </tr>
                            </table>
                            <table class="customer_menu_order_table">
                                <div id="dragable_product_order"></div>
                            </table>
                        </div>


                        <!--list order list-->

                        <div class="customer_menu_center">
                            
                            <button class="customer_menu_undo_redo" onclick="undo()">Undo</button>
                            
                        </div>
                        <div class="customer_menu_center">
                            <a href="customer_confirm_order.php"><button class="customer_menu_button">View Order</button></a>
                            <a href="customer_index.php"><button class="customer_menu_button">Cancel</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
