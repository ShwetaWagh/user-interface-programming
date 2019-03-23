<?php
	include('connect.php');

	if(isset($_POST['fetch'])){
        
        //fetch and redo will get and display latest temp order for undo (fetch: 2), will get and display second latest temp order
        
        if($_POST['fetch'] == 2){
            
            //get 2nd latest record, the latest record is the one currently on screen
            $sql="SELECT TOP 1 * from temp_order FROM temp_order WHERE date!=(SELECT TOP 1 * FROM temp_order WHERE date IN (SELECT max(Dates) FROM temp_order)) ORDER BY date DESC"

        }
        
        //else redo, just show latest record
        else{
            
            //get the latest record
            $sql="SELECT TOP 1 * from temp_order FROM temp_order ORDER BY date DESC"

        }

 
		$result=mysqli_query($conn, $sql);
        
        //Check if result is not empty
        if (!empty($result)){
            
           $order=mysqli_fetch_array($result){
               
               //Query list of drink from temporary Order
               
               $sql_get_drink = "SELECT * from temp WHERE O_id='".$order['O_id']."'";
               
               $result_drink=mysqli_query($conn, $sql_get_drink);
               
               if(!empty($result_drink)){
                   
                   while($row=mysqli_fetch_array($result_drink){
                       
                       //Query list of drink name
                       
                        $sql_get_drink_name="select * from beverage where B_id='".$row['b_id']."'";
                        $result_drink_name=mysqli_query($conn, $sql_get_drink_name);
                        $drink_row=mysqli_fetch_array($result_drink_name);
                       
               }
           }    
            
        }
        
			?>

    <tr>
        <td>
            <?php echo $drink_row['b_name'] ?>
        </td>
        <td>
            <?php echo $drink_row['quantity']?>
        </td>
    </tr>
    <?php
		}
	}

?>
