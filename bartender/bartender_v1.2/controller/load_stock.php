<?php

function load_stock_item($result_sql){
    


//reset result string
$result_str = "";



require('db_connection.php');

//Query all stock (at screen load)
//$sql = "SELECT B_id, b_name, storage, price(sell), cost, provider FROM Beverage";

//get SQL statement from parameter
    $sql = $result_sql;
    //echo "$sql";

//echo " assign to $sql"; 

$result = mysqli_query($con, $sql);

//echo " show something"; 

/*if (mysqli_num_rows($result)>0){
    
    echo " it is more than 0 <br>"; 
    
    while($row = mysqli_fetch_assoc($result)) {
        
        echo "B_id: " . $row["B_id"]. " b_name: " . $row["b_name"]. " storage " . $row["storage"]. " price " . $row["price(sell)"]."<br>";
        
        //populating list using Heredoc

        
}

*/

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $result_str = <<<STOCK
        
        <div class="row bertender_stock_list">
        
            <div class="bartender_column_70">
                <button class="accordion">                
                    <tr>
                        <td>{$row["B_id"]}</td>                
                        <td>{$row["b_name"]}</td>
                    </tr>               
                </button>                        
                    <div class="panel">
                        <table class="bartender_stock_drink_detail_table">
                                            
                        <tr>
                            <td>Package</td>
                            <td class="bartender_stock_align_right">{$row["package"]}</td>

                        </tr>
                        
                        <tr>
                            <td>Producer</td>
                            <td class="bartender_stock_align_right">{$row["producer"]}</td>

                        </tr>  
                        
                        <tr>
                            <td>Provider</td>
                            <td class="bartender_stock_align_right">{$row["provider"]}</td>

                        </tr>
                                               
                        <tr>
                            <td>Buying Price (kr)</td>
                            <td class="bartender_stock_align_right">{$row["cost"]} kr</td>

                        </tr>
                        <tr>
                            <td>Selling Price (kr)</td>
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
                                            
                            <button class="bartender_restock_btn">Restock</button>
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