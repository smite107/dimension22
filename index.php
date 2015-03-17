<?php

define('SCRIPTS_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/scripts/');
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/container.php';

switch ($request[0]) {
	case '': case null: case false: case 'dimensions':
		//$smarty->assign('is_main', 1);
		$smarty->display('projects.tpl');
		break;

	case 'walls':
		$smarty->display('gallery.tpl');
		break;

	case 'graphics':
		$smarty->display('gallery.tpl');
		break;
	
	case 'canvases':
		$smarty->display('gallery.tpl');
		break;

	case 'blog':
		$smarty->display('blog.tpl');
		break;

	case 'project':
		$smarty->display('project.tpl');
		break;

	case 'admin':
		require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin_funcs.php';
		$isLoginPage = empty($request[1]) || $request[1] == 'login';
		if (isAdmin()) {
			if ($isLoginPage) {
				header('Location: /admin/walls');
			}
		} elseif (!$isLoginPage) {
			header('Location: /admin/');
		}
		$request[1] = !empty($request[1]) ? $request[1] : null;
		switch ($request[1]) {
			case '': case 'login': case null: case false:
			    require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.login.php';
			    break;
			case 'walls':
			    require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.walls.php';
			    break;
			case 'walls_edit':
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.walls.edit.php';
			    break;
			case 'walls_add':
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.walls.add.php';
			    break; 
			case 'upload_photo':
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/upload_photo.php';
			    break;
			default:
	            header('Location: /admin/walls/');
            	break;
		}
		break;

	default:
		$smarty->display('404.tpl');
		break;
}

?>
