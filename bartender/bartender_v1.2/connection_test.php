<?php
  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'flying_dutchman');

  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

  //echo 'Connected successfully.';

  $mysqli->close();
?>


<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>Bartender Login</title>
        
        <!-- load custom style sheet -->
        <link rel="stylesheet" type="text/css" href="bartender.css">
    
    </head>
    
    <body class="bartender_body">
        
        <div class="bartender_header">
            <img class="bartender_header_icon_single" src="image/language_icon.png" alt="Change Language">

        </div>
        
        <div class="center">
        
            <span>
                <img class= "bartender_login_dutchman_logo" src="image/dutchman_logo.png" alt="Flying Dutchman">
            </span>

            <p id="bartender_login_screen_title">The Bartender Hub</p>

            
            <form action="controller/authen_login.php" class="bartender_login_input_style">
                
              <input class="bartender_login_input" type="text" name="username" placeholder="username">
                
                <br>
              <input class="bartender_login_input" type="text" name="password" placeholder="password">
            
                <br>
                
                <button type="submit" class="bartender_login_btn">Login</button>
                
            </form> 
        
        
        </div>
    </body>
</html>
