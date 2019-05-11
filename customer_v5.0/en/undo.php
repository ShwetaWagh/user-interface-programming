<?php
include('connect.php');	
if(isset($_POST['action'])){

	$sq="SELECT * from temp order by id desc limit 1";
    $result = mysqli_query($conn, $sq);
    if($result) { 
        $row = mysqli_fetch_array($result);
        $id=$row['id'];
        $o_id=$row['o_id'];
        $b_id=$row['b_id'];
        $quantity=$row['quantity'];
        //for redo 
    	//$sql="INSERT INTO temp_unre VALUES ('".$id."','".$o_id."','".$b_id."', '".$quantity."')";
		//mysqli_query($conn, $sql);
		$sql="DELETE from temp where id='".$id."'";
		mysqli_query($conn, $sql);
    }
}

?>