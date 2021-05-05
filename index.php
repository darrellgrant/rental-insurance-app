<?php
include_once 'header.php';
$fname = "";
$lname = "";
$email = "";
$username ="";
?>




 <div class="container">     
 <section class="section" id="home">
   
    
        
            
                
               
                <?php
                    if (isset($_SESSION['u_id'])) {
                        echo "You are logged in";
                    }
                ?>
                <div><img src="neighborly_logo_wht.png" class="logo-img"alt=""></div>

                <div>
                    <img src="stuff.png" class="stuff-img" alt="">
                </div>
                <p id="main-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, molestias provident fugiat dolor odit atque.</p>
                


</section>

<!---------------------------------------------------ABOUT----------------------------------------------------->

<section class="section" id="about">
    <div class="move">
        
            <div class="text-container">
            <h1>About</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, molestias provident fugiat dolor odit atque.</p>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Doloremque atque repellat dolorem est dicta expedita laudantium, 
            consequuntur rerum molestias ad nulla provident illum dolor pariatur harum commodi 
            dolorum aliquid ex eius minus? Ipsum corporis ipsam quos excepturi quod unde, consequatur maxime quisquam? 
            Vitae dolores perferendis quaerat inventore voluptatum ipsum illum, et totam.</p>
            </div>

        <div><img src="toys.png" class="toys-img" alt=""></div>

    </div>
</section>

<!---------------------------------------------------SERVICES----------------------------------------------------->

<section class="section" id="services">

    <div class="move">

      <div class="services-container">
        <h1>Services</h1>
            <section class="card-section">
            
                <div class="card-container">
                    <div class="icon"><i class="fas fa-user-shield"></i></div>
                    <h3>Safe</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Repudiandae quos impedit laborum voluptatem 
                    necessitatibus ducimus ex incidunt atque. Assumenda, sed distinctio 
                    mollitia obcaecati nostrum eos!Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Hic, molestias provident fugiat dolor odit atque.
                    </p>
                </div>
                
                <div class="card-container">
                    <div class="icon"><i class="fas fa-thumbs-up"></i></div>
                    <h3>Reliable</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Repudiandae quos impedit laborum voluptatem 
                        necessitatibus ducimus ex incidunt atque. Assumenda, sed distinctio 
                        mollitia obcaecati nostrum eos!Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Hic, molestias provident fugiat dolor odit atque.
                    </p>
                </div>
            </section>
        </div>
    </div>
</section>
<!---------------------------------------------------CONTACT----------------------------------------------------->

<section class="section" id="contact">
    <div>
        <img src="howdy.png" class="howdy-img" alt="">
    </div>
    
    <div class="move">
        <form class="contact-form" action="sent.php">
            <div>
            <h1>Contact</h1>
            <div class="errorMessage" id="contact-errMAIN"></div>
            <!--main error msg (fill in all fields)-->

            <label for="name">Your Name</label><br>
            <input type="text" name="name" placeholder="Your Name" id="contact-name" class="contact-input" onchange="contactValidate()" >
            <div class="errorMessage" id="contact-err1"></div>
            </div>

                        <div>
            <label for="email">Your Email</label><br>
            <input type="text" name="email" placeholder="Your Email" id="contact-email" class="contact-input" onchange="contactValidate()">
            <div class="errorMessage" id="contact-err2"></div>
                    </div>
            
                    <div>
            <label for="message">Message</label><br>
            <textarea name="message" placeholder="Type Message" rows="10" id="contact-message"></textarea><br>
                    </div>

            <button name="submit" id="contact-btn">Send</button>
                        <div class="successMessage" id="successMSG"></div>

        </form>
    </div>
</section>


<?php
include_once 'footer.php';
?>
    
    
