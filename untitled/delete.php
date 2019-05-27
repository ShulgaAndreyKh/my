<?php
require_once 'conn.php';
$query_delete = $pdo->prepare("DELETE FROM users WHERE id = ?");


$arr_query [] = $_GET['id'];
$query_delete->execute($arr_query);

header('location:userlist.php');
