<?php

function checkPermissions($login, $pass)
{
   return $login == 'brosk' && $pass == 'admin';
}

function isAdmin($login = null, $pass = null)
{
   if (!empty($login) && !empty($pass)) {
      $admin_login = $login;
      $admin_pass  = $pass;
   } elseif (!empty($_SESSION['admin_login']) && !empty($_SESSION['admin_pass'])) {
      $admin_login = $_SESSION['admin_login'];
      $admin_pass  = $_SESSION['admin_pass'];
   } else return false;
   $result = checkPermissions($admin_login, $admin_pass);
   if ($result) {
      setSessionParams($admin_login, $admin_pass);
   }
   return $result;
}

function setSessionParams($login, $pass)
{
   $_SESSION['admin_login'] = $login;
   $_SESSION['admin_pass']  = $pass;
}

?>