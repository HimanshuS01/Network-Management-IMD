<?php
// Registration process, inserts user info into the database 
 
//require 'db.php';
//session_start();
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
     
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    // $_SESSION['message'] = 'User with this email already exists!';
    // header("location: error.php");
        echo "<div style='position: relative'>";
        echo "<b><p style='position:fixed; bottom: 40px; width:100%; text-align:center'>User with this email already exists!</p></b>";
        echo "</div>";
}
else { // Email doesn't already exist in a database, proceed...

    $sql = "INSERT INTO users (first_name, last_name, email, password, hash, type) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash', 'normal')";
    
    // Add user to the database
    if (!$mysqli->query($sql)  ){
        // $_SESSION['message'] = "Registration Failed";
        // header("location: error.php");
            echo "<div style='position: relative'>";
        echo "<b><p style='position:fixed; bottom: 45px; width:100%; text-align:center'>Registration Failed!</p></b>";
        echo "</div>";
    }
    else{
        // $_SESSION['message'] = "Your account has been created";
        // header("location: success.php");
        //     echo "<div style='position: relative'>";
        // echo "<b><p style='position:fixed; bottom: 45px; width:100%; text-align:center'>Your account has been created!</p></b>";   
        // echo "</div>";
        // //header("location: profile.php");
        echo "<script>
alert('Your account has been created!');
window.location.href='profile.php';
</script>";
    }
 
}
?>