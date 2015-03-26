<?php

define('SCRIPTS_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/scripts/');
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/container.php';

switch ($request[0]) {
	case '': case null: case false: case 'dimensions':
		$smarty->assign('active', 'dimensions');
		$smarty->display('projects.tpl');
		break;

	case 'walls':
		require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Walls.php';
		$articles = $_walls->selectAll();
		$smarty->assign('articles', $articles)
		       ->assign('active', 'walls')
		       ->display('gallery.tpl');
		break;

	case 'graphics':
		require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Graphics.php';
		$articles = $_graphics->selectAll();
		$smarty->assign('articles', $articles)
			   ->assign('active', 'graphics')
			   ->display('gallery.tpl');
		break;
	
	case 'canvases':
		require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Canvases.php';
		$articles = $_canvases->selectAll();
		$smarty->assign('articles', $articles)
			   ->assign('active', 'canvases')
			   ->display('gallery.tpl');
		break;

	case 'blog':
		$smarty->assign('active', 'blog');
		$smarty->display('blog.tpl');
		break;

	case 'project':
		$smarty->assign('active', 'dimensions');
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
				$smarty->assign('active', 'walls');
			    require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.walls.php';
			    break;
			case 'walls_edit':
				$smarty->assign('active', 'walls');
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.walls.edit.php';
			    break;
			case 'walls_add':
				$smarty->assign('active', 'walls');
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.walls.add.php';
			    break; 
			case 'canvases':
				$smarty->assign('active', 'canvases');
			    require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.canvases.php';
			    break;
			case 'canvases_edit':
				$smarty->assign('active', 'canvases');
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.canvases.edit.php';
			    break;
			case 'canvases_add':
				$smarty->assign('active', 'canvases');
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.canvases.add.php';
			    break; 
			case 'graphics':
				$smarty->assign('active', 'graphics');
			    require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.graphics.php';
			    break;
			case 'graphics_edit':
				$smarty->assign('active', 'graphics');
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.graphics.edit.php';
			    break;
			case 'graphics_add':
				$smarty->assign('active', 'graphics');
				require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/admin.graphics.add.php';
			    break; 
			case 'uploadphoto':
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
