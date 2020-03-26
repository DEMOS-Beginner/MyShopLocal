<?php 
	/**
	 * Модель для таблицы order
	 */

	function makeNewOrder($name, $phone, $adress) {
		require '../config/db.php';

		$userId = $_SESSION['user']['id'];
		$comment = "ID пользователя: $userId <br>
					Имя: $name <br>
					Телефон: $phone <br>
					Адрес: $adress"; //стоит оптимизировать 

		$dateCreated = date('Y.m.d H:i:s');
		$userIp = $_SERVER['REMOTE_ADDR']; //стоит оптимизировать

		$sql = 'INSERT INTO orders (user_id, date_created, date_payment, 
									status, comment, user_ip) VALUES (:user_id, :date_created,
									null, "0", :comment, :user_ip)';

		$query = $db->prepare($sql);
		$rs = $query->execute( array('user_id' => $userId, 'date_created'=>$dateCreated,
								'comment'=>$comment, 'user_ip'=>$userIp) );

		if ($rs) {
			$sql = 'SELECT id FROM orders ORDER BY id DESC LIMIT 1';
			$query = $db->prepare($sql);
			$query->execute();
			$rs = $query->fetchAll();

			if (isset($rs['0'])) {
				return $rs['0']['id'];
			}

		}

		return false;
	}

	function getOrdersWithProductsByUser($userId) {
		require '../config/db.php';
		$userId = intval($userId);
		if ($userId) {
			$sql = 'SELECT * FROM orders WHERE user_id = :id ORDER BY id DESC';
			$query = $db->prepare($sql);
			$query->execute( array('id'=>$userId) );
			$rs = $query->fetchAll();

		}


		for ($i=0; $i < count($rs); $i++) {
			$row = &$rs[$i];
			$rsChildren = getPurchaseForOrder($row['id']);
			if ($rsChildren) {
				$row['children'] = $rsChildren;
			}
		}


		return $rs;
	}

	function getPurchaseForOrder($orderId) {
		require '../config/db.php';


		$sql = 'SELECT `pe`.*, `ps`.name FROM purchase as pe
			JOIN products as ps ON `pe`.product_id = `ps`.id WHERE `pe`.order_id = :order_id';

		$query = $db->prepare($sql);
		$query->execute(array('order_id'=>$orderId));
		$rs = $query->fetchAll();
		return $rs;
	}




	function getOrders() {
		require '../config/db.php';
		$sql = 'SELECT `o`.*, `u`.name, `u`.email, `u`.phone, `u`.adress
				FROM orders AS `o`
				LEFT JOIN users AS `u` ON `o`.user_id = `u`.id
				ORDER BY id DESC';

		$query = $db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();

		$smartyRs = [];
		foreach ($result as $row) {
			$rsChildren = getProductsForOrder($row['id']);

			if ($rsChildren) {
				$row['children'] = $rsChildren;
				$smartyRs[] = $row;
			}
		}


		return $smartyRs;
	}



	function getProductsForOrder($orderId) {
		require '../config/db.php';
		$sql = 'SELECT * FROM purchase as pe LEFT JOIN products as ps on pe.product_id = ps.id
		WHERE order_id = :id';
		$query = $db->prepare($sql);
		$query->execute(array('id'=>$orderId));
		$result = $query->fetchAll();

		return $result;
	}



	function updateOrderStatus($id, $status) {
		require '../config/db.php';
		$status = intval($status);

		$sql = 'UPDATE orders SET status = :status WHERE id = :id';
		$query = $db->prepare($sql);
		$rs = $query->execute(array('status'=>$status, 'id'=>$id));

		return $rs;
	}

	function updateDatePayment($id, $datePayment) {
		require '../config/db.php';

		$sql = 'UPDATE orders SET date_payment = :dp WHERE id = :id';
		$query = $db->prepare($sql);
		$rs = $query->execute(array('dp'=>$datePayment, 'id'=>$id));

		return $rs;
	}
?>