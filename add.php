<?php
/* Password reset process, updates database with new user password */
require 'db.php';
session_start();

// Make sure the form is being submitted with method="post"
// if (isset($_POST['submit'])) {
  echo "<br>Row inserted";
  $name1=$_POST['name'];
$priv1=$_POST['priv'];
$pub1=$_POST['pub'];


// $servername = "localhost";
// $username = "root";
// $password = "GjjhoQj2oV3CSchd";

$conn = new mysqli("localhost","root","GjjhoQj2oV3CSchd","imd");
$sql="INSERT INTO ip (name, private_ip, public_ip) VALUES('$name1', '$priv1', '$pub1')";
$record=$conn->query($sql);

  
// }
?>
