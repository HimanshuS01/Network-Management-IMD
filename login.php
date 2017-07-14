<?php
/* User login process, checks if user exists and password is correct */
require 'db.php';
//session_start();
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");


if ( $result->num_rows == 0 ){ // User doesn't exist
   
    // $_SESSION['msg1'] = "<b>User with that email doesn't exist!</b>";
    // header("location: index.php");
    echo "<div style='position: relative'>";
        echo "<b><p style='position:fixed; top: 165px; width:100%; text-align:center'>User with that email doesn't exists!</p></b>";
        echo "</div>";
    
    
}

else { // User exists
    $user = $result->fetch_assoc();
    $_SESSION['type']=$user['type'];
    if ( password_verify($_POST['password'], $user['password'])) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstname'] = $user['first_name'];
        $_SESSION['flagemail']=0;
        //$_SESSION['password']
        //$_SESSION['first_name'] = $user['first_name'];
        //$_SESSION['last_name'] = $user['last_name'];
        // This is how we'll know the user is logged in
        $_SESSION['loggedin_time'] = time();
        
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
        //$var=true;
    }
    else {
        
        // $_SESSION['message'] = "You have entered wrong password, try again!";
        // header("location: error.php");
        echo "<div style='position: relative'>";
        echo "<b><p style='position:fixed; top: 165px; width:100%; text-align:center'>You have entered wrong password, try again!</p></b>";
        echo "</div>";
        
        
    }



}

?>