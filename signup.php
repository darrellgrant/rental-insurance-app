<?php
include_once 'header.php';
$fname = "";
$lname = "";
$email = "";
$username ="";
?>

<section class="section" id="register">
    
    
    

    <form class="signup-form" action="includes/signup.inc.php" method="POST">
               <div>
               <h1>Register</h1>
               <div class="errorMessage" id="errMsgMain"></div>
               <!--main error msg (fill in all fields)-->

               <!--first name-->
               <label for="first" class="label">First Name</label><br>
               <input type="text" name="first" placeholder="first name" 
                    class="all-inputs" onchange="validateRegister()"
                        value="<?php echo $fname; ?>" id="first-name">
               
               <div class="errorMessage" id="errMsg1"></div>

               </div> 
               <div>
                <!--last name-->
               <label for="last">Last Name</label><br>
               <input type="text" name="last" placeholder="last name" 
                    class="all-inputs" onchange="validateRegister()"
                        value="<?php echo $lname; ?>" id="last-name">
               <div class="errorMessage" id="errMsg2"></div>

               </div>

               <div>
                <!--email-->
               <label for="email">Email</label><br>
               <input type="text" name="email" placeholder="e-mail" 
                    class="all-inputs" onchange="validateRegister()"
                        value="<?php echo $email; ?>" id="email">
               <div class="errorMessage" id="errMsg3">



               </div>
               <div>
                   <!--username-->
               <label for="uid">Username</label><br>
               <input type="text" name="uid" placeholder="username" 
                    class="all-inputs" onchange="validateRegister()"
                        value="<?php echo $username; ?>" id="username">
               <div class="errorMessage" id="errMsg4">
               <?php
                    if(isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
               

               </div>

               </div>

               <div>
                <!--password-->
               <label for="pwd">Password</label><br>
               <input type="password" name="pwd" placeholder="password" 
                    class="all-inputs"  onchange="validateRegister()" id="password">
               <div class="errorMessage" id="errMsg5"></div>

               </div>
               <div>

               <!--submit btn-->
               <button type="submit" name="submit" id="btn">Sign up</button>  
               </div>              
    </form>
                <!--tool tip-->
                <br>
                <div class="tooltip"><p>View password and username requirements</p>
                    <span class="tooltiptext">
                    <div id="passInfo">
                        <p>Password: between 8 and 20 characters</p>
                        <p>and must contain at least one each of the following:</p>
                        <p>an uppercase letter, a lowercase letter</p>
                        <p>a numeral and a special character<br>(eg., !@#$%)</p><br>
                        <p>Username: any combination of upper or lowercase letters and/or
                         numerals with no spaces </p>
                    </div>

                        
                    </span>
                </div>                
    
    
                   
                <br><br>
                <p id="misc-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, molestias provident fugiat dolor odit atque.</p>
</section>

<?php
include_once 'footer.php';
?>