<?php

include('load_stock.php');

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>Bartender Login</title>
        
        <!-- load custom style sheet -->
        <link rel="stylesheet" type="text/css" href="bartender.css">
        
        <script src="controller/jquery-3.3.1.js"></script>
    
    </head>
    
    <body class="bartender_body">
        
        
        <div class="row">
            <div class="bartender_header_left">
                <img class="bartender_header_icon" src="image/home_icon.png" alt="Change Language">
                
                <div class="screen_title_box">
                    <p class="screen_title_txt">Stock List</p>
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
                        
                        <div class="bartender_stock_table_space"></div>
    
                        <p class="bartender_stock_h1">Availability</p>
                        
                        <table class="bartender_stock_table">
                            <tr>
                                <td>In-Stock</td>
                                <td class="bartender_stock_align_right"><img src="image/checked_icon.png"></td>
                            </tr>
                            
                            <tr>
                                <td>Out-Of-Stock</td>
                                <td class="bartender_stock_align_right"><img src="image/checked_icon.png"></td>
                            </tr>
                            
                        </table>
                        
                    </div>
                
                </div>
                
                <!-- Right Content -->
            
                <div class="bartender_column_70">
                    
                    <div class="bartender_right_content_top">
                        <p class="bartender_stock_h1">All In-Stock</p>
                    </div>
                    
                     <!-- Right Content Bottom-->
                    
                    <div class="bartender_right_content_bottom bartender_right_scroll">
                        
                        <div class="row">
                            
                            
                            <div class="bartender_column_70">
                        
                                <table class="bartender_stock_table">
                                    <tr>
                                        <td>#</td>
                                        <td>Drink Name</td>
                                        <td class="bartender_stock_align_right">Stock</td>

                                    </tr>
                                </table>

                                <hr/>

                                
                            </div>   
                            
                            <div class="bartender_column_30">
                            
                                <!-- Empty Place holder-->
                            
                            </div>
                        </div>
                            
                        
                        
                        <!-- Each stock item in the list-->
                        
                            <div class="row bertender_stock_list">
                                
                                <div class="bartender_column_70">
                                    <table class="bartender_stock_table">
                                        <tr>
                                            <td>1</td>
                                            <td>Barley Craft Beer</td>
                                            <td class="bartender_stock_align_right">15</td>

                                        </tr>

                                    </table>

                                    <table class="bartender_stock_drink_detail_table">
                                            <tr class="bartender_stock_drink_detail_table_row">
                                                <td>Buying Price (kr)</td>
                                                <td class="bartender_stock_align_right">120 kr</td>

                                            </tr>
                                            <tr>
                                                <td>Settling Price (kr)</td>
                                                <td class="bartender_stock_align_right">320 kr</td>

                                            </tr>
                                    </table>
                                    
                                    <div class="bartender_stock_table_space"></div>

                                    <hr/>
                                    
                                </div> <!-- End of stock content column-->


                                <div class="bartender_column_30">

                                    <div class="bartender_stock_align_center">

                                        <button class="bartender_restock_btn">Restock</button>

                                    </div>


                            </div>
                                
                                
                        </div><!-- End of stock list -->

                    </div>
                </div>      
            
            </div>
            
        </div>
    </body>
</html>