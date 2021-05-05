<?php
//redirect user if attempt to reach profile page w/o login


include_once 'header.php';
include_once 'includes/dbh.inc.php';

 if (isset($_SESSION['u_id'])) {
                echo "You are logged in";
            }else{
            header("Location:error.php??error=invalidaccess");
            exit();
} 

//set default input values to empty strings
$id = 0;
$update = false;
$itemName = "";
$itemQTY = "";
$itemValue = "";



//if edit link clicked, change input values
//based on Edit button, item id
if(isset($_SESSION['clicked'])){
    $itemName = $_SESSION['itemName'];
    $itemQTY = $_SESSION['itemQTY'];
    $itemValue = $_SESSION['itemValue']; 
    $update = true;
    $id = $_SESSION['id'];
    

}else{
    //$id= 0;
}





$u_id = $_SESSION['u_id'];
$result = $conn->query("SELECT * FROM items WHERE user_id=$u_id");

?>



<div class="page-container" >
    <div class="two-section-div"> 
        
<section id="table-wrapper">
    <table class="my-table" id="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Item Quantity</th>
                <th>Est. Value</th>
                <th colspan="2">Action</th> 
            </tr>
        </thead>
        <!--short syntax-->
        <?php while ($row = $result->fetch_assoc()):?> 
            <tr>
                <td>
                    <?php echo $row['itemName'];?>
                </td>
           
                <td>
                    <?php echo $row['itemQTY'];?>
                </td>

                <td>
                    <?php echo $row['itemValue'];?>
                </td>

                <td>
                    <!--action buttons -->
                    <a href="includes/update.inc.php?edit=<?php echo $row['itemID']; ?>" class="edit-button"> Edit</a>
                    
                    <a href="includes/delete.inc.php?delete=<?php echo $row['itemID'];?>" class="delete-button">Delete</a>

                    <!--icons for small screens-->
                    <span class="icon-edit"> <i class="far fa-edit"></i></span>
                    <span class="icon-delete"> <i class="fas fa-times"></i></span>



                </td>

            </tr>
        <?php endwhile; ?>

    </table>
</section>


<section>
    <div > 

       
            <form class="list-item-form" action="includes/itemprocess.inc.php" method="POST">

                
                    <label for="item-name">Item Name</label><br>
                    <input type="text" name="item-name" placeholder="list item name" value="<?php echo $itemName; ?>" maxlength="20"><br>
                    
                

                
                    <label for="item-qty">Item Quantity </label><br>
                    <input type="number" name="item-qty" placeholder="enter quantity" value="<?php echo $itemQTY; ?>" maxlength="7"> <br> 


                    <label for="item-value">Estimated Value </label><br>
                    <input type="text" name="item-value" placeholder="enter estimated value" value="<?php echo $itemValue; ?>" maxlength="6">  
                

                <!--user id -->
                <input type="hidden" name="item-user" value="<?php echo $_SESSION['u_id'];?>">
                <!--item id-->
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <?php if ($update == true):

                ?>
                    <button name="update" type="submit" class="update-item"> Update Item</button>
                <?php  else:
                ?>
                    <button name="submit" type="submit" class="save-item">Save Item</button>
                
                <?php endif; ?>   
                    <!--message-->
                        <?php
                        if(isset($_SESSION['message'])):
                        ?>

                        <div class="alert alert-<?php echo $_SESSION['msg_type'];?>">
                            <!-- success message here-->
                            <?php
                                
                                echo $_SESSION['message'];
                                unset ($_SESSION['message']);
                                
                            ?>

                        </div>
                        <?php endif; ?>
                    <!--end message-->

            </form>
            </div>
    </div>
    

</section>



    

</div>




<?php
include_once 'footer.php';
?>