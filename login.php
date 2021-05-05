
<?php
include_once 'header.php';
?>
<section class="section" id="login">
    
    <form class="form-style" action="includes/login.inc.php" method="POST">
        <h1>Login</h1>
        <!--main error msg (fill in all fields) -->
        <div class="errorMessage" id="loginErrMsg_Main">
        <?php
                    if(isset($_SESSION['message1'])) {
                        echo $_SESSION['message1'];
                        unset($_SESSION['message1']);
                    }
                ?>
        </div>

                <div>
                    <label for="uid">User Name or Email</label><br>
                    <input type="text" name="uid" placeholder="username/email" id="loginUser">
                    
                </div>

                <div>
                    <label for="pwd">Password </label><br>
                    <input type="password" name="pwd" placeholder="password" id="loginPass">  
                </div>

                <div>
                    <button class="form-style-btn" name="submit" type="submit" class="btn btn-primary" id="loginBTN">Log in</button>
                </div>

        <!--error msg (password or username incorrect) -->
        <div class="errorMessage">
        <?php
                    if(isset($_SESSION['message2'])) {
                        echo $_SESSION['message2'];
                        unset($_SESSION['message2']);
                    }
                ?>
        </div>

                <div id="request-text">
                <p>Request password reset.<p>
                <p>Request forgotten username.<p>
                </div>

        </form>

   
</section>


</div>
    

       
<?php
include_once 'footer.php';
?>