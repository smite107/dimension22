<?php
if(!isset($_SESSION)) {
   @session_start();
}

require_once SCRIPTS_ROOT . 'constants.php';
require_once SCRIPTS_ROOT . 'settings.php';

$request = explode('/', substr($_SERVER['REQUEST_URI'], 1));

?>
