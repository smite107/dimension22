<?php

define('SCRIPTS_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/scripts/');
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/container.php';

switch ($request[0]) {
	case '': case null: case false: case 'projects':
		//$smarty->assign('is_main', 1);
		$smarty->display('projects.tpl');
		break;

	case 'walls':
		$smarty->display('walls.tpl');
		break;

	case 'blog':
		$smarty->display('blog.tpl');
		break;

	case 'project':
		$smarty->display('project.tpl');
		break;

	default:
		$smarty->display('404.tpl');
		break;
}

?>
