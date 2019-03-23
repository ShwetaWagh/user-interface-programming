<?php

function load_stock_item($result_sql){
    


//reset result string
$result_str = "";



require('db_connection.php');

//Query all stock (at screen load)

//get SQL statement from parameter
    $sql = $result_sql;

$result = mysqli_query($con, $sql);


//check if result is more than 0 record
    
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        //display chunk of escape HTML string using heredoc
        $result_str = <<<STOCK
        
        <div class="row bertender_stock_list">
        
            <div class="bartender_column_70">
            
                <!--exandable button for each drink in the list-->
                
                <button class="accordion">                
                    <tr>
                        <td>{$row["B_id"]}</td>                
                        <td>{$row["b_name"]}</td>
                    </tr>               
                </button>                        
                    <div class="panel">
                        <table class="bartender_stock_drink_detail_table">
                                            
                        <tr>
                            <td lang="en">Package</td>
                            <td lang="ch">包裝</td>
                            <td class="bartender_stock_align_right">{$row["package"]}</td>

                        </tr>
                        
                        <tr>
                            <td lang="en">Producer</td>
                            <td lang="ch">製造商</td>
                            <td class="bartender_stock_align_right">{$row["producer"]}</td>

                        </tr>  
                        
                        <tr>
                            <td lang="en">Provider</td>
                            <td lang="ch">供應商</td>
                            <td class="bartender_stock_align_right">{$row["provider"]}</td>

                        </tr>
                                               
                        <tr>
                            <td lang="en">Buying Price (kr)</td>
                            <td lang="ch">成本 (kr)</td>
                            <td class="bartender_stock_align_right">{$row["cost"]} kr</td>

                        </tr>
                        <tr>
                            <td lang="en">Selling Price (kr)</td>
                            <td lang="ch">價錢 (kr)</td>
                            <td class="bartender_stock_align_right">{$row["price(sell)"]}</td>

                        </tr>
                </table>
                                            
                    </div>  <!-- End of panel-->
                    
                    
                </div> <!-- End of stock content column-->
                                    
                                    
           <div class="bartender_column_30">

                <div class="bartender_stock_align_center">

                    <div class="row">
                                        
                        <div class="bartender_column_30" id="bartender_stock_amount">{$row["storage"]}</div>
                                            
                        <div class="bartender_column_70">
                                            
                            <button lang="en" class="bartender_restock_btn">Restock</button>
                            <button lang="ch" class="bartender_restock_btn">進貨</button>
                        </div>

                    </div>
                                        
                </div>
                
            </div>                           
                                    
                                    
        </div> <!-- End of stock list-->
        
        
        
STOCK;
  
     echo "$result_str";   
        
    }
    
    
} 



else{
    echo "0 result";
}

mysqli_close($con);

}
?>