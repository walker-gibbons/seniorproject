<!DOCTYPE html>
<html>
<body>

<h1>My First Google Map</h1>
<h2>This would be only accessible by admin users.</h2>

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
	var mapProp= {
	  center:new google.maps.LatLng(51.508742,-0.120850),
		    zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqqgMYPlJxHxgrHCDFgVK3E-kIu2b0pM4&callback=myMap" type="text/javascript"></script>

</body>
</html>
