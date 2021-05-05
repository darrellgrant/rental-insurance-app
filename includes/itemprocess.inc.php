<?php
session_start();


//if submit button clicked, connect to data base
if (isset($_POST['submit'])){
    include_once 'dbh.inc.php';

    //custom function ensures user inputs are safe
    //see function definition at bottom of file
    //assign user input to variables $item_name and $item_qty
    //associate items with logged in user ($item_user)

    $item_name = check_input($_POST['item-name']);
    $item_qty = check_input($_POST['item-qty']);
    $item_user = check_input($_POST['item-user']);
    $item_value = check_input($_POST['item-value']);

    //check if inputs/variables are empty
    if (empty($item_name) || empty($item_qty) || empty($item_value)){
        $_SESSION['message'] = "Item Failed to Upload";
        $_SESSION['msg_type'] = "fail";
        header("Location: ../listitems.php?listitems=empty");
        exit();

    }
    else {

        $sql = "INSERT INTO items (itemName, itemQTY, itemValue, user_id) 
        VALUES ('$item_name', '$item_qty', $item_value,'$item_user');";

        mysqli_query($conn, $sql);

        $_SESSION['message'] = "Item Saved Succesfully!";
        $_SESSION['msg_type'] = "success";
        header("Location: ../listitems.php?listitems=success");
        exit();
    }



                   

}//end if (isset)-SUBMIT

if(isset($_POST['update'])){
    include_once 'dbh.inc.php';
    $item_name = check_input($_POST['item-name']);
    $item_qty = check_input($_POST['item-qty']);
    $item_user = check_input($_POST['item-user']);
    $item_value = check_input($_POST['item-value']);
    $id = check_input($_POST['id']);

    if (empty($item_name) || empty($item_qty) || empty($item_value)){
        $_SESSION['message'] = "Item Failed to Upload";
        $_SESSION['msg_type'] = "fail";
        header("Location: ../listitems.php?listitems=empty");
        exit();

    }else{

        $sql = "UPDATE items SET itemName='$item_name', itemQTY='$item_qty', itemValue='$item_value' WHERE itemID=$id";
        mysqli_query($conn, $sql);

        $_SESSION['itemName'] = "";
        $_SESSION['itemQTY'] = "";
        $_SESSION['itemValue'] = "";
        unset ($_SESSION['clicked']);
        

        $_SESSION['message'] = "Item Has Been Updated";
        $_SESSION['msg_type'] = "update";
        header("Location: ../listitems.php?listitems=updated");
        exit();

    }
}//end if (isset)-UPDATE





function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


