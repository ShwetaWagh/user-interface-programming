<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>Bartender Login</title>
        
        <!-- load custom style sheet -->
        <link rel="stylesheet" type="text/css" href="bartender.css">
    
    </head>
    
    <body class="bartender_body">
        
        
        <div class="row">
            <div class="bartender_header_left">
                <img class="bartender_header_icon" src="image/home_icon.png" alt="Home Button" onClick="homeClick()">
                
                <div class="bartender_order_screen_title_box">
                    <p class="screen_title_txt">Order List</p>
                </div>

            </div>

            <div class="bartender_header">
                <img class="bartender_header_icon" src="image/language_icon.png" alt="Change Language">
                <img class="bartender_header_icon" src="image/logout_icon.png">

            </div>
            
        </div>
        
        <!-- body content -->
        
        
            
            <div class = "center bartender_order_wrapper">
            
                <table class="bartender_order_table">
                    <tr class="bartender_order_table_header">
                        <th class="bartender_order_table_first_column"></th>
                        <th>Order ID</th>
                        <th class="bartender_order_table_big_column">Beverage</th>
                        <th>Quantity</th>
                        <th>Note</th>
                        <th></th>
                    
                    <!-- Each item on the list -->   
                        
                    </tr>
                    
                    <tr class="bartender_order_table_header">
                        <td><img src="image/edit_icon.png"></td>
                        <td>D0123</td>
                        <td>Barley Craft Beer 2XXL Imported</td>
                        <td>1 Bottle</td>
                        <td>With Ice</td>
                        <td class="bartender_order_table_no_line_column"><button class="bartender_restock_btn">Serve</button></td>
                    </tr>
                    
                    <tr class="bartender_order_table_header">
                        <td><img src="image/edit_icon.png"></td>
                        <td>D0123</td>
                        <td>Barley Craft Beer 2XXL Imported</td>
                        <td>1 Bottle</td>
                        <td>With Ice</td>
                        <td class="bartender_order_table_no_line_column"><button class="bartender_restock_btn">Serve</button></td>
                    </tr>
        
                </table>
            
            
            </div>
        
            <div class="vertical_align bartender_order_history_button">
                <p><img class="vertical_align_fix" src="image/history_icon.png" onClick="orderHistoryClick()"> View Order History</p>
        
            </div>
        
        <script src="controller/jquery-3.3.1.js"></script>
        <script src="controller/bartender_js.js"></script>
        
    </body>
</html>