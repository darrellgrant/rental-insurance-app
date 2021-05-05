<?php
session_start();
$itemName = "";
$itemValue = "";
$itemQTY = "";


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
        header("Location: ../demo.php?demo_items=empty");
        exit();

    }

    //INSERT items into database
    else {

        $sql = "INSERT INTO items (itemName, itemQTY, itemValue, user_id) 
        VALUES ('$item_name', '$item_qty', $item_value,'$item_user');";

        mysqli_query($conn, $sql);

        $_SESSION['message'] = "Item Saved Succesfully!";
        $_SESSION['msg_type'] = "success";
        header("Location: ../demo.php?demo_items=success");
        exit();
    }

    

}//end isset

//DELETE items from database

if(isset($_GET['delete'])) {
include_once 'dbh.inc.php';

$id = $_GET['delete'];
$sql = "DELETE FROM items WHERE itemID=$id" or die($sql->error());
mysqli_query($conn, $sql);

$_SESSION['message'] = "Item Has Been Deleted";
$_SESSION['msg_type'] = "deleted";
header("Location: ../demo.php?demo_items=deleted");
exit();




}

//UPDATE items 
//1) when edit button clicked, show selected item to user in the form fields

if(isset($_GET['edit'])) {
include_once 'dbh.inc.php';
$id = $_GET['edit'];

$sql = "SELECT FROM items WHERE itemID=$id";
$result = $conn->query("SELECT * FROM items WHERE itemID=$id");
//check if there is a one result 
    if ($result->num_rows){
        $row = $result->fetch_array();
        $_SESSION['itemName'] = $row['itemName'];
        $_SESSION['itemQTY'] =  $row['itemQTY'];
        $_SESSION['itemValue'] = $row['itemValue'];
        $_SESSION['update'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['clicked'] = "yes";
        
    }

    header("Location: ../demo.php?listitems=update");
    exit(); 

}

//2) when update button clicked, update item in the database

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
        header("Location: ../demo.php?listitems=empty");
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
        header("Location: ../demo.php?listitems=updated");
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