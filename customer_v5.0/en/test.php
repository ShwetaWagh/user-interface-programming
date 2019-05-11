<?php
//connect database variable
$servername = "localhost";
$username = "root";
$password = "";
$dbname="flying_dutchman";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

echo "hel";
?>

<!-- SELECT * FROM `beverage` WHERE C_id not in ('7', '8') -->



<!-- select * from temp order by b_id asc limit 1 -->
<button class="customer_menu_undo_redo" action="undo()">Undo</button>