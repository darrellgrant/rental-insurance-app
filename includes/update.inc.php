<?php
session_start();
$update = "false";

//This part ONLY stores the info about the item to be updated into the 
//input fields of the form 
//logic to actually update the items in the database, see itemprocess.inc.php

//passing the edit variable via the GET method
if(isset($_GET['edit'])) {
    //db connection
    include_once 'dbh.inc.php';

    //store into local variable
    $id = $_GET['edit'];
    $update = true;


    $sql = "SELECT FROM items WHERE itemID=$id";
    $result = $conn->query("SELECT * FROM items WHERE itemID=$id");
    if ($result->num_rows){
        $row = $result->fetch_array();
        $_SESSION['itemName'] = $row['itemName'];
        $_SESSION['itemQTY'] =  $row['itemQTY'];
        $_SESSION['itemValue'] = $row['itemValue'];
        $_SESSION['clicked'] = "yes";
        $_SESSION['update'] = true;
        $_SESSION['id'] = $id;
        
        
    }
    header("Location: ../listitems.php?listitems=update");
    exit(); 

        


    }    //end isset

