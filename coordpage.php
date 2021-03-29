<!DOCTYPE html>
<html>
<body>

<h1>Input your custom Google Maps Marker here!*</h1>
<h2>*this page would be accessible only to admin users</h2>
<form action="index.php" method="post">
  <label for="name">Location:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for "xcoord">Latitude:</label>
  <input type="number" step="0.0001" id="xcoord" name="xcoord"><br><br>
  <label for "ycoord">Longitude:</label>
  <input type="number" step="0.0001" id="ycoord" name="ycoord"><br><br>
  <label for "comment">Comment:</label>
  <input type="text" id="comment" name="comment"><br><br>
  <input type="submit" value="Submit">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "AA869Munchies$$";
$dbname = "ist351";

  //create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
  //check connection
  if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error);
  }
?>

</body>
</html>
