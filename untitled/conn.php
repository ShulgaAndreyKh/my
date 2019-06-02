<?php

$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try{
	$pdo = new PDO("mysql:host=127.0.0.1; dbname=table", "mysql", "mysql" , $opt);
}catch(PDOException $e){
	echo "Connect ERROR" . $e->getMessage();
}