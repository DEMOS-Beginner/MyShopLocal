<?php 

	/**
	 * Контроллер для работы с корзиной
	 */

	include_once '../models/CategoriesModel.php';
	include_once '../models/ProductsModel.php';
	include_once '../models/PurchaseModel.php';
	include_once '../models/OrdersModel.php';


	function indexAction($smarty) {


		$itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

		$rsCategories = getAllMainCatsWithChildren();
		$rsProducts = getProductsFromCartArray($itemIds);

		$smarty->assign('pageTitle', 'Корзина');
		$smarty->assign('rsCategories', $rsCategories);
		$smarty->assign('rsProducts', $rsProducts);

		loadTemplate($smarty, 'header');
		loadTemplate($smarty, 'cart');
		loadTemplate($smarty, 'footer');
	}

	/**
	 * Добавляет товар в корзину
	 * @param GET параметр - ID
	 * @return json об операции
	 */
	function addtocartAction() {
		$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
		if (! $itemId) return false;

		$resData = array();

		if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
			$_SESSION['cart'][] = $itemId;
			$resData['cntItems'] = count($_SESSION['cart']);
			$resData['success'] = 1;
		} else {
			$resData['success'] = 0;
		}


		echo json_encode($resData);
	}


	function removefromcartAction() {
		$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
		if (! $itemId) return false;

		$resData = array();

		$key = array_search($itemId, $_SESSION['cart']);
		if ($key !== false) {
			unset($_SESSION['cart'][$key]);
			$resData['cntItems'] = count($_SESSION['cart']);
			$resData['success'] = 1;
		} else {
			$resData['success'] = 0;
		}


		echo json_encode($resData);
	}

	function orderAction($smarty) {

		$itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		if (! $itemIds) {
			redirect('/cart');
			return;
		}


		$itemsCnt = [];
		foreach ($itemIds as $item) {
			$postVar = 'itemCnt_'.$item;
			$itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
		}

		$rsProducts = getProductsFromCartArray($itemIds);

		$i = 0;
		foreach ($rsProducts as &$item) {
			$item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : null;
			if ($item['cnt']) {
				$item['realPrice'] = $item['cnt']*$item['price'];
			} else {
				unset($rsProducts[$i]);
			}
			$i++;
		} 

		if (! $rsProducts) {
			echo "Корзина пуста";
			return;
		}

		$_SESSION['saleCart'] = $rsProducts;

		$rsCategories = getAllMainCatsWithChildren();

		if (! isset($_SESSION['user'])) {
			$smarty->assign('hideLoginBox', 1);
		} else {
			$smarty->assign('anUser', $_SESSION['user']);
		}
		
		$smarty->assign('pageTitle', 'Заказ');
		$smarty->assign('rsCategories', $rsCategories);
		$smarty->assign('rsProducts', $rsProducts);


		loadTemplate($smarty, 'header');
		loadTemplate($smarty, 'order');
		loadTemplate($smarty, 'footer');
	}

	function saveorderAction() {
		$cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;

		if (! $cart) {
			$resData['success'] = 0;
			$resData['message'] = 'Нет товаров для заказа';
			echo json_encode($resData);
			return;
		}

		$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
		$name = isset($_POST['name']) ? $_POST['name'] : null;
		$adress = isset($_POST['adress']) ? $_POST['adress'] : null;



		if (!$name || !$phone || !$adress) {
			$resData['success'] = 0;
			$resData['message'] = 'Не введены необходимые данные';
			echo json_encode($resData);
			return;
		}

		$orderId = makeNewOrder($name, $phone, $adress);
		
		if (!$orderId ) {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка создания заказа';
			echo json_encode($resData);
			return;
		}

		$res = setPurchaseForOrder($orderId, $cart);

		if ($res) {
			$resData['success'] = 1;
			$resData['message'] = 'Заказ сохранен';
			unset($_SESSION['saleCart']);
			unset($_SESSION['cart']);
		} else {
			$resData['success'] = 0;
			$resData['message'] = 'Ошибка при сохранении заказа';
		}

		echo json_encode($resData);
	}


?>