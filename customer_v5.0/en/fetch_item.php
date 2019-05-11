<!-- used in customer_menu.php -->
<?php
	include('connect.php');
	if(isset($_POST['fetch'])){
        $sql="select * from temp";
		$result=mysqli_query($conn, $sql);
        
		while($row=mysqli_fetch_array($result)){
            $sql1="select * from beverage where B_id='".$row['b_id']."'";
            $result1=mysqli_query($conn, $sql1);
            $row1=mysqli_fetch_array($result1);
			?>

    <tr>
        <td>
            <?php echo $row1['b_name'] ?>
        </td>
        <td>
            <?php echo $row['quantity']?>
        </td>
    </tr>
    <?php
		}
	}
?>