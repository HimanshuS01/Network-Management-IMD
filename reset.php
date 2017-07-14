<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'db.php';
session_start();

// Make sure email and hash variables aren't empty
if( isset($_SESSION['email']) && !empty($_SESSION['email']))
{
    $email = $_SESSION['email']; 
    //$hash = $mysqli->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 )
    { 
        //echo "You have entered invalid URL for password reset!";
        //ader("location: error.php");
    }
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Reset Your Password</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <style>
    .form{
      width: 500px;
      height: 270px;
      text-align: center;
      margin: 0 auto;
      background-color: rgba(236, 240, 241, 0.78);
      border-radius: 4px;
      margin: 0 auto;
      margin-top: 120px;
    }

    .form img{
      width: 120px;
      height: 120px;
      margin-top: -60px;
      margin-bottom: 2px;
    }
    #imd{
      color: brown;
      font-size: x-large;
      margin-top: 10px;
    }
    header, footer {
      background: #ccd9ff;
      height: 20vh;
    }
    header, footer, article, nav, aside {
      padding: 1em;
    }
  </style>
</head>

<body>
    <div style="display:flex; justify-content: space-between;">
    <div>
      <img src="images/IMDD.png" width="355" height="75" align="left">
    </div>
    <div>
       <a href="http://localhost:8082/MyFiles/login-system/profile.php"><img src="images/IMD_LOGO.png"  width="80" height="75" align="centre"> </a>    
    </div>

    <div style="margin-right: 10px;">
      <p id="imd"><strong> IP Search</strong><br>
        Indian Meteorogical Department

      </p>
    </div>
  </div>

  <div style="background-color: brown;padding: 6px;margin-top: -10px;"></div>
    <div class="form">

          <h1>RESET PASSWORD</h1>
          
          <form action="reset.php" method="post">
              
          <div class="field-wrap">
            <!-- <label>
              New Password<span class="req">*</span>
            </label> -->
            <input type="password"required name="newpassword" autocomplete="off" placeholder="New Password*" />
          </div>
              
          <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="password"required name="confirmpassword" autocomplete="off" placeholder="Confirm Password*" />
          </div>
          
          <!-- This input field is needed, to get the email of the user -->
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $hash ?>">    
                     
          <button class="button button-block"/>Apply</button>
           
          </form>
          <!-- <a href='profile.php'><button class=' button button-block' name=''back/>Back</button></a> -->
           

    </div>
    


</body>
</html>
<?php
/* Password reset process, updates database with new user password */
require 'db.php';
//session_start();


// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email =$_POST['email'];
        //$hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE users SET password='$new_password' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

            echo "<<script>
                  alert('Your password has been reset!!');
                  window.location.href='index.php';
                  </script>";
        }

    }
    else {
        // $_SESSION['message'] = "Two passwords you entered don't match, try again!";
        // header("location: error.php");    
        echo "<b><center>Two passwords you entered don't match, please try again!</center></b>";
    }

}
?>
