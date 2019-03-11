

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
                
                <div class="screen_title_box">
                    <p class="screen_title_txt">Stock List</p>
                </div>

            </div>

            <div class="bartender_header">
                <img class="bartender_header_icon" src="image/language_icon.png" alt="Change Language">
                <img class="bartender_header_icon" src="image/logout_icon.png" onClick="logoutClick()">

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
                        
                        
                        <form action="" method="get">

                        <p class="bartender_stock_h1">Beverage Type</p>
                        
                    
                        <table class="bartender_stock_table">
                            <tr>
                                <td>Beer</td>
                                <td class="bartender_stock_align_right">
                                    <input type="checkbox" name="drink_type[]" value="beer"></td>
                            </tr>
                            
                            <tr>
                                <td>Wine</td>
                                <td class="bartender_stock_align_right">        <input type="checkbox" name="drink_type[]" value="wine"></td>
                            </tr>
                            
                            <tr>
                                <td>Other</td>
                                <td class="bartender_stock_align_right"><input type="checkbox" name="drink_type[]" value="other"></td>
                            </tr>
                                
                        </table>
                        
                        <div class="bartender_stock_table_space"></div>
    
                        <p class="bartender_stock_h1">Availability</p>
                        
                        <table class="bartender_stock_table">
                            <tr>
                                <td>In-Stock</td>
                                <td class="bartender_stock_align_right"><input type="checkbox" name="drink_type[]" value="in_stock"></td>
                            </tr>
                            
                            <tr>
                                <td>Out-Of-Stock</td>
                                <td class="bartender_stock_align_right"><input type="checkbox" name="drink_type[]" value="out_stock"></td>
                            </tr>
                            
                        </table>
                            
                            <input type="submit" class="bartender_filter_btn" name="submit" value="Filter Result">
                        
                        <!-- Prepare SQL statement for filter -->
                        <?php
                            
                            //SELECT * FROM Beverage WHERE C_id = 7....
                            $stock_sql = "SELECT * FROM Beverage";
                            $filter_sql = "";
                            $result = $stock_sql;
                            
                            if( isset($_GET['submit']) && in_array)
                            {
                                //be sure to validate and clean your variables
                                //$result = htmlentities($_GET['val1']);
                                //$result = myFunction($val1);
                                //$val2 = htmlentities($_GET['val2']);

                                //then you can use them in a PHP function. 
                                
                                if(!empty($_GET['drink_type'])){
                                    
                                    //echo 'console.log("check is not empty")';
                                    
                                    
                                    if(in_array("beer", $_GET['drink_type'])){
                                        
                                        //C_id = 7    
                                        //echo 'Beer was checked!';
                                        
                                        $filter_sql .= " C_id = 7";
                                        
                                    }

                                    if(in_array("wine", $_GET['drink_type'])){
                                        
                                        //C_id = 8   
                                        //echo 'Wine was checked!';
                                        
                                        if (empty($filter_sql)){
                                            $filter_sql .= " C_id = 8";
                                        }
                                        else{
                                            $filter_sql .= " OR C_id = 8";
                                        }
                                    }
                                    
                                    if(in_array("other", $_GET['drink_type'])){
                                        
                                        //C_id = 1, 2, 3, 4, 5, 6   
                                        //echo 'other was checked!';
                                        
                                        if (empty($filter_sql)){
                                            $filter_sql .= " C_id BETWEEN 1 AND 6";
                                        }
                                        else{
                                            $filter_sql .= " OR C_id BETWEEN 1 AND 6";
                                        }
                                    }
                                    
                                    if(in_array("in_stock", $_GET['drink_type'])){
                                        
                                        //storage > 0  
                                        //echo 'in_stock was checked!';
                                        
                                        if (empty($filter_sql)){
                                            $filter_sql .= " storage > 0";
                                        }
                                        else{
                                            $filter_sql .= " OR storage > 0";
                                        }
                                    }
                                    
                                    if(in_array("out_stock", $_GET['drink_type'])){
                                        
                                        //storage = '0'  
                                        //echo 'out_stock was checked!';
                                        
                                        if (empty($filter_sql)){
                                            $filter_sql .= " storage = 0 OR storage IS NULL";
                                        }
                                        else{
                                            $filter_sql .= " OR storage = 0 OR storage IS NULL";
                                        }
                                    }
                                        
                                }
                                
                                        //Add "WHERE" if have any filter ($filter_sql)
                                
                                        if (empty($filter_sql)){
                                        
                                        }
                                        else{
                                            $stock_sql .= " WHERE";
                                            $stock_sql .= $filter_sql;
                                        }  
                                //Set private $result value to desired SQL
                                $result = $stock_sql;
                                //echo $result;

                            }
                            ?>

                        </form>
                        
                    </div>
                
                </div>
                
                <!-- Right Content -->
            
                <div class="bartender_column_70">
                    
                    <div class="bartender_right_content_top">
                        <p class="bartender_stock_h1">Stock List</p>
                    </div>
                    
                     <!-- Right Content Bottom-->
                    
                    <div class="bartender_right_content_bottom bartender_right_scroll">
                    
                                <table class="bartender_stock_table">
                                    <tr>

                                        <td>Drink Name</td>
                                        <td class="bartender_stock_header_width">Stock</td>

                                    </tr>
                                    
                                </table>
 
                        <!-- Each stock item in the list
                        
                            <div class="row bertender_stock_list">
                                
                                <div class="bartender_column_70">
                                    
                                    
                                    
                                    
                                    <button class="accordion">
                                        
                                        <tr>
                                            <td>12</td>
                                            
                                            <td>Barley Craft Beer</td>

                                        </tr>
                                    
                                    </button>
                                    
                                        <div class="panel">
                                           <table class="bartender_stock_drink_detail_table">
                                            
                                            <tr>
                                                <td>Producer</td>
                                                <td class="bartender_stock_align_right">System B</td>

                                            </tr>  
                                               
                                            <tr>
                                                <td>Buying Price (kr)</td>
                                                <td class="bartender_stock_align_right">120 kr</td>

                                            </tr>
                                            <tr>
                                                <td>Selling Price (kr)</td>
                                                <td class="bartender_stock_align_right">320 kr</td>

                                            </tr>
                                    </table>
                                            
                                        </div>
                                    

                                    
                                </div> 


                                <div class="bartender_column_30">

                                    <div class="bartender_stock_align_center">

                                        <div class="row">
                                        
                                            <div class="bartender_column_30" id="bartender_stock_amount">15</div>
                                            
                                            <div class="bartender_column_70">
                                            
                                                <button class="bartender_restock_btn">Restock</button>
                                            </div>

                                        </div>
                                        
                                    </div>
                            </div>         
                        </div>End of stock list -->
                        
                        <!-- Call load function in controller/load_stock.php -->
                        <?php 
                        
                            include ('controller/load_stock.php');
                        
                            load_stock_item($result);
                        
                            //$result_str = load_stock_item($result);
                        
                            //if( isset($result_str) ) echo $result_str;
                        ?>

                    </div>
                </div>      
            
            </div>
            
        </div>
        
        
        <script src="controller/jquery-3.3.1.js"></script>
        <script src="controller/bartender_js.js"></script>
        
        
    </body>
</html>


<?php
    unset($result);
?>