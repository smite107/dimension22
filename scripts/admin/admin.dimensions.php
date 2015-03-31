<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Dimensions.php';

$dimensions = $_dimensions->selectAll();
$smarty->assign('dimensions', $dimensions)->display('admin.dimensions.tpl');
?>