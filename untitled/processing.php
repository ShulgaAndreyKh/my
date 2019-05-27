<?php
require_once 'conn.php';

$query_ins = $pdo->prepare("INSERT INTO users ( name, address, path) VALUES ( ?, ?, ?)");
$query_upd = $pdo->prepare("UPDATE users SET name = ?, address = ?, path = ? WHERE id = ?");
$tmp = $_FILES['pic']['tmp_name'];
$fileSize = 2000000;


if(strlen($_POST['name']) !== 0 && strlen($_POST['address']) !== 0) {
	if(intval($_POST['name']) == 0 && intval($_POST['address']) == 0){
		if(is_uploaded_file($_FILES['pic']['tmp_name'])) {
			if($_FILES['pic']['error'] == 0) {
				if($_FILES['pic']['size'] < $fileSize) {
					move_uploaded_file($tmp, 'pics/'.$_FILES['pic']['name']);

					$arr [] = $_POST['name'];
					$arr [] = $_POST['address'];
					$arr [] = 'pics/'.$_FILES['pic']['name'];

					if(empty($_POST['edit'])) {
						$query_ins->execute($arr);
					}
					else {
						$arr [] = $_GET['id'];
						$query_upd->execute($arr);
					}
				}
				else {
					$message = 'Размер файла не больше 2мб';
				}
			}
			else {
				$message = 'Ошибка в $_FILES';
			}
		}
		else {
			$message = 'Файл не выбран!';
		}
	}
	else {
		$message = 'Только символы алфавита';
	}
}
else {
	$message = 'Заполните все поля';
}

if(empty($_POST['edit'])) {
	header('location:formadd.php?message='.base64_encode($message).'');
}else{
	header('location:formedit.php?message='.base64_encode($message).'');
}

if(empty($message)){
	header('location:map.php');
}
