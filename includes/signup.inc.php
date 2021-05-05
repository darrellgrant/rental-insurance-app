<?php
session_start();
// make sure users arrive here via the button and not thru url window


if (isset($_POST['submit'])) {
    include_once 'dbh.inc.php';
   
    // $first = check_input($_POST['first_name']);

    
    //check_input is a custom function (see function definition below)

    $first = check_input($_POST['first']);
    $last = check_input($_POST['last']);
    $email = check_input($_POST['email']);
    $uid = check_input($_POST['uid']);
    $pwd = check_input($_POST['pwd']);



    // $first = mysqli_real_escape_string($conn, $_POST['first']);
    // $last = mysqli_real_escape_string($conn, $_POST['last']);
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    // $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //error handlers
    //check for empty fields
    if (empty($first) ||  empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    }else {
        //check if input characters are valid
        if(!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $last)  ) {
            /* header("Location: ../signup.php?signup=invalid");
            exit(); */

            header("Location: ../signup.php?signup=invalid");
            exit();

        }else{
            //check email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=email");
                exit();


            }else{
                //check username availability in database

                $sql = "SELECT * FROM users WHERE user_uid ='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    $_SESSION['message'] = "Sorry, that username is already taken!";
                    
                    header("Location: ../signup.php?signup=username_taken");
                    exit();
                }else {
                    //hash the password
                    $hashedPWd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    //we can reuse variable $sql as it is no longer needed above
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) 
                        VALUES ('$first', '$last', '$email', '$uid', '$hashedPWd');";

                    mysqli_query($conn, $sql);
                    header("Location: ../login.php?signup=success");
                    exit();




                }//end check uid available


            }//end email valid check

        }//end input chars are valid


    }//end empty



}else {
    header("Location: ../signup.php");
    exit();
}//end isset


function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
