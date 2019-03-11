<?php


function load_order_item(){
    
    
require('db_connection.php');

//Query all stock (at screen load)
//$sql = "SELECT B_id, b_name, storage, price(sell), cost, provider FROM Beverage";

//get SQL statement from parameter
    $sql = "SELECT `Drink list`.O_id,`Drink list`.`B-id`, Beverage.b_name, Beverage.`price(sell)` From `Drink list` INNER JOIN Beverage ON `Drink list`.`B-id`=Beverage.B_id 
WHERE O_id = 3";
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
        
        $result_str = <<<ORDER
        
         <tr class="bartender_order_table_header">
            <td><img class="bartender_order_edit_img" src="image/edit_icon.png"></td>
            <td>{$row["O_id"]}</td>
            <td>{$row["b_name"]}</td>
            <td>1 Bottle</td>
            <td></td>
                <td class="bartender_order_table_no_line_column"><button class="bartender_restock_btn">Serve</button></td>
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