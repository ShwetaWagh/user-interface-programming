<?php
session_start();
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
            
            <form class="bartender_login_input_style" action="controller/authen_login.php" method="post">
                
              <input class="bartender_login_input" type="text" name="bartender_username" placeholder="username">
                
                <br>
              <input class="bartender_login_input" type="text" name="bartender_password" placeholder="password">
            
                <br>
                
                <button type="submit" class="bartender_login_btn">Login</button>
                
            </form> 
            
                <?php
                    if(isset($_SESSION["error"])){

                        echo "<p>Invalid Login Credentials. Please try again.</p>";
                    }
                ?> 
            
        
        </div>
    </body>
</html>

<?php
    unset($_SESSION["error"]);
?>