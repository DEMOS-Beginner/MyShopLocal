<?php 
/*
*
* Инициализация подключения к базе данных
*
*/

	$dblocation = '127.0.0.1';
	$dbname = 'myshop';
	$dbuser = 'root';
	$dbpassword = '';

	try {
		$db = new PDO("mysql:host=myshop.local;dbname=$dbname", $dbuser, $dbpassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	} catch (PDOException $e) {
		echo "Невозможно установить соединение с базой данных";
	}


?>