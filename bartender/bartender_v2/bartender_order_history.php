<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Bartender Login</title>
        
        <!-- load custom style sheet -->x
        <link rel="stylesheet" type="text/css" href="bartender.css">
    
    </head>
    
    <body class="bartender_body">
        
        
        <div class="row">
            <div class="bartender_header_left">
                <img class="bartender_header_icon" src="image/back_icon.png" alt="Back Button"onClick="orderMenuClick()">
                
                <div class="bartender_order_screen_title_box">
                    <p lang="en" class="screen_title_txt">Order History</p>
                    <p lang="ch" class="screen_title_txt">歷史定單</p>
                    
                </div>

            </div>

            <div class="bartender_header">
                <img id="switch_lang" class="bartender_header_icon" src="image/language_icon.png" alt="Change Language">
                <img class="bartender_header_icon" src="image/logout_icon.png"onClick="logoutClick()">

            </div>
            
        </div>
        
        <!-- body content -->
        
        
        <div>
            <div class="row">
                
                <!-- Left Filter Bar -->
                
                <div class="bartender_column_30">
                    <div class="bartender_left_control_content">
                    
                        <p lang="en" class="bartender_stock_h2">Filter By</p>
                        <p lang="ch" class="bartender_stock_h2">搜尋</p>
                        
                        <hr/>
                        
                        <form action="" method="get">
                            
                            <p lang="en" class="bartender_stock_h1">Date</p>
                            <p lang="ch" class="bartender_stock_h1">日期</p>

                            <p lang="en">From</p>
                            <p lang="ch">從</p>
                            
                            <br>

                            <input type="date" name="start_date">
                            
                            <br><br><br>
                            
                            <p lang="en">To</p>
                            <p lang="ch">到</p>
                            
                            <br>
                            <input type="date" name="end_date" >

                            <br><br>
                            <input lang="en" type="submit" class="bartender_filter_btn" name="submit" value="Filter Result">
                            
                            <input lang="ch" type="submit" class="bartender_filter_btn" name="submit" value="搜尋結果">
                        
                            
                            <!-- Prepare SQL statement for filter -->
                        <?php
                            
                            $order_sql = "";
                            
                            $from_date = "";
                            $to_date = "";
                            
                            $from_date = $_GET['start_date'];
                            $to_date = $_GET['end_date'];
                            
                            //check if from and to date has been selected
                            
                            if (!empty($from_date) && !empty($to_date)){
                                
                                $order_sql = "SELECT * FROM `Order list` WHERE served = 'yes' AND time BETWEEN '" . $from_date ." 00:00:00' AND '" . $to_date . " 00:00:00'";
                                
                                //echo $order_sql;
                                
                            }
                            
                            else{
                                $order_sql = "SELECT * FROM `Order list` WHERE served = 'yes'";
                                
                                //echo $order_sql;
                            }
                        
                            
                            ?>
                        </form>   
                    </div>
                
                </div>
                
                <!-- Right Content -->
            
                <div class="bartender_column_70">
                    
                    <div class="bartender_right_content_top">
                        <p class="bartender_stock_h1"> 
                            
                            <!-- Print filter criteria -->
                            
                            <?php
                            
                            
                           
                                $from_date = $_GET['start_date'];
                                $to_date = $_GET['end_date'];
                            
                            
                                if (!empty($from_date) && !empty($to_date)){

                                    echo "From " . $from_date . " ";
                                    echo "To " . $to_date;

                                }

                                else{

                                    echo "All";
                                }

                              
                            
                            ?>
                            
                            
                        </p>
                        

                    </div>
                    
                     <!-- Right Content Bottom-->
                    
                    <div class="bartender_right_content_bottom bartender_right_scroll">
                        
                        <div class="bartender_order_history_content_table">
                            <table> <!-- Table header-->
                                <tr>
                                    <th lang="en" class="bartender_order_history_first_column">Time</th>
                                    
                                    <th lang="ch" class="bartender_order_history_first_column">時間</th>
                                    
                                    <th lang="en">Order</th>
                                    <th lang="ch">訂單</th>
                                    <th lang="en" class="bartender_stock_align_right">Price</th>
                                    <th lang="ch" class="bartender_stock_align_right">金額</th>
                                </tr>
                            </table>
                            
                            <hr/>
                            
                            
                            <!--
                            <div><!-- Each item on order history list 
                                <table class="bartender_history_order_table"> 
                                    <tr>
                                        <td class="bartender_order_history_first_column">23:59</td>
                                        <td>D0001</td>
                                        <td class="bartender_stock_align_right">350 kr</td>
                                    </tr>
                                </table>

                                <button class="accordion">
                                        View Order Detail
                                    </button>
                                    
                                        <div class="panel">
                                           <table class="bartender_stock_drink_detail_table">
                                            
                                            <tr>
                                                <td>Heineken A</td>
                                                
                                                <td>3 units</td>
                                                
                                                <td class="bartender_stock_align_right">340 kr</td>

                                            </tr>  
                                               
                                            <tr>
                                                <td>Beer 2 Asahi</td>
                                                
                                                <td>3 units</td>
                                                
                                                <td class="bartender_stock_align_right">120 kr</td>

                                            </tr>

                                        </table>
                                            
                                    </div>
                            
                                <hr/>
                            </div>End Each item on order history list -->
                            
                            <!-- Call load function in controller/load_order_history.php -->
      
                            
                        <?php 
                            include ('controller/load_order_history.php');
                        
                            load_order_history($order_sql);
                        
                            //$result_str = load_stock_item($result);
                        
                            //if( isset($result_str) ) echo $result_str;
                        ?>

                        </div>
                            
                        

                    </div>
                </div>      
            
            </div>
            
        </div>
        
        
        <script src="controller/jquery-3.3.1.js"></script>
        <script src="controller/bartender_js.js"></script>
    </body>
</html>

<?php
    unset($order_sql);
?>