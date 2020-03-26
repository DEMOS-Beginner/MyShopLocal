<?php 
/**
*
* Модель для таблицы категорий (categories)
*
*/


	/**
	*
	* Получает все дочерние категории для категории с указанным id
	*
	* @param int $id - id родительской категории
	*/	
	function getChildrenForCatById($catId) {
		require '../config/db.php';

		$sql = "SELECT * FROM categories WHERE parent_id = :id";
		$query = $db->prepare($sql);
		$query->execute( array('id'=>$catId) );
		$childCats = $query->fetchAll(PDO::FETCH_ASSOC);

		return $childCats;

	}



	/**
	*
	* Получает все категории с их дочерними категориями
	*
	*/
	function getAllMainCatsWithChildren() {
		require '../config/db.php';

		$sql = "SELECT * FROM categories WHERE parent_id = 0";
		$cats = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

		foreach ($cats as $i => $cat) {
			$rsChildren = getChildrenForCatById($cat['id']);

			if ($rsChildren) {
				$cat['children'] = $rsChildren;
			}

			$cats[$i] = $cat;
		}
		
		return $cats;
	}

	/**
	*
	* Получает все главные категории
	*
	*/
	function getAllMainCategories() {
		require '../config/db.php';

		$sql = "SELECT * FROM categories WHERE parent_id = 0";
		$cats = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

		return $cats;
	}

	/**
	*
	* Получает все категории
	*
	*/
	function getAllCategories() {
		require '../config/db.php';

		$sql = "SELECT * FROM categories ORDER BY parent_id ASC";
		$cats = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

		return $cats;
	}

	/**
	 * Возвращает категории, полученную по ID
	 *
	 * @param int $id - идентификатор категории
	 * @return array - строка категории
	 */
	function getCatById($id) {
		require '../config/db.php';

		$catId = intval($id);
		$sql = 'SELECT * FROM categories WHERE id = :id';
		$query = $db->prepare($sql);
		$query->execute( array( 'id' => $catId ) );
		$result = $query->fetch(PDO::FETCH_ASSOC);

		return $result;

	}


	function insertCat($catName, $catParentId = 0) {
		require '../config/db.php';

		$sql = 'INSERT INTO categories (parent_id, name) VALUES (:parent_id, :name)';

 		$query = $db->prepare($sql);
 		$query->execute(array('parent_id'=>$catParentId, 'name'=>$catName));

 		$id = $db->lastInsertId();

 		return $id;
	}

	function updateCategoryData($itemId, $parentId = -1, $newName = '') {
		require '../config/db.php';
	
		$set = array();
		if ($newName) {
			$set[] = "name = '{$newName}'";
		}

		if ($parentId > -1) {
			$set[] = "parent_id = '{$parentId}'";
		}

		$setStr = implode($set, ', ');
		$sql = "UPDATE categories SET {$setStr} WHERE id = :id";
		$query = $db->prepare($sql);
		$rs = $query->execute( array('id'=>$itemId) );

		return $rs;
	}

?>