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
                <img class="bartender_header_icon" src="image/back_icon.png" alt="Back Button"onClick="orderMenuClick()">
                
                <div class="bartender_order_screen_title_box">
                    <p class="screen_title_txt">Order History</p>
                </div>

            </div>

            <div class="bartender_header">
                <img class="bartender_header_icon" src="image/language_icon.png" alt="Change Language">
                <img class="bartender_header_icon" src="image/logout_icon.png">

            </div>
            
        </div>
        
        <!-- body content -->
        
        
        <div>
            <div class="row">
                
                <!-- Left Filter Bar -->
                
                <div class="bartender_column_30">
                    <div class="bartender_left_control_content">
                    
                        <p class="bartender_stock_h2">Filter By</p>
                        <hr/>
                        <p class="bartender_stock_h1">Beverage Type</p>
                        
                    
                        <table class="bartender_stock_table">
                            <tr>
                                <td>Beer</td>
                                <td class="bartender_stock_align_right"><img src="image/checked_icon.png"></td>
                            </tr>
                            
                            <tr>
                                <td>Wine</td>
                                <td class="bartender_stock_align_right"><img src="image/checked_icon.png"></td>
                            </tr>
                            
                            <tr>
                                <td>Other</td>
                                <td class="bartender_stock_align_right"><img src="image/checked_icon.png"></td>
                            </tr>
                                
                        </table>
                        
                        
                        
                    </div>
                
                </div>
                
                <!-- Right Content -->
            
                <div class="bartender_column_70">
                    
                    <div class="bartender_right_content_top">
                        <p class="bartender_stock_h1">Feb 15th to 20th</p>
                    </div>
                    
                     <!-- Right Content Bottom-->
                    
                    <div class="bartender_right_content_bottom bartender_right_scroll">
                        
                        <div class="bartender_order_history_content_table">
                            <table> <!-- Table header-->
                                <tr>
                                    <th class="bartender_order_history_first_column">Time</th>
                                    <th>Order</th>
                                    <th class="bartender_stock_align_right">Price</th>
                                </tr>
                            </table>
                            
                            <hr/>
                            
                            
                            
                            <div><!-- Each item on order history list -->
                                <table class="bartender_history_order_table"> <!-- Order table -->
                                    <tr>
                                        <td class="bartender_order_history_first_column">23:59</td>
                                        <td>D0001</td>
                                        <td class="bartender_stock_align_right">350 kr</td>
                                    </tr>
                                </table>

                                <table class="bartender_history_order_detail_table"> <!-- Order detail table -->
                                    <tr>
                                        <td>Heineken A</td>
                                        <td>3 Bottles</td>
                                        <td class="bartender_stock_align_right">310 kr</td>
                                    </tr>
                                    <tr>
                                        <td>Pear Cider</td>
                                        <td>1 Bottle</td>
                                        <td class="bartender_stock_align_right">40 kr</td>
                                    </tr>

                                </table>

                                <hr/>
                            </div><!-- End Each item on order history list -->
                            

                        </div>
                            
                        

                    </div>
                </div>      
            
            </div>
            
        </div>
        
        <script src="controller/jquery-3.3.1.js"></script>
        <script src="controller/bartender_js.js"></script>
    </body>
</html>