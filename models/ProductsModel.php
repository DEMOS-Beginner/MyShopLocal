<?php 
/**
*
* Модель для таблицы продуктов (products)
*
*/ 



	function getProductsFromCartArray($itemIds) {
		require '../config/db.php';

		$products = [];

		$sql = 'SELECT * FROM products WHERE id = :id and status = 1';
		$query = $db->prepare($sql);
		foreach($itemIds as $id) {
			$query->execute( array( 'id' => $id ) );
			$products[] = $query->fetch(PDO::FETCH_ASSOC);
		}


		return $products;
	}


	/**
	 * Получает последние добавленные товары
	 *
	 * @param int $limit - лимит выводимых товаров
	 * @return array - массив товаров
	 */
	function getLastProducts($limit = null) {
		require '../config/db.php';

		$sql = 'SELECT * FROM products WHERE status = 1 ORDER BY id DESC';

		if ($limit) {
			$sql .= " LIMIT {$limit}";
		}
		$rs = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

		return $rs;

	}


	/**
	 *
	 * Получает продукты по id категории
	 *
	 * @param int $catId - id родительской категории
	 * @return array - продукты категории
	 */	
	function getProductsByCatId($catId) {
		require '../config/db.php';

		$catId = intval($catId);

		$sql = 'SELECT * FROM products WHERE category_id = :id and status = 1';
		$query = $db->prepare($sql);
		$query->execute( array( 'id' => $catId ) );
		$result = $query->fetchAll(PDO::FETCH_ASSOC);


		return $result;

	}


 	/**
 	 * Возвращает продукт по id
 	 * @param int $id - идентификатор продукта
 	 */
	function getProductById($id) {
		require '../config/db.php';

		$id = intval($id);

		$sql = 'SELECT * FROM products WHERE id = :id and status = 1';
		$query = $db->prepare($sql);
		$query->execute( array( 'id' => $id ) );
		$result = $query->fetch(PDO::FETCH_ASSOC);

		return $result;
	}


	/**Возвращает продукты*/
	function getProducts() {
		require '../config/db.php';

		$sql = "SELECT * FROM products WHERE status = 1 ORDER BY category_id";
		$query = $db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		return $result;		

	}

	function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat) {
		require '../config/db.php';

		$sql = 'INSERT INTO products (name, price, description, category_id) VALUES (:name, :price, :description, :cat)';
		$query = $db->prepare($sql);
		$rs = $query->execute( array('name'=>$itemName, 'price'=>$itemPrice, 'description'=>$itemDesc,
			'cat'=>$itemCat) );

		return $rs;
	}




	function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = null)
	{
		require '../config/db.php';

		$set = array();

		if ($itemName) {
			$set[] = "name = '{$itemName}'";
		}

		if ($itemPrice > 0) {
			$set[] = "price = '{$itemPrice}'";
		}

		if ($itemStatus !== null) {
			$set[] = "status = '{$itemStatus}'";
		}

		if ($itemDesc) {
			$set[] = "description = '{$itemDesc}'";
		}

		if ($itemCat) {
			$set[] = "category_id = '{$itemCat}'";
		}
		if ($newFileName) {
			$set[] = "image = '{$newFileName}'";
		}

		$setStr = implode($set, ', ');
		$sql = "UPDATE products SET $setStr WHERE id = :id";
		$query = $db->prepare($sql);
		$rs = $query->execute( array('id'=>$itemId));

		return $rs;
	}

	function updateProductImage($itemId, $newFileName) {
		$rs = updateProduct($itemId, null, null, null, null, null, $newFileName);
		return $rs;
	}

?>

