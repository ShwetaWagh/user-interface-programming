<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Bartender Login</title>
        
        <!-- load custom style sheet -->
        <link rel="stylesheet" type="text/css" href="bartender.css">
    
    </head>
    
    <body class="bartender_body">
        
        <!--page header-->
        <div class="row">
            <div class="bartender_header_left">
                <img class="bartender_header_icon" src="image/home_icon.png" alt="Home Button" onClick="homeClick()">
                
                <div class="bartender_order_screen_title_box">
                    <p lang="en" class="screen_title_txt">Order List</p>
                    <p lang="ch" class="screen_title_txt">訂單清單</p>
                    
                </div>

            </div>

            <div class="bartender_header">
                <img id="switch_lang" class="bartender_header_icon" src="image/language_icon.png" alt="Change Language">
                <img class="bartender_header_icon" src="image/logout_icon.png"onClick="logoutClick()">

            </div>
            
        </div> <!--end of page header-->
        
        <!-- body content -->
        
        
            <!--order list table-->
            <div class = "center bartender_order_wrapper"> 
            
                <table class="bartender_order_table">
                    
                    <!--table header-->
                    <tr class="bartender_order_table_header">
                        <th class="bartender_order_table_first_column"></th>
                        <th lang="en">Order ID</th>
                        <th lang="ch">訂單編號</th>
                        <th lang="en" class="bartender_order_table_big_column">Beverage</th>
                        <th lang="ch" class="bartender_order_table_big_column">飲料類別</th>
                        <th lang="en">Quantity</th>
                        <th lang="ch">數量</th>
                        <th lang="en">Note</th>
                        <th lang="ch">註記</th>
                        <th></th>
                        
                        
                     </tr> <!--end of table header-->
                    
                    <!-- Each item on the list -->   
                        
                   
                    <!--sample item for testing-->
                    <tr class="bartender_order_table_header">
                        <td><img class="bartender_order_edit_img"src="image/edit_icon.png"></td>
                        <td>D0123</td>
                        <td>Barley Craft Beer 2XXL Imported</td>
                        <td>1 Bottle</td>
                        <td>With Ice</td>
                        
                        <td class="bartender_order_table_no_line_column">
                            
                            <!--insert action to button for future serve action-->
                            <button lang="en" class="bartender_restock_btn">Serve</button>
                            <button lang="ch" class="bartender_restock_btn">已供應</button>             
                        </td>
                    </tr> <!--end sample item-->
                    
                    <!-- Call load function in controller/load_order.php -->
                        <?php 
                        
                            include ('controller/load_order.php');
                        
                            load_order_item();
                        
                        ?>
        
                </table>
            
            
            </div><!--end order list table-->
        
        
            <div class="vertical_align bartender_order_history_button">
                <p lang="en"><img class="vertical_align_fix" src="image/history_icon.png" onClick="orderHistoryClick()"> View Order History</p>
                
                <p lang="ch"><img class="vertical_align_fix" src="image/history_icon.png" onClick="orderHistoryClick()"> 檢視歷史訂單</p>
        
            </div>
        
        <script src="controller/jquery-3.3.1.js"></script>
        <script src="controller/bartender_js.js"></script>
        
    </body>
</html>