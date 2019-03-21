<?php


function load_order_item(){
    
    
require('db_connection.php');



//get SQL statement from parameter
    $sql = "SELECT `Drink list`.O_id,`Drink list`.`B-id`, Beverage.b_name, Beverage.`price(sell)` From `Drink list` INNER JOIN Beverage ON `Drink list`.`B-id`=Beverage.B_id 
WHERE O_id = 3";


$result = mysqli_query($con, $sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        //user heredoc to display chunk of HTML
        $result_str = <<<ORDER
        
         <tr class="bartender_order_table_header">
            <td><img class="bartender_order_edit_img" src="image/edit_icon.png"></td>
            <td>{$row["O_id"]}</td>
            <td>{$row["b_name"]}</td>
            <td>1 Bottle</td>
            <td></td>
                <td class="bartender_order_table_no_line_column">
                <button lang="en" class="bartender_restock_btn">Serve</button>
                <button lang="ch" class="bartender_restock_btn">已供應</button>
                </td>
        </tr>
     
        
ORDER;
  
     echo "$result_str";   
        
    }
    
    
} 



else{
    echo "0 result";
}

mysqli_close($con);

}
?>