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
                        <img src="neighborly_logo_solo.png" class="small-logo-img" alt=""></a>
                    </div>
                    
                        <ul>
                            <li><a href="index.php#home" class="underline">Home</a></li>
                            <li><a href="index.php#about" class="underline" >About</a></li>
                            <li><a href="index.php#services" class="underline">Services</a></li>
                            <li><a href="index.php#contact" class="underline">Contact</a></li>

                            <!--user is not logged in-->
                            <?php
                                if (!isset($_SESSION['u_id'])):
                            ?>
                            <li><a href="index.php#register" class="underline">Register</a></li>
                            <li><a href="index.php#login" class="underline">Login</a></li>
                            

                            <?php else: ?>
                            <!--user is logged in-->
                            <li><a href="profile.php" class="underline">My Profile</a></li>
                            <li><a href="includes/logout.inc.php?logout=1">Logout</a></li>

                            <?php endif; ?> 
                            


                        </ul>
                        
                        <!-- <div class="nav-login">
                                <?php
                                    if (isset($_SESSION['u_id'])){
                                        echo '<form action="includes/logout.inc.php" method="POST">
                                        <button type="submit" name="submit">Logout</button>
                                        </form>';
                                    }else {
                                        echo '<form  action="includes/login.inc.php" method="POST">
                                        <input type="text" name="uid" placeholder="username/email" >
                                        <input type="password" name="pwd" placeholder="password" >
                                        <button type="submit" name="submit">Log In</button> 
                                        </form>';
                                    }
                                
                                ?>
                        </div>

                        <div class="test">
                            
                                <?php
                                    if (isset($_SESSION['u_id'])) {
                                        echo '';
                                    }
                                    else {
                                        echo '<h3 class="signup-btn"><a href="signup.php">Sign Up<a/></h3>';
                                    }
                                ?>
                                
                        </div> -->
                            
                </div>
            </nav>
        
     
        </header>

        