

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Bartender Login</title>
        
        <!-- load custom style sheet -->
        <link rel="stylesheet" type="text/css" href="bartender.css">
        

    
    </head>
    
    <body class="bartender_body">
        
        
        <!-- header including home button, screen title, switch language, and logout-->
        <div class="row"> 
                <div class="bartender_header_left">
                <img class="bartender_header_icon" src="image/home_icon.png" alt="Home Button" onClick="homeClick()">
                
                <div class="screen_title_box">
                    <p lang="en" class="screen_title_txt">Stock List</p>
                    <p lang="ch" class="screen_title_txt">庫存清單</p>
                </div>

            </div>

            <div class="bartender_header">
                <img id="switch_lang" class="bartender_header_icon" src="image/language_icon.png" alt="Change Language">
                <img class="bartender_header_icon" src="image/logout_icon.png" onClick="logoutClick()">

            </div>
            
        </div>  <!--end of header-->
        
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

                        <p lang="en" class="bartender_stock_h1">Beverage Type</p>
                        <p lang="ch" class="bartender_stock_h1">飲料類別</p>
                        
                    
                        <table class="bartender_stock_table">
                            <tr>
                                <td lang="en">Beer</td>
                                <td lang="ch">啤酒</td>
                                <td class="bartender_stock_align_right">
                                    <input type="checkbox" name="drink_type[]" value="beer"></td>
                            </tr>
                            
                            <tr>
                                <td lang="en">Wine</td>
                                <td lang="ch">葡萄酒</td>
                                <td class="bartender_stock_align_right">        <input type="checkbox" name="drink_type[]" value="wine"></td>
                            </tr>
                            
                            <tr>
                                <td lang="en">Other</td>
                                <td lang="ch">其他</td>
                                
                                <td class="bartender_stock_align_right"><input type="checkbox" name="drink_type[]" value="other"></td>
                            </tr>
                                
                        </table>
                        
                        <div class="bartender_stock_table_space"></div>
    
                            <p lang="en" class="bartender_stock_h1">Availability</p>
                            <p lang="ch" class="bartender_stock_h1">可供應</p>
                        
                        <table class="bartender_stock_table">
                            <tr>
                                <td lang="en">In-Stock</td>
                                <td lang="ch">有現貨</td>
                                <td class="bartender_stock_align_right"><input type="checkbox" name="drink_type[]" value="in_stock"></td>
                            </tr>
                            
                            <tr>
                                <td lang="en">Out-Of-Stock</td>
                                <td lang="ch">缺貨</td>
                                <td class="bartender_stock_align_right"><input type="checkbox" name="drink_type[]" value="out_stock"></td>
                            </tr>
                            
                        </table>
                            
                            <input lang="en" type="submit" class="bartender_filter_btn" name="submit" value="Filter Result">
                            
                            <input lang="ch" type="submit" class="bartender_filter_btn" name="submit" value="搜尋結果">
                        
                        <!-- Prepare SQL statement form filter -->
                        <?php
                            
                            //default main query
                            $stock_sql = "SELECT * FROM Beverage";
                            //customizable filter query
                            $filter_sql = "";
                            $result = $stock_sql;
                            
                            //check preference in checkbox array
                            if( isset($_GET['submit']) && in_array)
                            {
                                //validate for any filter checked
                                if(!empty($_GET['drink_type'])){
                                    
                                    
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
                                            //if no filter checked, diaply every beverage in stock. No change to mail query
                                        }
                                        else{
                                            $stock_sql .= " WHERE";
                                            $stock_sql .= $filter_sql;
                                        }  
                                
                                //Set $result value to desired SQL
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
                        <p lang="en" class="bartender_stock_h1">Stock List</p>
                        <p lang="ch" class="bartender_stock_h1">庫存清單</p>
                    </div>
                    
                     <!-- Right Content Bottom-->
                    
                    <div class="bartender_right_content_bottom bartender_right_scroll">
                    
                                <!--table header-->
                                <table class="bartender_stock_table">
                                    <tr>

                                        <td lang="en">Drink Name</td>
                                        <td lang="ch">飲料名稱</td>
                                        <td lang="en" class="bartender_stock_header_width">Stock</td>
                                        
                                        <td lang="ch" class="bartender_stock_header_width">庫存清單</td>

                                    </tr>
                                    
                                </table> <!--end table header-->
 
   
                        <!-- Each stock item in the list will be displayed here -->

                        <!-- Call load function in controller/load_stock.php -->
                        <?php 
                        
                            include ('controller/load_stock.php');
                            
                            //pass in customized sql query from filter to function load_stock_item() in load_stock.php
                        
                            load_stock_item($result);

                        ?>

                    </div>
                </div>      
            
            </div>
            
        </div>
        
        
        <script src="controller/jquery-3.3.1.js"></script>
        <script src="controller/bartender_js.js"></script>
        
        
    </body>
</html>


<!--clear $result variable-->
<?php
    unset($result);
?>