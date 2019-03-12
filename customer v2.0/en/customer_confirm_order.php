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

    <body class="customer_confirm_body">
        

        <div><!-- Start of body content -->
            
            <div class="customer_row">
                
                <div class="customer_col_30">  <!-- left side content-->
                    
                    <div class="customer_confirm_left">
                        
                        <a href="customer_vip_login.html"><img class="customer_vip_login_btn" src="../Images/VIP_Logo_login.png"></a>
                    
                    
                        <div>
                            <a href="customer_menu.php"><img src="../Images/menu_btn_left.png"></a>
                        </div>
                        
                    </div>

                </div>          
                
                
                <div class="customer_confirm_right_bg">
                    
                        <div class="customer_header"><!-- Header -->
                            <img class="customer_language" src="../Images/language_icon.png" alt="Change Language">

                        </div>
                    
                    <div class="customer_col_70"> <!-- right side content-->




                        <div class="customer_confirm_order_right">
                            
                            <p class="customer_confirm_order_h1 align_center">Order Confirmation : Order number xxxxx</p>

                            
                            <div><!-- put row of order here-->
                                <table class="customer_confirm_order_list vertical_align">
                                    
                                    <hr/>
                                    <!-- One item on the list-->
                                    <tr>
                                        <td>1. xxx xxxxx ##</td>
                                        
                                        <td class="align_center"><img src="../Images/minus_icon.png"></td>
                                        
                                        <td class="align_center">1</td> 
                                        
                                        <td class="align_center"><img src="../Images/plus_icon.png">
                                        </td>
                                        
                                        <td class="align_right">75.00 kr</td>
                                    
                                    </tr>
                              
                                    <!-- End one item on the list-->
                                
                                
                                </table>
                            
                            
                            
                            </div>
                            

                            

                            <div id="show_conform_list"></div>
                            
                            
                            
                            <br>
                            
                            
                            <button class="customer_confirm_order_button" action="customer_pay.php">Pay
                            </button>
                           
                        </div>


                    </div>
                
                </div>
                
            </div>


        </div> <!-- End of body content -->
        

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
