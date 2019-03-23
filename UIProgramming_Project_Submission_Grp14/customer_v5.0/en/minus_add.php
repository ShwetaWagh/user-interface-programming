<?php
	include('connect.php');	
    if(isset($_POST['action'])){  
        $n = $_POST['n'] ;
        $id = $_POST['id'] ;
        if($n==0) $n=1;
        
        $sql="UPDATE `temp` SET `quantity`=".$n." WHERE b_id=".$id;
        mysqli_query($conn, $sql);
    };
?>
