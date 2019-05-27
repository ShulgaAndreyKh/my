<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta http-equiv="content-type" content="text/html; charset=cp1251">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/my.css">
</head>

<?php
require_once 'conn.php';

$arr = $pdo->query("SELECT * FROM users")->fetchAll();

?>

<body>
<div class="container">
	<a href="formAdd.php">add</a> | <a href="userList.php">list</a>
</div>

<div id="map"></div>

<script type="text/javascript">

	function initMap() {
		var el = document.getElementById('map');
		var opt = {
			zoom: 14,
			center: {lat: 49.992609, lng: 36.230682}

		};

		var map = new google.maps.Map(el, opt);


		addMrker({
			coordinates: {lat: 49.991015, lng: 36.229191},
			infoW: "<div style='float:left'><img src=<?php echo $arr[0]['path']?>></div>" +
				"<div style='float:right; padding: 10px;'><h6><?php echo $arr[0]['name'] ?></h6>" +
				"<h6><?php echo $arr[0]['address'] ?></h6></div>"
		});

		addMrker({
			coordinates: {lat: 49.992609, lng: 36.230682},
			infoW: "<div style='float:left'><img src=<?php echo $arr[1]['path']?>></div>" +
				"<div style='float:right; padding: 10px;'><h6><?php echo $arr[1]['name'] ?></h6></div>" +
				"<h6><?php echo $arr[1]['address'] ?></h6></div>"
		});

		addMrker({
			coordinates: {lat: 49.994609, lng: 36.230682},
			infoW: "<div style='float:left'><img src=<?php echo $arr[2]['path']?>></div>" +
				"<div style='float:right; padding: 10px;'><h6><?php echo $arr[2]['name'] ?></h6></div>" +
				"<h6><?php echo $arr[2]['address'] ?></h6></div>"
		});


		function addMrker(param) {
			var marker = new google.maps.Marker({
				position: param.coordinates,
				map: map,
			});


			var InfoWindow = new google.maps.InfoWindow({
				content: param.infoW
			});


			marker.addListener('click', function () {
				InfoWindow.open(map, marker);

			})
		}

	}


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpHEaTPzwEgllg3GZOsq7R0CZ7IJth5vI&callback=initMap"
		async defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>