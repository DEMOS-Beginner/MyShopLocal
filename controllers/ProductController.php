<?php 
/**
 * Контроллер для работы с продуктами
 */

	include_once '../models/CategoriesModel.php';
	include_once '../models/ProductsModel.php';




	/**
	 * Формирует страницу товара
	 *
	 * @param object $smarty - Объект шаблонизатора
	 */
	function indexAction($smarty) {

		$itemId = isset($_GET['id']) ? $_GET['id'] : null;
		if ($itemId == null) exit();

		$rsProduct = getProductById($itemId);

		$rsCategories = getAllMainCatsWithChildren();

		$smarty->assign('itemInCart', 0);
		if (in_array($itemId, $_SESSION['cart'])) $smarty->assign('itemInCart', 1);

		$smarty->assign('rsProduct', $rsProduct);
		$smarty->assign('rsCategories', $rsCategories);
		$smarty->assign('pageTitle', $rsProduct['name']);

		loadTemplate($smarty, 'header');
		loadTemplate($smarty, 'product');
		loadTemplate($smarty, 'footer');
	}



?>