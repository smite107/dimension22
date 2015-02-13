<?php
	define('SCRIPTS_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/scripts/');
	require_once SCRIPTS_ROOT . 'constants.php';
	require_once SCRIPTS_ROOT . 'settings.php';

	$smarty->display('index.tpl');

?>