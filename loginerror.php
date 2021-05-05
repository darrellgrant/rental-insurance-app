<?php
include_once 'header.php';
?>
<section class="centered-signup" > 

        <div class="row justify-content-center">
        
            <form action="includes/login.inc.php" method="POST">
            <div><p>Incorrect login. Please try again.</p></div>

                <div class="form-group">
                    <label for="uid">Item Name</label><br>
                    <input type="text" name="uid" placeholder="username/email">
                    
                </div>

                <div class="form-group">
                    <label for="pwd">Item Quantity </label><br>
                    <input type="password" name="pwd" placeholder="password">  
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Log in</button>
                </div>
                <div><a href="#">Request password reset.</p></div>
                <div><a href="3">Request forgotten username.</p></div>
            </form>

        </div>
    
</section>



<?php
include_once 'footer.php';
?>