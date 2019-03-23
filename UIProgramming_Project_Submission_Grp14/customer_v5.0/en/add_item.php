<?php  
	include('connect.php');	
	if(isset($_POST['action'])){  
        
        //get beverage id and amount
		$id=$_POST['id'];
		$quantity=$_POST['quantity'];
		
        //finding incrementation for temporaru order_id, count number of record and + 1
        $result = mysqli_query("SELECT COUNT(*) AS 'total' FROM temp_order");
        $data=mysqli_fetch_assoc($result);
        $order_id = $data['total'] + 1;

      
        //inserting temporary order list
        $sql="INSERT INTO temp_order VALUES ('".$id."', now())";
        //inserting temprory drink list (in the order list)
        $sql="INSERT INTO temp () VALUES ('".$order_id."','".$id."', '".$quantity."')";
		mysqli_query($conn, $sql);
		
        
	}  
?>  