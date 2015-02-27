<?php

if (isset($_POST['submit'])) {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $pass  = isset($_POST['pass'])  ? $_POST['pass']  : '';
    if (isAdmin($login, $pass)) {
    	header('Location: /admin/page');
	} else {
		$smarty->assign('invalid_pass', true)
 			   ->assign('admin_login', $login);
    }
}
$smarty->display('admin.login.tpl');

?>