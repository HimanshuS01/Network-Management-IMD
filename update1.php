<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
// */
// require 'db.php';
 session_start();

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




$conn = new mysqli("localhost","root","","imd");



$user_id1=$_SESSION['user_id'];
$sql5="SELECT * FROM ip WHERE user_id = '$user_id1'"; 
$record5= mysqli_query($conn,$sql5);
$e5=mysqli_fetch_assoc($record5);
 
$sql6="SELECT * FROM user_information WHERE user_id = '$user_id1'"; 
$record6= mysqli_query($conn,$sql6);
$e6=mysqli_fetch_assoc($record6);


$server_name2=$e5['name'];
$user_name2=$e6['user_name'];
$priv2=$e5['private_ip'];
$pub2=$e5['public_ip'];
$mac_id2=$e5['mac_id'];
$user_designation2=$e6['user_designation'];
$user_room_no2=$e6['user_room_no'];
$user_landline_no2=$e6['user_landline_no'];
$user_mobile_no2=$e6['user_mobile_no'];
$user_section_id2=$e6['user_section_id'];

?>




<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Update Data</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <style>
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
      <img id="img2" src="images/IMD_LOGO.png"  width="80" height="75" align="centre">
    </div>

    <div style="margin-right: 10px;">
      <p id="imd"><strong> IP Search</strong><br>
        Indian Meteorogical Department

      </p>
    </div>
  </div>

  <div style="background-color: brown;padding: 6px;margin-top: -10px;"></div>
    <div class="form">

          <h1>Update DATA</h1>
          <table >
          
          <form action="update1.php" method="post">
              
          <!-- <div class="field-wrap">
            <label>
              New Password<span class="req">*</span>
            </label>
            <input type="text"required name="user_id" autocomplete="off" placeholder="User Id*" />
          </div> -->
          <tr><td><div class="field-wrap"><b><font size='4'>Server Name:</font></td>
            <!-- <label>
              New Password<span class="req">*</span>
            </label> -->
            <td><?php
            echo "<input type='text'required name='server_name' autocomplete='off' value='$server_name2' />";
            ?></td></tr>
          </div>

          <tr><td><div class="field-wrap"><b><font size='4'>User Name:</font>
            <td><?php
            echo"<input type='text'required name='user_name' autocomplete='off' value='$user_name2' />";
            ?>
          </div></td></tr>
              
          <tr><td><div class="field-wrap"><b><font size='4'>Private Ip:</font>
            <td><?php
            echo "<input type='text'required name='priv' autocomplete='off' value='$priv2' />";
            ?>
          </div></tr></td>

          <tr><td><div class="field-wrap"><b><font size='4'>Public Ip:</font>
           <td><?php
            echo "<input type='text' name='pub' autocomplete='off' value='$pub2' />";
            ?>
          </div></tr></td>

          
            <tr><td><div class="field-wrap"><b><font size='4'>Mac Id:</font>
            <td><?php
            echo "<input type='text' name='mac_id' autocomplete='off' value='$mac_id2' />";
          ?><td>
          </div></tr></td>

          <tr><td><div class="field-wrap"><b><font size='4'>Designation:</font>
           <td><?php
            echo "<input type='text' name='user_designation' autocomplete='off' value='$user_designation2' />";
            ?><td>
          </div></tr></td>


          <tr><td><div class="field-wrap"><b><font size='4'>Room No:</font>
            <td><?php
            echo "<input type='text' name='user_room_no' autocomplete='off' value='$user_room_no2' />";
          ?><td>
          </div></tr></td>

          <tr><td><div class="field-wrap"><b><font size='4'>Landline No:</font>
           <td><?php
            echo "<input type='text' name='user_landline_no' autocomplete='off' minlength='8' maxlength='11' value='$user_landline_no2' />";
          ?><td>
           </div></tr></td>

          <tr><td><div class="field-wrap"><b><font size='4'>Mobile No:</font>
           <td><?php
            echo"<input type='text' name='user_mobile_no'required autocomplete='off' minlength='10' maxlength='13' value='$user_mobile_no2' />";
          ?><td>
        </div></tr></td>


          <tr><td><div class="field-wrap"><b><font size='4'>Section Id:</font>
           <td><?php
            echo"<input type='text' name='user_section_id' autocomplete='off'value='$user_section_id2' />";
          ?><td>
        </div></tr></td>
          
          </table>
                     
          <button class="button button-block"/>Update</button>
          
           
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


$server_name1=$_POST['server_name'];
$user_name1=$_POST['user_name'];
$priv1=$_POST['priv'];
$pub1=$_POST['pub'];
$mac_id1=$_POST['mac_id'];
$user_designation1=$_POST['user_designation'];
$user_room_no1=$_POST['user_room_no'];
$user_landline_no1=$_POST['user_landline_no'];
$user_mobile_no1=$_POST['user_mobile_no'];
$user_section_id1=$_POST['user_section_id'];
$flag=0;
$flag1=0;

$sql="UPDATE ip SET name = '$server_name1' , private_ip = '$priv1', public_ip = '$pub1', mac_id = '$mac_id1' WHERE user_id = '$user_id1' ";
// $conn = new mysqli("localhost","root","","imd");
// $sql="INSERT INTO ip (user_id, name, private_ip, public_ip, mac_id) VALUES ('$user_id1', '$user_name1', '$priv1', '$pub1','$mac_id1')";
$record=mysqli_query($conn,$sql);
if ($record) {
    $flag=1;
  }



// $sql3="SELECT * FROM ip WHERE private_ip = '$priv1'"; 
// $record3= mysqli_query($conn,$sql3);
// $e1=mysqli_fetch_assoc($record3);
// $user_id1 = $e1['user_id'];
$sql1="UPDATE user_information SET user_name = '$user_name1', user_designation = '$user_designation1', user_room_no = '$user_room_no1' , user_landline_no = '$user_landline_no1', user_mobile_no = '$user_mobile_no1', user_section_id = '$user_section_id1'  WHERE user_id = '$user_id1'";


// $sql1="INSERT INTO user_information (user_id, user_name, user_designation, user_room_no, user_landline_no, user_mobile_no, user_section_id) VALUES ('$user_id1', '$user_name1', '$user_designation1', '$user_room_no1', '$user_landline_no1', '$user_mobile_no1', '$user_section_id1')";
$record1=$conn->query($sql1);
if ($record1) {
    $flag1=1;
  }


if ($flag===1 && $flag1===1) {
    // echo "<center><b> Row Inserted <b></center>";
    echo "<script>
    alert('Row Updated');
    window.location.href='profile.php';
    </script>";
}
} 


?>