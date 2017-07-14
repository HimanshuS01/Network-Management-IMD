
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Delete Data</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <style>
    .form{
      width: 500px;
      height: 200px;
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

          <h1>DELETE DATA</h1>
          
          <form action="delete1.php" method="post">
              
          <div class="field-wrap">
            <input type="text"required name="priv" autocomplete="off" placeholder="Private Ip*" />
          </div>
                   

                     
          <button class="button button-block"/>Delete</button>
           
      
<?php
/* Password reset process, updates database with new user password */
require 'db.php';
//session_start();


// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$priv1=$_POST['priv'];

$flag=0;
$flag1=0;


$conn = new mysqli("localhost","root","GjjhoQj2oV3CSchd","imd");




$sql3="SELECT * FROM ip WHERE private_ip = '$priv1'"; 
$record3= mysqli_query($conn,$sql3);
$e1=mysqli_fetch_assoc($record3);
$user_id1 = $e1['user_id'];




// $sql="INSERT INTO ip (user_id,name, private_ip, public_ip) VALUES('', $name1', '$priv1', '$pub1')";
$sql1=" DELETE FROM user_information WHERE user_id='$user_id1'  ";
$record1=$conn->query($sql1);
if ($record1) {
    $flag=1;
  }


$sql=" DELETE FROM ip WHERE private_ip='$priv1' ";
$record=$conn->query($sql);
if ($record) {
    $flag1=1;
  }






if ($flag===1 && $flag1===1) {
     echo "<script>
    alert('Row Deleted ');
    window.location.href='profile.php';
    </script>";
    // echo "<center><b> Row Deleted <b></center>";
}
} 


?>


    </form>
          <!-- <a href='profile.php'><button class=' button button-block' name=''back/>Back</button></a> -->
           

    </div>
    


</body>
</html>
