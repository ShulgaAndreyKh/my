<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/my.css">

	<title></title>

</head>
<body>

<div class="container">
	<a href="map.php">back</a> | <a href="formAdd.php">add</a>

	<table class=" table table-dark table-bordered">

		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Address</th>
			<th class="">Actions</th>
		</tr>
		<?php
		require_once 'conn.php';
		$arr = $pdo->query("SELECT * FROM users")->fetchAll();
		for($q = 0; $q < count($arr); $q++) {
			?>

			<tr>
				<td class="text-center">
					<input type="hidden" name="path" value="<?php echo $arr[$q]['path'] ?>">
					<img src="<?php echo $arr[$q]['path'] ?>" alt="photo">
				</td>
				<td>
					<input type="hidden" name="name" value="<?php echo $arr[$q]['name'] ?>">
					<?php echo $arr[$q]['name'] ?>
				</td>
				<td>
					<input type="hidden" name="address" value="<?php echo $arr[$q]['address'] ?>">
					<?php echo $arr[$q]['address'] ?>
				</td>
				<td class="text-center">
					<a id="delete" href="delete.php?id=<?php echo $arr[$q]['id'] ?>"
					   onclick="return window.confirm('Are you shure to want to delete this entry?')">Delete</a>
					<a id="edit" href="formEdit.php?id=<?php echo $arr[$q]['id'] ?>" >Edit</a>
				</td>
			</tr>

			<?php
		}
		echo '</table>';
		?>

</body>
</html>
