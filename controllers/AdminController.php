<?php 

	/**Контроллер админки */

	include_once '../models/CategoriesModel.php';
	include_once '../models/UsersModel.php';
	include_once '../models/PurchaseModel.php';
	include_once '../models/OrdersModel.php';
	include_once '../models/ProductsModel.php';

	$smarty->setTemplateDir(TemplateAdminPrefix);
	$smarty->assign('templateWebPath', TemplateAdminWebPath);

	function indexAction($smarty) {
		$rsCategories = getAllMainCategories();

		$smarty->assign('rsCategories', $rsCategories);
		$smarty->assign('pageTitle', 'Админ-панель');
 
		loadTemplate($smarty, 'adminHeader');
		loadTemplate($smarty, 'admin');
		loadTemplate($smarty, 'adminFooter');
	}


	/**Добавляет новую категорию*/
	function addnewcatAction() {

		$catName = $_POST['newCategoryName'];
		$catParentId = $_POST['generalCatId'];

		$res = insertCat($catName, $catParentId);

		if ($res) {
			$resData['success'] = 1;
			$resData['message'] = 'Категория добавлена';
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка при добавлении категории';			
		}

		echo json_encode($resData);
		return;
	}


	/**Формирует страницу категорий*/
	function categoryAction($smarty) {
		$rsCategories = getAllCategories();
		$rsMainCategories = getAllMainCategories();

		$smarty->assign('rsCategories', $rsCategories);
		$smarty->assign('rsMainCategories', $rsMainCategories);
		$smarty->assign('pageTitle', 'Управление категориями');

		loadTemplate($smarty, 'adminHeader');
		loadTemplate($smarty, 'adminCategory');
		loadTemplate($smarty, 'adminFooter');
	}



	/**Обновляет категорию*/
	function updatecategoryAction() {
		$itemId = $_POST['itemId'];
		$parentId = $_POST['parentId'];
		$newName = $_POST['newName'];

		$res = updateCategoryData($itemId, $parentId, $newName);

		if ($res) {
			$resData['success'] = 1;
			$resData['message'] = 'Категория обновлена';
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка при обновлении категории';
		}

		echo json_encode($resData);
		return;
	}


	/**Формирует страницу товаров*/
	function productsAction($smarty) {
		$rsCategories = getAllCategories(); 
		$rsProducts = getProducts();

		$smarty->assign('rsCategories', $rsCategories);
		$smarty->assign('rsProducts', $rsProducts);
		$smarty->assign('pageTitle', 'Управление товарами');


		loadTemplate($smarty, 'adminHeader');
		loadTemplate($smarty, 'adminProducts');
		loadTemplate($smarty, 'adminFooter');
	}

	function addproductAction() {
		$itemName = $_POST['itemName'];
		$itemPrice = $_POST['itemPrice'];
		$itemCat = $_POST['itemCat'];
		$itemDesc = $_POST['itemDesc'];

		$res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);

		if ($res) {
			$resData['success'] = 1;
			$resData['message'] = 'Товар успешно добавлен';
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка при добавлении товара';
		}

		echo json_encode($resData);
		return;



	}


	/**Обновляет продукты*/
	function updateproductAction()  {
		$itemId = $_POST['itemId'];
		$itemName = $_POST['itemName'];
		$itemPrice = $_POST['itemPrice'];
		$itemCat = $_POST['itemCat'];
		$itemDesc = $_POST['itemDesc'];
		$itemStatus = $_POST['itemStatus'];


		$res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);

		if ($res) {
			$resData['success'] = 1;
			$resData['message'] = 'Данные о товаре успешно изменены';
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка при изменении данных';
		}

		echo json_encode($resData);
		return;

	}




	function uploadAction() {
		$maxSize = 2*1024*1024;
		$itemId = $_POST['itemId'];
		$ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
		$newFileName = $itemId.'.'.$ext;

		if ($_FILES['filename']['size'] > $maxSize) {
			echo 'Размер файла превышает 2 мб';
			return;
		}
		if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
			$res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/images/products/'.$newFileName);
			if($res) {
				$res = updateProductImage($itemId, $newFileName);
				if ($res) {
					redirect('/admin/products');
				}
			}

		} else {
			echo 'Ошибка загрузки файла';
		}
	}




	function ordersAction($smarty) {
		$rsOrders = getOrders();
		$smarty->assign('rsOrders', $rsOrders);
		$smarty->assign('pageTitle', 'Управление категориями');

		loadTemplate($smarty, 'adminHeader');
		loadTemplate($smarty, 'adminOrders');
		loadTemplate($smarty, 'adminFooter');
	}





	function setorderstatusAction() {
		$itemId = $_POST['itemId'];
		$status = $_POST['status'];

		$res = updateOrderStatus($itemId, $status);

		if ($res) {
			$resData['success'] = 1;
			$resData['message'] = 'Статус успешно обновлен';
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка при обновлении статуса';
		}

		echo json_encode($resData);
		return;
	}

		function setdatepaymentAction() {
		$itemId = $_POST['itemId'];
		$datePayment = $_POST['datePayment'];

		$res = updateDatePayment($itemId, $datePayment);

		if ($res) {
			$resData['success'] = 1;
			$resData['message'] = 'Дата оплаты успешно обновлена';
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка при обновлении даты оплаты';
		}

		echo json_encode($resData);
		return;
	}



	function createxmlAction() {
		$rsProducts = getProducts();


		$xml = new DomDocument('1.0', 'utf-8');
		$xmlProducts = $xml->appendChild($xml->createElement('products'));

		foreach ($rsProducts as $product) {
			$xmlProduct = $xmlProducts->appendChild($xml->createElement('product'));
			foreach ($product as $key => $val) {
				$xmlName = $xmlProduct->appendChild($xml->createElement($key));
				$xmlName->appendChild($xml->createTextNode($val));
			}
		}

		$xml->save($_SERVER['DOCUMENT_ROOT'].'/xml/products.xml');
		echo 'ok';
	}


?>