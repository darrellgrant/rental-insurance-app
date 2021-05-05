<?php
session_start();
//passing the edit variable via the GET method
if(isset($_GET['delete'])) {
    //db connection
    include_once 'dbh.inc.php';

    //store into local variable
    $id = $_GET['delete'];
    $sql = "DELETE FROM items WHERE itemID=$id" or die($sql->error());
    mysqli_query($conn, $sql);

    $_SESSION['message'] = "Item Has Been Deleted";
    $_SESSION['msg_type'] = "deleted";
    header("Location: ../listitems.php?listitems=deleted");
    exit();


}//end isset




