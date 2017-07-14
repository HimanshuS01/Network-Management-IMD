<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title>ISSD</title>
  <link rel="stylesheet" type="text/css" href="ip_search_website_css.css">
  <style>
     
    input{
      height: 30px;
      width: 160px;
      font-size: 14px;
      border: 1px solid #000;

    }
    input[type=submit]{
      height: 23px;
      width: 55px;
      font-size: 14px;
      border: 1px solid #000;
      margin-left: 40px;
      margin-top: 10px;
    }
    select{
      border: 1px solid #000;
      font-size: 14px;
      height: 30px;
      width: 160px;

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
 <a href="http://localhost:8082/MyFiles/login-system/profile.php"><img src="images/IMD_LOGO.png"  width="80" height="75" align="centre"> </a>    </div>

    <div style="margin-right: 10px;">
      <p id="imd"><strong> IP Search</strong><br>
        Indian Meteorogical Department

      </p>
    </div>
  </div>

  <div style="background-color: brown;padding: 6px;margin-top: -10px;"></div>

  <div id="main">
 
    <div id="nav">

    <nav>

      <form action="" method="POST" style="width: 180px;">
        <br>
        <select name='ip_type' >
         <b><option value="private_ip">Select IP</option></b>    
         <option value="private_ip">Private Ip</option>
         <option value="public_ip">Public Ip</option>
       </select>

       <br>

       <br><br> 
       <input type="text" size='16' value= "<?php echo isset($_POST['priv']) ? $_POST['priv'] : '' ?>" name="priv" placeholder="Enter IP Address" >

       <input type="submit" name="submit" value="Go"/>



       <br>
       <br><br>
       <input type="text" size='16' value="<?php echo isset($_POST['network_name']) ? $_POST['network_name'] : '' ?>" name="network_name" placeholder="Enter Network Name">

       <input type="submit" name="submit" value="Go"/>

       <br>
       <br><br>
       <input type="text" size='16' value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : '' ?>" name="user_name" placeholder="Enter User Name">

       <input type="submit" name="submit" value="Go"/>

       <br>
       <br><br>
       <input type="text" size='16' value="<?php echo isset($_POST['room_number']) ? $_POST['room_number'] : '' ?>" name="room_number" placeholder="Enter Room No">
       <input type="submit" name="submit" value="Go"/>


       <?php
       $flag = false;
       if (isset($_POST['ip_type'])) {
        $val = $_POST["ip_type"];
        $flag = true;
      }

      if (!$flag) {
       // echo "all fields are required";
      } 

      else {
       $servername = "localhost";
       $username = "root";
       $password = "GjjhoQj2oV3CSchd";

       $conn = new mysqli("localhost","root","GjjhoQj2oV3CSchd","imd");
       $sql="SELECT * FROM ip";
       $record=$conn->query($sql);

       $pr=trim($_POST['priv']);       
       $prlen=strlen($pr);

       $NetworkName=trim($_POST['network_name']);
       $network_name_length=strlen($NetworkName);

       $userName = trim($_POST['user_name']);
       $userName_length = strlen($userName);

       $room_number = trim($_POST['room_number']);
       $room_number_length = strlen($room_number);
       ?>

     </form>

    </nav>
  </div>

    <div id="article">
      <article><p align="center" ><font size="6" style="color: cadetblue;font-weight: bold; top: 1750px"><br> ISSD</b></font></p>

      <table align = "center">
      <!-- <tr>
        <th>NAME</th>
        <th>PRIVATE_IP</th>
        <th>PUBLIC_IP</th>
      </tr> -->

      <?php

      if (isset($_POST['add'])) {
        include "add1.php";
        # code...
      }

      function prin($e1){

        echo "<tr>";
        echo "<td>",$e1['name'],"</td>";
        echo "<td>",$e1['private_ip'],"</td>";
        echo "<td>",$e1['public_ip'],"</td>";
        echo "<td>",$e1['mac_id'],"</td>";
        echo "<td>",$e1['user_name'],"</td>";
        echo "<td>",$e1['user_designation'],"</td>";
        echo "<td>",$e1['user_room_no'],"</td>";
        echo "<td>",$e1['user_landline_no'],"</td>";
        echo "<td>",$e1['user_mobile_no'],"</td>";
        echo "<td>",$e1['user_section_id'],"</td>";
        // echo "<td>",$e1['SUBSTRING(name,1,$network_name_length)'],"</td>";
        echo "</tr>";
      }

      function displayTable(){
        echo "<table align = 'center' border='2' width='240'>
        <tr>
        <th>NAME</th>
        <th>PRIVATE_IP</th>
        <th>PUBLIC_IP</th>
        <th>MAC_ID</th>
        <th>USER_NAME</th>
        <th>DESIGNATION</th>
        <th>ROOM_N0</th>
        <th>LANDLINE_NO</th>
        <th>MOBILE_NO</th>
        <th>SECTION_ID</th>
        </tr>";
      }

      if($pr!="" && $val!=""){
        if ($val==="private_ip") {

          $sql1 = "SELECT name,private_ip,public_ip,mac_id ,SUBSTRING(private_ip,1,$prlen),
          user_name,user_designation,user_room_no,user_landline_no,user_mobile_no,user_section_id 
          FROM ip AS i INNER JOIN user_information AS u ON  i.user_id = u.user_id"; 

         //$sql1="SELECT user_id,name,private_ip,public_ip,mac_id,SUBSTRING(private_ip,1,$prlen) FROM ip"; 

          $record1= mysqli_query($conn,$sql1);
          $num_rows = mysqli_num_rows($record1);

          $e2=mysqli_fetch_assoc($record1);
          // $isIpExists = true;
          // while($e2=mysqli_fetch_assoc($record1)){

          //   if($e2['SUBSTRING(private_ip,1,'.$prlen.')']===$pr){
          //     $isIpExists=true;
          //     break;
          //   }
          //   else{
          //     $isIpExists=false;
          //   }
          // }
          // if($isIpExists){
            displayTable();
            
            while ($e1=mysqli_fetch_assoc($record1)) {  

              if ($e1['SUBSTRING(private_ip,1,'.$prlen.')']===$pr) {  

                prin($e1);
              } 

            }
          // }
          // else{
          //    echo "<center> <font size='6' style='color: cadetblue;'>No record found </center></font>";
          // }
        }

        else if ($val==="public_ip") {
          $sql1 = "SELECT name,private_ip,public_ip,mac_id ,SUBSTRING(public_ip,1,$prlen),
          user_name,user_designation,user_room_no,user_landline_no,user_mobile_no,user_section_id 
          FROM ip AS i INNER JOIN user_information AS u ON  i.user_id = u.user_id"; 
       // $sql1="SELECT user_id,name,private_ip,public_ip,mac_id,SUBSTRING(public_ip,1,$prlen) FROM ip"; 

          $record1= mysqli_query($conn,$sql1);
          $e2=mysqli_fetch_assoc($record1);
          // $isIpExists = true;
          // while($e2=mysqli_fetch_assoc($record1)){

          //   if($e2['SUBSTRING(public_ip,1,'.$prlen.')']===$pr){
          //     $isIpExists=true;
          //     break;
          //   }
          //   else{
          //     $isIpExists=false;
          //   }
          // }

          // if($isIpExists){
            displayTable();

            while ($e1=mysqli_fetch_assoc($record1)) {  

              if ($e1['SUBSTRING(public_ip,1,'.$prlen.')']===$pr) { 

                prin($e1);
              }
            }
        //   }
        //   else{
        //     echo "<center> <font size='6' style='color: cadetblue;'>No record found </center></font>";
        // }
      }
    }

    else if($NetworkName!==""){
        $sql2 = "SELECT name,private_ip,public_ip,mac_id ,
        user_name,user_designation,user_room_no,user_landline_no,user_mobile_no,user_section_id 
        FROM ip AS i INNER JOIN user_information AS u ON  i.user_id = u.user_id"; 
    // $sql2="SELECT user_id,name,private_ip,public_ip,mac_id FROM ip";
    // WHERE LOWER(name)= LOWER('$NetworkName') "; 
    // echo $sql2;
        $record2= mysqli_query($conn,$sql2);

        // $e2=mysqli_fetch_assoc($record2);
          // $isNetworkNameExists = true;
          // while($e2=mysqli_fetch_assoc($record2)){

          //   $names=$e2['name'];

          //   if(strpos(strtolower($names),strtolower($NetworkName))!==false){
          //     $isNetworkNameExists=true;
          //     break;
          //   }
          //   else{
          //     $isNetworkNameExists=false;
          //   }
          // }

        // if($isNetworkNameExists){
          displayTable();
          while ($e1=mysqli_fetch_assoc($record2)) {

            $names=$e1['name'];
      // echo $names;
            if(strpos(strtolower($names),strtolower($NetworkName))!==false){
      // if($e2['SUBSTRING('.$e2['name'].',1,'.$network_name_length.')']===$NetworkName){
              prin($e1);
            }
          }
        // }
        // else{
        //   echo "<center> <font size='6' style='color: cadetblue;'>No record found </center></font>";
        // }
      }


      else if($userName!==""){
        $sql2 = "SELECT name,private_ip,public_ip,mac_id ,
        user_name,user_designation,user_room_no,user_landline_no,user_mobile_no,user_section_id 
        FROM ip AS i INNER JOIN user_information AS u ON  i.user_id = u.user_id"; 
    // $sql2="SELECT user_id,name,private_ip,public_ip,mac_id FROM ip";
    // WHERE LOWER(name)= LOWER('$NetworkName') "; 
    // echo $sql2;
        $record2= mysqli_query($conn,$sql2);

        // $e2=mysqli_fetch_assoc($record2);
          // $isUserNameExist = true;
          // while($e2=mysqli_fetch_assoc($record2)){

          //   $names=$e2['user_name'];

          //   if(strpos(strtolower($names),strtolower($userName))!==false){
          //     $isUserNameExist=true;
          //     break;
          //   }
          //   else{
          //     $isUserNameExist=false;
          //   }
          // }

        // if($isUserNameExist){
          displayTable();
          while ($e1=mysqli_fetch_assoc($record2)) {

            $names=$e1['user_name'];
      // echo $names;
            if(strpos(strtolower($names),strtolower($userName))!==false){
      // if($e2['SUBSTRING('.$e2['name'].',1,'.$network_name_length.')']===$NetworkName){
              prin($e1);
            }
          //}
        }
        // else{
        //   echo "<center> <font size='6' style='color: cadetblue;'>No record found </center></font>";
        // }
      }

      else if($room_number!==""){
        $sql2 = "SELECT name,private_ip,public_ip,mac_id ,
        user_name,user_designation,user_room_no,user_landline_no,user_mobile_no,user_section_id 
        FROM ip AS i INNER JOIN user_information AS u ON  i.user_id = u.user_id"; 
    // $sql2="SELECT user_id,name,private_ip,public_ip,mac_id FROM ip";
    // WHERE LOWER(name)= LOWER('$NetworkName') "; 
    // echo $sql2;
        $record2= mysqli_query($conn,$sql2);

        // $e2=mysqli_fetch_assoc($record2);
          // $isRoomNumber = true;
          // while($e2=mysqli_fetch_assoc($record2)){

          //   $names=$e2['user_room_no'];

          //   if(strpos(strtolower($names),strtolower($room_number))!==false){
          //     $isRoomNumber=true;
          //     break;
          //   }
          //   else{
          //     $isRoomNumber=false;
          //   }
          // }

        // if($isRoomNumber){
          displayTable();
          while ($e1=mysqli_fetch_assoc($record2)) {

            $roomNumber=$e1['user_room_no'];
      // echo $names;
            if(strpos(strtolower($roomNumber),strtolower($room_number))!==false){
      // if($e2['SUBSTRING('.$e2['name'].',1,'.$network_name_length.')']===$NetworkName){
              prin($e1);
            }
          }
        // }
        // else{
        //   echo "<center> <font size='6' style='color: cadetblue;'>No record found </center></font>";
        // }
      }

    }
    ?>
  </table>

    <?php
    /* Displays user information and some useful messages */
    //session_start();
    // Check if user is logged in using the session variable
    
    if($_SESSION['logged_in'] = 1){
        // Makes it easier to read 
      if ($_SESSION['flagemail']===0) {
        $email = $_SESSION['email'];
        $_SESSION['printfirstname']=$_SESSION['firstname'];
      $_SESSION['flagemail']=1;
      }
      

    }
    require 'db.php';

    if(isset($_SESSION['email'])){
      $flag=0;

      if ((time() - $_SESSION['loggedin_time']) > 1200) {
        $_SESSION['flag']=1;
        if ($_SESSION['flag']===1) {
          $_SESSION['msg'] = "<b><center> Session Timed out. Please Login again! </center></b>";
          header("location: index.php");
        }
        // $flag=0;
        header("location: index.php");
        

      }

      //style="position: absolute;top: 94px;margin-left: 182px;

      else{

        $fl=0;
        $_SESSION['loggedin_time'] = time();
        // echo "<div id='aside'>";
        echo "<h2><center><font size='5' style='color: cadetblue;position: absolute;top: 113px;margin-left: 350px;'
        ><b>Welcome  ".$_SESSION['printfirstname']." </b></font></center></h2>";
        
      }
    }
    else{
      header("location: index.php");
    } 
    ?>


  </article>
</div>

 <div id="aside">  
  <aside>

    <?php 
    if ( $_SESSION['logged_in'] != 1 ) {  
      echo "<center> You must log in before viewing your profile page! </center>";  
    }
    else {
        // Makes it easier to read 
      $email = $_SESSION['email'];

    }
    require 'db.php';

    if(isset($_SESSION['email'])){
      $flag=0;
      $_SESSION['flag']=0;

      if ((time() - $_SESSION['loggedin_time']) > 1200) {
        $_SESSION['flag']=1;
        if ($_SESSION['flag']===1) {
          $_SESSION['msg'] = "<b><center> Session Timed out. Please Login again! </center></b>";
          header("location: index.php");
        }
        // $flag=0;
        header("location:index.php");
        

      }
      else{
        $_SESSION['loggedin_time'] = time();
        echo "<div class='dropdown' style='float:right;'>";
        if($_SESSION['type'] == "admin"){
          echo "<button class='drpbtn'>Admin</button> ";
        } 
        else{
          echo "<button class='drpbtn'>User</button>";
        } 
        echo "<div class='dropdown-content'>";
        echo "<a href='reset.php'>Reset Password</a>";
        if($_SESSION['type'] == "admin"){
          echo "<a href='register_form.php'>Add User</a>";
          echo "<a href='reset_user.php'>Change Password for User</a>";
          echo "<a href='add1.php'>Add Data</a>";
          echo "<a href='delete1.php'>Delete Data</a>";
          echo "<a href='update.php'>Update Data</a>";
        }
        echo "<a href='logout.php'>Log Out</a>";
        echo "</div>";
        echo "</div>";
      }
    }
    else{
      header("location: index.php");
    }

    ?>
  </aside>
</div>
</div>
</form>
</body>
</html>
