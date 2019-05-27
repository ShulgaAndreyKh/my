<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/my.css">
</head>

<body>
<div class="container">
	<a href="userList.php">Back</a>

	<h2> Edit entry</h2>

	<form id="form1" class="form" enctype="multipart/form-data" method="post" action="processing.php?id=<?php echo $_GET['id'] ?>">

		<p>
			<input name="name" type="text" placeholder="Your name" size="50">
		</p>
		<p>
			<input name="address" type="text" placeholder="Address" size="50">
		</p>
		<p>
			<img id="img" src="#" alt="Choose a file"/>
			<input name="pic" type="file" id="pic" style="color:transparent;" onchange="this.style.color = 'inherit';">
		</p>

		<?php

		if(!empty($_GET['message'])) {
			echo base64_decode($_GET['message']);
		}
		?>

		<button class="btn btn-light" name="edit" type="submit" value="Submit">Submit</button>
		<a href="userList.php">Cancel</a>
	</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>


