<?php

function load_order_history($order_sql){
    


//reset result string
$result_str = "";



require('db_connection.php');



//get SQL statement from parameter
    $sql = $order_sql;
    //echo $sql;

//echo " assign to $sql"; 

$result = mysqli_query($con, $sql);
    


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        //echo "successfully get result"; 
               
        $result_str = <<<ORDERHISTORY
        
         <div><!-- Each item on order history list -->
            <table class="bartender_history_order_table"> <!-- Order table -->
                <tr>
                    <td class="bartender_order_history_first_column">{$row["time"]}</td>
                    <td>{$row["O_id"]}</td>
                    <td class="bartender_stock_align_right">{$row["total"]} kr</td>
                </tr>
            </table>

            <button lang="en" class="accordion">
                    View Order Detail
            </button>
            
            <button lang="ch" class="accordion">
                    檢視訂單明細
            </button>
                                    
                    <div class="panel">
                        <table class="bartender_stock_drink_detail_table">
     
        
ORDERHISTORY;
            
        
    echo "$result_str";

        $order_id = $row["O_id"];
        
        $drink_sql = "SELECT `Drink list`.O_id,`Drink list`.`B-id`, Beverage.b_name, Beverage.`price(sell)`, `Drink list`.amount From `Drink list` INNER JOIN Beverage ON `Drink list`.`B-id`=Beverage.B_id WHERE O_id =" . $order_id;

        $drink_result = mysqli_query($con, $drink_sql);
        
        if ($drink_result->num_rows > 0) {
        // output data of each row
            while($drink_row = $drink_result->fetch_assoc()) {

            $result_str2 = <<<ORDERHISTORY2
        
                        <tr>
                            <td>{$drink_row["b_name"]}</td>
                                                
                            <td>{$drink_row["amount"]} units</td>
                                                
                            <td class="bartender_stock_align_right">{$drink_row["price(sell)"]} kr</td>

                        </tr>  
     
        
ORDERHISTORY2;
        
            echo "$result_str2";
        
            }
    
    
        } //End of inner loop
        
        
        echo "</table></div></div>";
        
    }
    
    
} 



else{
    echo "0 result";
}

mysqli_close($con);

}

?>