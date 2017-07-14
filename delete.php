<html>
<body>

<form action="delete.php" method="POST">
	<table  border='2'>
    
    <tr><td>Enter PRIVATE IP Address :</td><td><input type="text" value="" name="priv"></td></tr><br>
  </table>
  <input type="submit" name="submit" value="Delete"/>
	<br>


<?php
 if (isset($_POST['submit'])) {
  echo "<br>Row Deleted";
  
$priv1=$_POST['priv'];



$servername = "localhost";
$username = "root";
$password = "GjjhoQj2oV3CSchd";

$conn = new mysqli("localhost","root","GjjhoQj2oV3CSchd","mydatabase1");
$sql="DELETE FROM ip WHERE private_ip='$priv1' ";
$record=$conn->query($sql);

  
}

?>


</form>
</table>
</body>
</html>
