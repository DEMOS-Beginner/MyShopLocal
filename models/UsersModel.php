<?php 

/**
 * Содержит функции для работы с пользователями
 */

	/**
	 * @param string $email - email пользователя
	 * @param string $pwdMD5 - хешированный пароль пользователя
	 * @param string $name - имя пользователя
	 * @param string $phone - номер телефона
	 * @param string $adress - адрес
	 * @return array - массив данных пользователя
	 */
	function registerNewUser($email, $pwdMD5, $name, $phone, $adress) {
		require '../config/db.php';

		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$name = filter_var($name, FILTER_SANITIZE_STRING);
		$phone = filter_var($phone, FILTER_SANITIZE_STRING);
		$adress = filter_var($adress, FILTER_SANITIZE_STRING);

		$sql = 'INSERT INTO users (email, pwd, name, phone, adress) VALUES (:email, :pwd, :name, :phone, :adress)';
		$query = $db->prepare($sql);
		$rs = $query->execute( array(
			'email' => $email,
			'pwd' => $pwdMD5,
			'name' => $name,
			'phone' => $phone,
			'adress' => $adress) );


		if ($rs) {
			$sql = 'SELECT * FROM users WHERE email = :email AND pwd = :pwd LIMIT 1';
			$query = $db->prepare($sql);
			$query->execute( array('email'=>$email, 'pwd'=>$pwdMD5) );
			$rs = $query->fetch();

			if ( isset($rs[0]) )$rs['success'] = 1;
			else $rs['success'] = 0;
		} else {
			$rs['success'] = 0;
		}

		return $rs;

	}




	/**
	 * Проверяет, вводили ли параметры регистрации
	 * @param string $email - email
	 * @param string $pwd1 - password
	 * @param string $pwd2 - password 2
	 * @return array result
	 */
	function checkRegisterParams($email, $pwd1, $pwd2) {
		$res = null;

		if (! $email) {
			$res['success'] = false;
			$res['message'] = 'Введите Email';
		}

		if (! $pwd1) {
			$res['success'] = false;
			$res['message'] = 'Введите пароль!';
		}

		if (! $pwd2) {
			$res['success'] = false;
			$res['message'] = 'Подтвердите пароль!';
		}

		if ($pwd1 !== $pwd2) {
			$res['success'] = false;
			$res['message'] = 'Пароли не совпадают';
		}

		return $res;
	}


	/**
	 * Ищет email в бд
	 */
	function checkUserEmail($email) {
		require '../config/db.php';

		$sql = 'SELECT * FROM users WHERE email = :email';
		$query = $db->prepare($sql);
		$query->execute( array( 'email' => $email ) );
		$result = $query->fetch(PDO::FETCH_ASSOC);

		return $result;
	}


	/**
	 * Выполняет авторизацию пользователя
	 */
	function loginUser($email, $pwd) {
		require '../config/db.php';
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$pwd = md5($pwd);

		$sql = 'SELECT * FROM users WHERE email = :email AND pwd = :pwd';
		$query = $db->prepare($sql);
		$query->execute( array('email'=>$email, 'pwd'=>$pwd) );
		$rs = $query->fetch();
		if (isset($rs[0])) $rs['success'] = 1;
		else $rs['success'] = 0;

		return $rs;
	}

	/**Изменяет данные пользователя*/
	function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd) {
		require '../config/db.php';

		$email = filter_var($_SESSION['user']['email'], FILTER_SANITIZE_EMAIL);
		$name = filter_var($name, FILTER_SANITIZE_STRING);
		$phone = filter_var($phone, FILTER_SANITIZE_STRING);
		$adress = filter_var($adress, FILTER_SANITIZE_STRING);
		$pwd1 = trim($pwd1);
		$pwd2 = trim($pwd2);

		$newPwd = null;
		if ($pwd1 && ($pwd1 == $pwd2)) {
			$newPwd = md5($pwd1);
		} else if (! $pwd1) {
			$newPwd = $curPwd;
		}

		$sql = 'UPDATE users SET ';

		if ($newPwd) {
			$sql .= "pwd = '{$newPwd}', ";
		}

		$sql .= 'name = :name, phone = :phone, adress = :adress, pwd = :pwd WHERE email = :email AND pwd = :curPwd LIMIT 1';
		$query = $db->prepare($sql);
		$rs = $query->execute( array('name'=>$name, 'phone'=>$phone, 'adress'=>$adress, 'email'=>$email,
		'curPwd'=>$curPwd, 'pwd'=>$newPwd ) );

		return $rs;

	}


	function getCurUserOrders() {
		$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
		$rs = getOrdersWithProductsByUser($userId);

		return $rs;
	}

?>