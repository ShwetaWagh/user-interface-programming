<?php
	include('connect.php');



    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql="select * from `vip` where email='".$email."' and VIP_pwd='".$password."'";

    echo $sql;

    $result=mysqli_query($conn, $sql);
    
    //count number of data found
    $data_nums = mysqli_num_rows ($result);

    echo $data_nums;

    if($data_nums==1) {
        $row=mysqli_fetch_array($result);
        $id=$row['VIP_id'];
        echo "Login success";
        $text="Location: http://localhost:8888/customer_v2.0/en/customer_pay_vip.php?id=".$id;
        header($text);
    }
    else {
        ?>
        username or password error, please <a href="customer_vip_login.html">try again</a>
    <?php
}

?>