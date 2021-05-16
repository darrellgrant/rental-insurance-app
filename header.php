<?php
session_start();


?>
<!doctype HTML>
<html>
    <head>
        <title>Neighborly Renters Insurance</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/207aa7db83.js" crossorigin="anonymous"></script>
        
        

    </head>
    <body>
        <header>
            <nav class="navbar" id="navbar">
                <div class="main-wrapper" id="nav-wrapper">
                    <div class="logo-container">
                    <a href="index.php#home">
                        <img src="images/neighborly_logo_circle.png" class="small-logo-img" alt=""></a>
                    </div>
                    <!--hamburger menu-->
                    <button class="hamburger" id="hamburger">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                        <ul class="nav-ul" id="nav-ul">
                            <li><a href="index.php#home" class="underline">Home</a></li>
                            <li><a href="index.php#about" class="underline" >About</a></li>
                            <li><a href="index.php#services" class="underline">Services</a></li>
                            <li><a href="index.php#contact" class="underline">Contact</a></li>

                            <!--user is not logged in-->
                            <?php
                                if (!isset($_SESSION['u_id'])):
                            ?>
                            <li><a href="signup.php" class="underline">Register</a></li>
                            <li><a href="login.php" class="underline">Login</a></li>
                            

                            <?php else: ?>
                            <!--user is logged in-->
                            <li><a href="profile.php" class="underline">My Profile</a></li>
                            <li><a href="includes/logout.inc.php?logout=1">Logout</a></li>

                            <?php endif; ?> 
                            


                        </ul>
                        
                       
                            
                </div>
            </nav>
        
     
        </header>

        