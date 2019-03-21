<?php
session_start();
?>

<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Bartender Login</title>
        
        <!-- load custom style sheet -->
        <link rel="stylesheet" type="text/css" href="bartender.css">
    
    </head>
    
    <body class="bartender_body">
        
        <div class="bartender_header">
            <img id="switch_lang" class="bartender_header_icon_single" src="image/language_icon.png" alt="Change Language">
            
        </div>
        
        <div class="center">
        
            <span>
                <img class= "bartender_login_dutchman_logo" src="image/dutchman_logo.png" alt="Flying Dutchman">
            </span>

            
            <!-- Two languages are display here, toggle function in bertender_js.js-->
            <p lang="en" id="bartender_login_screen_title">The Bartender Hub</p>
            <p lang="ch" id="bartender_login_screen_title">酒保俱樂部</p>
            
            <!-- call authen_login.php for authentication when submit-->
            <form class="bartender_login_input_style" action="controller/authen_login.php" method="post">
                
              <input class="bartender_login_input" type="text" name="bartender_username" placeholder="username">
                
                <br>
              <input class="bartender_login_input" type="text" name="bartender_password" placeholder="password">
            
                <br>
                
                <button lang="en" type="submit" class="bartender_login_btn">Login</button>
                <button lang="ch" type="submit" class="bartender_login_btn">登入</button>
                
            </form> 
            
            <!-- if authentication error, set "error" to session and display error message-->
                <?php
                    if(isset($_SESSION["error"])){

                        echo "<p>Invalid Login Credentials. Please try again.</p>";
                    }
                ?> 
            
        
        </div>
        
        
        <script src="controller/jquery-3.3.1.js"></script>
        <script src="controller/js.cookie.js"></script>
        <script src="controller/bartender_js.js"></script>
        
    </body>
</html>

<!-- unset error-->
<?php
    unset($_SESSION["error"]);
?>