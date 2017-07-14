<?php

require 'db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<style>
  button{
    padding: 15px 30px;
     color: #fff;
     background-color: #2c3e50;
     border: none;
     margin-left: 30px;   
   

   }
    .form{
      width: 500px;
      height: 380px;
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
<?php

	if($_SERVER['REQUEST METHOD'] = 'POST'){

		if(isset($_POST['register'])){

			require'register.php';
		}

	}
  
?>
<body>
	<div style="display:flex; justify-content: space-between;">
    	<div>
      		<img src="images/IMDD.png" width="355" height="75" align="left">
    	</div>
    	<div>
         <a href="http://localhost:8082/MyFiles/login-system/profile.php"><img src="images/IMD_LOGO.png"  width="80" height="75" align="centre"> </a>    
    	</div>

    	<div style="margin-right: 10px;">
      		<p id="imd" ><strong> IP Search</strong><br>
        		Indian Meteorogical Department

      		</p>
    	</div>
  	</div>

  	<div style="background-color: brown;padding: 6px;margin-top: -10px;"></div>

	<div class="form">

		<div class="tab-content">
			<div id="signup">   
          <h1>NEW USER DETAILS</h1>
          
          <form action="register_form.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              
              <input type="text" required autocomplete="off" name='firstname' placeholder="First Name*"/>
            </div>
        
            <div class="field-wrap">
              <label>
                <span class="req"></span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' placeholder="Last Name*" />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              <span class="req"></span>
            </label>
            <input type="email"required autocomplete="off" name='email' placeholder="Email*" />
          </div>
          
          <div class="field-wrap">
            <label>
              <span class="req"></span>
            </label>
            <input type="password"required autocomplete="off" name='password' placeholder="Set a password*" />
          </div>
          
          <button type="submit" class="button button-block" name="register" />Register</button>
          
                    
          </form>
          <!-- <?php
            // echo "<script>
            //     alert('Your account has been created!');
            //     window.location.href='profile.php';
            //     </script>";
          ?> -->
          <!-- <a href='profile.php'><button class=' button button-block' name=''back/>Back</button></a> -->
          
        </div>  
               
      </div>


</body>
</html>
