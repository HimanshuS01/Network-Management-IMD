<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
// */
// require 'db.php';
// session_start();

// // Make sure email and hash variables aren't empty
// if( isset($_SESSION['email']) && !empty($_SESSION['email']))
// {
//     $email = $_SESSION['email']; 
//     //$hash = $mysqli->escape_string($_GET['hash']); 

//     // Make sure user email with matching hash exist
//     $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

//     if ( $result->num_rows == 0 )
//     { 
//         //echo "You have entered invalid URL for password reset!";
//         //ader("location: error.php");
//     }
// }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Add Data</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <style>
    input{
  height: 25px;
  width: 300px;
  font-size: 18px;
  margin-bottom: 20px;
  background-color: #fff;  
  padding: 5px;

}
    .form{
      width: 500px;
      height: 700px;
      text-align: center;
      margin: 0 auto;
      background-color: rgba(236, 240, 241, 0.78);
      border-radius: 4px;
      margin: 0 auto;
      margin-top: 90px;
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

          <h1>ADD DATA</h1>
          
          <form action="add1.php" method="post">
              
          <!-- <div class="field-wrap">
            <label>
              New Password<span class="req">*</span>
            </label>
            <input type="text"required name="user_id" autocomplete="off" placeholder="User Id*" />
          </div> -->
          <div class="field-wrap">
            <!-- <label>
              New Password<span class="req">*</span>
            </label> -->
            <input type="text" name="server_name" autocomplete="off" placeholder="Server Name" />
          </div>

          <div class="field-wrap">
            <!-- <label>
              New Password<span class="req">*</span>
            </label> -->
            <input type="text"required name="user_name" autocomplete="off" placeholder="User Name*" />
          </div>
              
          <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="text"required name="priv" autocomplete="off" placeholder="Private Ip*" />
          </div>

          <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="text" name="pub" autocomplete="off" placeholder="Public Ip" />
          </div>
          <div class="field-wrap">

            <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="text" name="mac_id" autocomplete="off" placeholder="Mac Id" />
          </div>
          <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="text" name="user_designation" autocomplete="off" placeholder="Designation" />
          </div>
          <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="text" name="user_room_no" autocomplete="off" placeholder="Room No" />
          </div>
          <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="text" name="user_landline_no" autocomplete="off" minlength="8" maxlength="11" placeholder="Landline No" />
          </div>
          <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="text" name="user_mobile_no" autocomplete="off" minlength="10" maxlength="13" placeholder="Mobile No" />
          </div>
          <div class="field-wrap">
            <!-- <label>
              Confirm New Password<span class="req">*</span>
            </label> -->
            <input type="text" name="user_section_id" autocomplete="off" placeholder="Section Id" />
          </div>


                     
          <button class="button button-block"/>Add</button>
           
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

// $user_id1=$_POST['user_id'];
if (isset($_POST['server_name'])!=="") {
  $server_name1=$_POST['server_name'];
}
else
{
  $server_name1="0";
}

$user_name1=$_POST['user_name'];
$priv1=$_POST['priv'];

if (isset($_POST['pub'])!=="") {
  $pub1=$_POST['pub'];
}
else
{
  $pub1="0";
}

if (isset($_POST['mac_id'])!=="") {
  $mac_id1=$_POST['mac_id'];
}
else
{
  $mac_id1="0";
}

if (isset($_POST['user_designation'])!=="") {
  $user_designation1=$_POST['user_designation'];
}
else
{
  $user_designation1="0";
}

if (isset($_POST['user_room_no'])!=="") {
  $user_room_no1=$_POST['user_room_no'];
}
else
{
  $user_room_no1="0";
}

if (isset($_POST['user_landline_no'])!=="") {
  $user_landline_no1=$_POST['user_landline_no'];
}
else
{
  $user_landline_no1="0";
}

if (isset($_POST['user_mobile_no'])!=="") {
  $user_mobile_no1=$_POST['user_mobile_no'];
}
else
{
  $user_mobile_no1="0";
}

if (isset($_POST['user_section_id'])!=="") {
  $user_section_id1=$_POST['user_section_id'];
}
else
{
  $user_section_id1="0";
}


$flag=0;
$flag1=0;


$conn = new mysqli("localhost","root","","imd");
$sql="INSERT INTO ip (user_id, name, private_ip, public_ip, mac_id) VALUES ('', '$server_name1', '$priv1', '$pub1','$mac_id1')";
$record=mysqli_query($conn,$sql);
if ($record) {
    $flag=1;
  }



$sql3="SELECT * FROM ip WHERE private_ip = '$priv1'"; 
$record3= mysqli_query($conn,$sql3);
$e1=mysqli_fetch_assoc($record3);
$user_id1 = $e1['user_id'];
// $sql="INSERT INTO ip (user_id,name, private_ip, public_ip) VALUES('', $name1', '$priv1', '$pub1')";


$sql1="INSERT INTO user_information (user_id, user_name, user_designation, user_room_no, user_landline_no, user_mobile_no, user_section_id) VALUES ('$user_id1', '$user_name1', '$user_designation1', '$user_room_no1', '$user_landline_no1', '$user_mobile_no1', '$user_section_id1')";
$record1=$conn->query($sql1);
if ($record1) {
    $flag1=1;
  }


if ($flag===1 && $flag1===1) {
    // echo "<center><b> Row Inserted <b></center>";
    echo "<script>
    alert('Row Inserted ');
    window.location.href='profile.php';
    </script>";
}
} 


?>
