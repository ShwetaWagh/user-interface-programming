<?php

@include('connect.php');

//check if temp table exist
$sqll2 = "DROP TABLE temp";
$sqll3="SELECT * FROM temp WHERE 1";
//if exist table, delete it
if(mysqli_query($conn, $sqll3)) $result1=mysqli_query($conn, $sqll2);



?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>Customer Home</title>
        
        <!-- load customer style sheet -->
        <link rel="stylesheet" type="text/css" href="customer_test.css">
    
    </head>
    
    <body class="customer_index_body">
        
        <div class="customer_bg_dark_overlay">
            
            
                <div class="customer_header">
                    <img class="customer_language" src="../Images/language_icon.png" alt="Change Language">

                </div>

                <div>
                    <div class="customer_row">
                      <div class="customer_index_left">

                          <img class="customer_index_img" src="../Images/promotion.png" alt="promotion">

                        </div>
                      <div class="customer_index_right">
                          <img class="customer_index_logo"
                               src="../Images/Dutchman_Logo.png" alt="Logo">
                          <h1>Welcome abroad!</h1>
                        </div>
                    </div>

                    <div class="customer_index_menu">
                        <a href="customer_menu.php"><img src="../Images/menu_btn_right.png"></a>
                    </div>

                </div>
            </div>
        
    </body>
</html>