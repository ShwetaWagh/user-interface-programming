<!-- used in customer_menu.php -->
<?php  
        include('connect.php');	
	if(isset($_POST['action'])){  
        
        //get beverage id and amount
	$id=$_POST['id'];
	$quantity=$_POST['quantity'];

        //add id for undo-redo
        $temp_id=0;

        $sq="SELECT * from temp order by id desc limit 1";
        $result = mysqli_query($conn, $sq);
        if($result) { 
            $row = mysqli_fetch_array($result);
            $temp_id=$row['id']+1;
        }
        
        if(!$temp_id) {
                $temp_id=0;
        }



        //inserting temprory drink list (in the order list)
        $sql="INSERT INTO temp () VALUES ('".$temp_id."','".$order_id."','".$id."', '".$quantity."')";
		mysqli_query($conn, $sql);
		
        
	}  
?>  