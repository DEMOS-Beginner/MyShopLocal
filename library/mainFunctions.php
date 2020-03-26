<?php 

	/**
	 * Функция загружает страницу
	 * @param $smarty - объект шаблонизатора
	 * @param $controllerName - имя контроллера
	 * @param $actionName - имя функции контролера
	 */

	function loadPage($smarty, $controllerName, $actionName) {
		include_once PathPrefix . $controllerName . PathPostfix;
		
		$function = $actionName . 'Action';
		$function($smarty);

	}

	/**
	 * Функция загружает шаблон
	 * @param $smarty - объект шаблонизатора
	 * @param $templateName - имя шаблона
	 */

	function loadTemplate($smarty, $templateName) {
		$smarty->display($templateName.TemplatePostfix);
	}


	/**
	 * функция-помощник для нахождения ошибок
	 */
	function d($value = null, $die = 1) {

		function debugOut($a) {
			echo "<br><b>".basename($a['file'])."</b>"
				."&nbsp;<font color = 'red'> ({$a['line']}) </font>"
				."&nbsp;<font color = 'green'> {$a['function']}() </font>"
				."&nbsp; -- ". dirname($a['file']);
		}

		echo "<pre>";
			$trace = debug_backtrace();
			array_walk($trace, 'debugOut');
			echo "\n\n";
			print_r($value);
		echo "</pre>";

		if ($die) die;

	}

	function redirect($url) {
		if (!$url) $url = '/';
		header('Location: $url');
		exit;
	}

?>