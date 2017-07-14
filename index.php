<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
    }

    elseif (isset($_POST['register'])) {//users registering
        
        require 'register.php';
    }  
    
        
}
?>

<body>
  <div class="form">
  <img src="images/IMD_LOGO.png">    
      
      <div class="tab-content">

         <div id="login">   
          <!-- <h1>LOG-IN</h1> -->
          <p>
            <?php 
            
            if (isset($_SESSION['msg']) and !empty($_SESSION['msg'])){
              
               if ($_SESSION['flag'] === 1) {
                 echo $_SESSION['msg'];
                  $_SESSION['flag']=0;
               }

            }
            
            if (isset($_SESSION['msg1']) and !empty($_SESSION['msg1'])) {
                 
                 if ($_SESSION['flag'] === 1) {
                   echo $_SESSION['msg1'];
                   $_SESSION['flag'] = 0; 
                 }
            }   
            ?> 
          </p>
          <form action="index.php" method="post" autocomplete="on">
          
          <div class="field-wrap">
            <input type="email" required autocomplete="on" name="email" placeholder="Enter Username" />

          </div>
          
          <div class="field-wrap">
            
            <input type="password" required autocomplete="off" name="password" placeholder="Enter password" />
          </div>
          
          <!--<p class="forgot"><a href="forgot.php">Forgot Password?</a></p>-->
          
          <button class="button button-block" name="login" />LOG IN</button>
          
          </form>

        </div>
      
      </div>
      
</div> 


</body>
</html>
