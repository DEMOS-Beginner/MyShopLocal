<?php 


	define(PathPrefix, '../controllers/'); //путь до контроллера
	define(PathPostfix, 'Controller.php'); //постфикс контроллера

	$template = 'default';
	$templateAdmin = 'admin';
	$adminName = 'Admin';
	$adminPassword = 'Admin';

	//пути к файлам шаблонов
	define(TemplatePrefix, "../views/{$template}/");
	define(TemplateAdminPrefix, "../views/{$templateAdmin}/");
	define(TemplatePostfix, '.tpl');

	//пути к файлам шаблонов в веб пространстве
	define(TemplateWebPath, "/templates/{$template}/");
	define(TemplateAdminWebPath, "/templates/{$templateAdmin}/");

	//Подключаем Smarty
	require '../library/Smarty/libs/Smarty.class.php';

	//Создаём и настраиваем Smarty
	$smarty = new Smarty();
	$smarty->setTemplateDir(TemplatePrefix);
	$smarty->setCompileDir('../tmp/smarty/templates_c');
	$smarty->setCacheDir('../tmp/smarty/cache');
	$smarty->setConfigDir('../library/Smarty/configs');

	$smarty->assign('templateWebPath', TemplateWebPath);


?>