<?php
@include('connect.php');
$sql="select * from temp";
$result=mysqli_query($conn, $sql);

$total=0;
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Customer Home</title>

        <!-- load customer style sheet -->
        <link rel="stylesheet" type="text/css" href="customer_test.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    </head>

    <body class="customer_confirm_body">
        

        <div><!-- Start of body content -->
            
            <div class="customer_row">
                
                <div class="customer_col_30">  <!-- left side content-->
                    
                    <div class="customer_confirm_left">
                        
                        <!-- VIP login button -->
                        
                        <a href="customer_vip_login.html"><img class="customer_vip_login_btn" src="../Images/VIP_Logo_login.png"></a>
                    
                        <!-- Back to Menu button -->
                        
                        <div>
                            <a href="customer_menu.php"><img src="../Images/menu_btn_left.png"></a>
                        </div>
                        
                    </div>

                </div>          
                
                
                <div class="customer_confirm_right_bg">
                    
                        <div class="customer_header"><!-- Header -->
                            <img id="switch_lang" class="customer_language" src="../Images/language_icon.png" alt="Change Language">

                        </div>
                    
                    <div class="customer_col_70"> <!-- right side content-->




                        <div class="customer_confirm_order_right">
                            
                            <!-- Load order number here and show drink list-->
                            
                            <p lang="en" class="customer_confirm_order_h1 align_center">Order Confirmation</p>
                            <p lang="ch" class="customer_confirm_order_h1 align_center">確認訂單</p>

                            
                            <div><!-- put row of order here-->
                                
                                    
                                    <hr/>
                                    <!-- One item on the list-->
                                    
                                    <script>
                                        //call function showList() which will query data from database through show_confirm.php
                                        showList();
                                    </script>
                              
                                    <!-- End one item on the list-->
   
                            
                            </div>
                                                     
                            <!-- Show confirm list, a div section to show all -->
                            <div id="show_conform_list"></div>
                            
                            
                            
                            <br>
                            
                            <!-- call customer_pay.php which will insert confirmed order to database and show confirmation screen.

                            Future payment function can be call from the button here-->
    
                            <a lang="en" href="customer_pay.php"><button class="customer_confirm_order_button">Pay
                            </button></a>
                            
                            <a lang="ch" href="customer_pay.php"><button class="customer_confirm_order_button">付錢
                            </button></a>
                            
                            
                            
                           
                        </div>


                    </div>
                
                </div>
                
            </div>


        </div> <!-- End of body content -->
        

        <script>
            showList();
            
            //Function for (+) call minus_add.php
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

            //Function for (-) call minus_add.php
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
            
            //Show drink on the list call show_confirm.php
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
        <script src="language_switch.js"></script>

    </body>

    </html>
