<?php 

	session_start();

	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	//подключаем необходимые библиотеки
	require '../config/db.php';
	require_once '../config/config.php';
	require_once '../library/mainFunctions.php';

	$good = 1;
	//получаем имя контроллера
	$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

	if ($controllerName === 'Admin') {
		$good = 0;
		if ($_SESSION['user']['email'] === 'de') {
			$good = 1;
		}
	}
 
	if ($good) {
		//получаем имя экшена
		$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';


		if (isset($_SESSION['user'])) {
			$smarty->assign('arUser', $_SESSION['user']);
		}

		$smarty->assign('cartCntItems', count($_SESSION['cart']));

		loadPage($smarty, $controllerName, $actionName);
	}
?>
