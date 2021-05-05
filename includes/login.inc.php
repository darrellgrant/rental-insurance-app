<?php
session_start();
//if the user did come here via the submit button
if (isset($_POST['submit'])) {
    include 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //error handlers
    //check if inputs are empty

    if(empty($uid) || empty($pwd)) {
        $_SESSION['message1'] = "Please Fill In All Fields";
        header("Location: ../login.php");
        exit();

    }else {
        $sql = "SELECT * FROM users WHERE user_uid='$uid'  OR user_email='$uid' ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {

            $_SESSION['message2'] = "Username or Email Incorrect";
            header("Location: ../login.php");
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                //de-hash the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false){

                    $_SESSION['message2'] = "Password Incorrect";
                    header("Location: ../login.php");
                    exit();

                }elseif ($hashedPwdCheck == true) {
                    //Log in the user HERE
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];

                    $_SESSION['u_email'] = $row['user_email'];

                    $_SESSION['u_uid'] = $row['user_uid'];

                    header("Location: ../profile.php?login=success");
                    exit();


                }//end hashedPwdCheck 

            }else{

            }//$row = array

        }//end resultCheck

    }//end if inputs empty


}else{
    header("Location: ../index.php?login=error3");
    exit();

}//end isset

