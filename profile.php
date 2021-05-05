<?php

include_once 'header.php';
?>
<div class="container" >
<div>
        <?php
             if (isset($_SESSION['u_id'])) {
                echo "You are logged in";
            }else{
            header("Location:error.php??error=invalidaccess");
            exit();
} 
        ?>
</div>

<section>
    
    
    <section class="user-img-container centered-above main-row">
        <i class="fas fa-user"></i>
    </section>
    


    
    <section class="centered main-row">
    

    <div class="profile-name"><span>Howdy, <!--first name --></span>  <?php echo $_SESSION['u_first']; ?><span>&nbsp</span></div>
    <div class="profile-name"><!--last name --> <?php echo $_SESSION['u_last']; ?></div>
    </section>

    <section class="centered-below">
    <h1>Got Stuff?</h1><br> 
    <p>Let's start listing items you'd like to insure.</p><br>
    
    <div id="insure-items-link"><a href="listitems.php">Add Now</a></div>
    
    
    </section>
    

</section>
</div>

<?php
include_once 'footer.php';
?>