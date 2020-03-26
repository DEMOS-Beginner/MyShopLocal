<?php 
	include_once '../models/CategoriesModel.php';
	include_once '../models/ProductsModel.php';

	/**
	 * Формирует страницу категорий
	 * @param object $smarty - объект шаблонизатора Smarty
	 */

	function indexAction($smarty) {

		$catId = isset($_GET['id']) ? $_GET['id'] : null;	
		if ($catId == null) exit();
		
		$rsCategory = getCatById($catId);
		$rsChildCats = null;
		$rsProducts = null;


		if ($rsCategory['parent_id'] == 0) {
			$rsChildCats = getChildrenForCatById($catId);
		} else {
			$rsProducts = getProductsByCatId($catId);
		} 

		$rsCategories = getAllMainCatsWithChildren();

		$smarty->assign('pageTitle', 'Товары категории '. $rsCategory['name']);
		$smarty->assign('rsCategory', $rsCategory);
		$smarty->assign('rsProducts', $rsProducts);
		$smarty->assign('rsChildCats', $rsChildCats);
		$smarty->assign('rsCategories', $rsCategories);

		loadTemplate($smarty, 'header');
		loadTemplate($smarty, 'category');
		loadTemplate($smarty, 'footer');

	}

 
?>