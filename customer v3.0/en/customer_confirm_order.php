<?php
@include('connect.php');
$sql="select * from temp";
$result=mysqli_query($conn, $sql);

$total=0;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Customer Home</title>

        <!-- load customer style sheet -->
        <link rel="stylesheet" type="text/css" href="customer_test.css">
        <!--load jQuery for DnD-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    </head>

    <body class="customer_index_body">

        <div class="customer_header">
            <img class="customer_language" src="../Images/language_icon.png" alt="Change Language">

        </div>

        <div>
            <div class="customer_row">
                <div class="customer_confirm_order_menu">
                    <a href="customer_menu.php"><img src="../Images/menu_btn_left.png"></a>
                </div>

                <div class="customer_confirm_order_left">

                </div>


                <div class="customer_col_70">
                    <div class="customer_col_70 customer_confirm_order_right">
                        <span class="customer_confirm_order_h1">Order Confirmation</span>

                        <a href="customer_pay.php"><button class="customer_confirm_order_button">PAY</button></a>
                        <a href="customer_vip_login.html"><button class="customer_confirm_order_button">VIP PAY</button></a>


                        <hr>
                        <div id="show_conform_list"></div>
                        

                    </div>

                </div>
            </div>


        </div>
        <script>
            showList();

            function Minus(n,id) {
                jQuery.ajax({
                    type: "POST",
                    url: "minus_add.php",
                    data: {
                        n: n-1, 
                        id: id,
                        action: 1,
                    },
                    cache: false,
                    success: function()
                    {
                        showList();
                    }
                });
            }

            function Plus(n,id) {
                jQuery.ajax({
                    type: "POST",
                    url: "minus_add.php",
                    data: {
                        n: n+1, 
                        id: id,
                        action: 1,
                    },
                    cache: false,
                    success: function()
                    {
                        showList();
                    }
                });
            }

            function showList() {
                $.ajax({
                    url: "show_confirm.php",
                    method: "POST",
                    data: {
                        show: 1,
                        action: 1,
                    },
                    success: function(data) {
                        $('#show_conform_list').html(data);
                    }
                })
            }

        </script>

    </body>

    </html>
