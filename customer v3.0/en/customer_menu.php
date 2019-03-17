<?php
    @include('connect.php');

//suppose the category id for beer is 0
$sql = "SELECT * FROM beverage where C_id=0";
$result=mysqli_query($conn, $sql);


//create temp table for order list
$sqll="CREATE TABLE temp (b_id INT(6), quantity INT(6))";
$sqll3="SELECT * FROM temp WHERE 1";
//if no table, creat one
if(!mysqli_query($conn, $sqll3)) $result1=mysqli_query($conn, $sqll);
$sqll2 = "SELECT * FROM temp";
$result1=mysqli_query($conn, $sqll2);

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Customer Menu</title>

        <!-- load customer style sheet -->
        <link rel="stylesheet" type="text/css" href="customer_test.css">
        <!--load jQuery for DnD-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    </head>

    <body class="customer_menu_body">

        <div class="customer_header">
            <img class="customer_language" src="../Images/language_icon.png" alt="Change Language">

        </div>

        <div>
            <div class="customer_row">
                <!--left part of the web:menu-->
                <div class="customer_col_70">
                    <div class="customer_menu_left">
                        <div class="customer_menu_left_header">

                            <span class="customer_menu_h1">Beer Menu</span>
                            <a href="#"><button class="customer_menu_sub_header">Beer</button></a>
                            <a href="#"><button class="customer_menu_sub_header">Wine</button></a>
                            <a href="#"><button class="customer_menu_sub_header">Other</button></a>
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

                            <!--insert data-->
                            <div class="product_drag customer_menu_item_name" data-id="<?php echo $B_id;?>" data-quantity="1" style="cursor:move">
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
                                        <td>Produce</td>
                                        <td>
                                            <?php echo $produce; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alcohol content</td>
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
                                        <td>Serving size</td>
                                        <td>1 Bottel</td>
                                    </tr>
                                </table>
                            </div>
                            <?php } ?>
                            <!--end insert data-->

                    </div>
                </div>

                <!--right part of the web:order list-->
                <div class="customer_col_30 product_drag_area">
                    <div class="customer_menu_right">
                        <div class="customer_menu_center">
                            <div class="customer_menu_h3">
                                <span class="">Your Order</span>
                            </div>
                            <!--order list-->
                            <table class="customer_menu_order_table_head">
                                <tr>
                                    <td>Beverage</td>
                                    <td>Qtn.</td>
                                </tr>
                            </table>
                            <table class="customer_menu_order_table">
                                <div id="dragable_product_order"></div>
                            </table>
                        </div>


                        <!--list order list-->

                        <div class="customer_menu_center">
                            <button class="customer_menu_undo_redo">Undo</button>
                            <button class="customer_menu_undo_redo">Redo</button>
                        </div>
                        <div class="customer_menu_center">
                            <a href="customer_confirm_order.php"><button class="customer_menu_button">View Order</button></a>
                            <a href="customer_index.php"><button class="customer_menu_button">Cancel</button></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!--jQuery to complete DnD also add data to DB-->
        <script>
            $(document).ready(function(data) {

                showDrop();

                $('.product_drag_area').on('dragover', function() {
                    $(this).addClass('product_drag_over');
                    return false;
                });
                $('.product_drag_area').on('dragleave', function() {
                    $(this).removeClass('product_drag_over');
                    return false;
                });

                $('.product_drag').on('dragstart', function(e) {
                    e.originalEvent.dataTransfer.setData('productid', $(this).data('id'));
                    e.originalEvent.dataTransfer.setData('productquantity', $(this).data('quantity'));
                });
                $('.product_drag_area').on('drop', function(e) {
                    e.preventDefault();
                    $(this).removeClass('product_drag_over');
                    var id = e.originalEvent.dataTransfer.getData('productid');
                    var quantity = e.originalEvent.dataTransfer.getData('productquantity');
                    $.ajax({
                        url: "add_item.php",
                        method: "POST",
                        data: {
                            id: id,
                            quantity: quantity,
                            action: 1,
                        },
                        success: function() {
                            showDrop();
                        }
                    })
                });
            });

            function showDrop() {
                $.ajax({
                    url: "fetch_item.php",
                    method: "POST",
                    data: {
                        fetch: 1,
                    },
                    success: function(data) {
                        $('#dragable_product_order').html(data);
                    }
                })
            }

        </script>
    </body>

    </html>
    <!--DnD reference-->
    <!--https://www.sourcecodester.com/tutorials/php/11641/drag-drop-and-insert-database-using-ajaxjquery-php.html-->
