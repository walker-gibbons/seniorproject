<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body style="background:rgb(255,129,0,0.5)">

<div>
<button onclick="document.location='/seniorpoject'">Home</button>
<button onclick="document.location='/seniorproject/map.php'">Interactive Map</button>
<button onclick="document.location='/seniorproject/list.php'">Full List of Programs</button>
<button onclick="document.location='/seniorproject/scholarships.php'">Scholarship Opportunities</button>
<button onclick="document.location='/seniorproject/contact.php'">Contact Us!</button>
</div>
<br>
<h1 style="border-left:solid 6px;border-color:red;">Map Page Test</h1>
<div>This is a test map with map pins to show potential Mercer Abroad trips, which can be updated through the "Contact" page or through an administrator.</div><br><br>

<div id="googleMap" style="border-radius:10px;width:70%;height:750px;position:absolute;right:5px"></div>

<script>
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqqgMYPlJxHxgrHCDFgVK3E-kIu2b0pM4&callback=myMap"></script>

<br>
<form action="/mapproj/coordpage.php">
<input type="submit" value="Enter your location on this page! (This would likely be removed)">
</form>

<br>

<style>
th {border:1px solid black;text-align:center;}
td {border:1px solid black;}
</style>

<table style="border:3px solid black;width:28%">
	<tr>
		<th>Program</th>
		<th>Major/Area</th>
		<th>Professor</th>
		<th>Info/Apply!</th>
	</tr>
	<tr>
		<td>Greece</td>
		<td>History</td>
		<td>Professorson</td>
		<td>*link here*</td>
	</tr>
</table>

<?php
$servername = "localhost";
$username = "root";
$password = "AA869Munchies$$";
$dbname = "ist351";

//create connection
$con = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($con ->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$xcoord = $_POST["xcoord"];
$ycoord = $_POST["ycoord"];
$comment = $_POST["comment"];
$sql = "INSERT INTO MapMarkers (Name, XCord, YCord, Comment)
	VALUES ('$name', '$xcoord', '$ycoord', '$comment')";

if ($con->query($sql) === TRUE) {
	echo "New record created successfully";
}

$query = "SELECT * FROM MapMarkers";
$result = $con->query($query);


?>


<script>
const arr = [];
<?php
while($row = $result->fetch_assoc()) {
	echo 'arr.push({XCord:'.$row["XCord"].',YCord:'.$row['YCord'].',Name:"'.$row["Name"].'",Comment:"'.$row["Comment"].'"});';
}
?>

function myMap(){
	var mapProp={
		center:new google.maps.LatLng(40.53,34.3), zoom:3
	}
	return new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

var InfoWindow = new google.maps.InfoWindow();
function createMarker(latlng,content){
	var marker = new google.maps.Marker({position: latlng, map:map});
	marker.addListener("click",()=>{
		InfoWindow.setContent(content);
		InfoWindow.open(map,marker);
	});
}

const map = myMap();
for(var entry of arr){
	var contentStr = `<h1>${entry["Name"]}</h1> <br/> <p>${entry["Comment"]}</p>`;
	var latlng = {lat: entry["XCord"], lng: entry["YCord"]};
	createMarker(latlng,contentStr);
}

</script>

</body>
</html>
