<?php 

/**
 * Занимается формированием страницы пользователя
 */
	include_once '../models/CategoriesModel.php';
	include_once '../models/UsersModel.php';
	include_once '../models/PurchaseModel.php';
	include_once '../models/OrdersModel.php';


	function registerAction() {

		$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
		$email = trim($email);

		$pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
		$pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

		$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
		$adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
		$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;

		$name = trim($name);

		$resData = null;
		$resData = checkRegisterParams($email, $pwd1, $pwd2);

		if (! $resData && checkUserEmail($email)) {
			$resData['success'] = false;
			$resData['message'] = 'Пользователь с таким email уже существует';
		}

		if (!$resData) {
			$pwdMD5 = md5($pwd1);

			$userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);

			if ($userData['success']) {
				$resData['message'] = 'Пользователь успешно зарегистрирован';
				$resData['success'] = 1;

				$resData['userName'] = isset($userData['name']) && $userData['name'] != '' ? $userData['name'] : $email;
				$resData['email'] = $email;

				$_SESSION['user'] = $userData;
				$_SESSION['user']['displayName'] = isset($userData['name']) ? $userData['name'] :$userData['email'];
			} else {
				$resData['message'] = 'Ошибка регистрации';
				$resData['success'] = 0;
			}
		}

		echo json_encode($resData);
	}

	/**
	 * Выход из аккаунта
	 */

	function logoutAction() {
		if (isset($_SESSION['user'])) {
			unset($_SESSION['user']);
			unset($_SESSION['cart']);

		}

		redirect('/');
	}


	/**
	 * AJAX авторизация
	 *
	 * @return json
	 */
	function loginAction() {
		$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
		$email = trim($email);

		$pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
		$pwd = trim($pwd);

		$userData = loginUser($email, $pwd); 

		if ($userData['success']) {
			$_SESSION['user'] = $userData;
			$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

			$resData = $_SESSION['user'];
			$resData['success'] = 1;
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Неверный логин или пароль';
		}

		echo json_encode($resData);
	}

	function indexAction($smarty) {
		if (!isset($_SESSION['user'])) {
 			redirect('/');
		}

		$rsCategories = getAllMainCatsWithChildren();

		$rsUserOrders = getCurUserOrders();

		$smarty->assign('rsUserOrders', $rsUserOrders);
		$smarty->assign('rsCategories', $rsCategories);
		$smarty->assign('pageTitle', 'Страница пользователя');


		loadTemplate($smarty, 'header');
		loadTemplate($smarty, 'user');
		loadTemplate($smarty, 'footer');
	}

	function updateAction() {
		if (!isset($_SESSION['user'])) {
 			redirect('/');
		}

		$resData = [];
		$pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
		$pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
		$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
		$adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
		$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
		$curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;

		$curPwdMD5 = md5($curPwd);
		if (! $curPwd || $_SESSION['user']['pwd'] != $curPwdMD5) {
			$resData['success'] = 0;
			$resData['message'] = 'Пароль не введен или введен неверно';
			echo json_encode($resData);
			return false;
		}



		$res = updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwdMD5);
		if ($res) {
			$resData['success'] = 1;
			$resData['message'] = 'Данные сохранены успешно';
			$resData['userName'] = $name;

			$_SESSION['user']['name'] = $name;

			if ($pwd1 && ($pwd1 == $pwd2))
				$_SESSION['user']['pwd'] = md5($pwd1);
			$_SESSION['user']['phone'] = $phone;
			$_SESSION['user']['adress'] = $adress;
			$_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка при сохранении данных';
		}

		echo json_encode($resData);


	}



?>