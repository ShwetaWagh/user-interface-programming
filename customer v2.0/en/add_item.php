<?php  
	include('connect.php');	
	if(isset($_POST['action'])){  
		$id=$_POST['id'];
		$quantity=$_POST['quantity'];
		
        $sql="INSERT INTO temp () VALUES ('".$id."', '".$quantity."')";
		mysqli_query($conn, $sql);
		
	}  
?>  