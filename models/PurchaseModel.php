<?php 
	/**
	 * Модель для работы с заказами
	 */

	function setPurchaseForOrder($orderId, $cart) {
		require '../config/db.php';
		$sql = 'INSERT INTO purchase (order_id, product_id, price, amount) VALUES ';
		$values = array();

		foreach ($cart as $item) {
			$values[] = "({$orderId}, {$item['id']}, {$item['price']}, {$item['cnt']})";
		}

		$sql .= implode($values, ', ');

		$rs = $db->query($sql);

		return $rs;
	}
 ?>