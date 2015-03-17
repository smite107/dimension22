<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Walls.php';

if(!isset($_SESSION)) {
   @session_start();
}

$ajaxResult = Array('result' => true, 'message' => 'Операция прошла успешно!');

class Handler
{
   public $entity;

   public function __construct($entity)
   {
      $this->entity = $entity;
   }

   /*public function SetFields($params)
   {
      foreach ($params as $name => $value) {
         $this->entity->SetFieldByName($name, $value);
      }
   }

   public function Update($params)
   {
      try {
         $this->SetFields($params);
         $this->entity->Update();
      } catch (DBException $e) {
         throw new Exception('Возникли проблемы при обновлении записи.');
      }
   }*/
/*
   public function Insert($params, $getLastInsertId = true)
   {
      try {
         $this->SetFields($params);
         return $getLastInsertId ? $this->entity->Insert(true) : $this->entity->Insert(false);
      } catch (DBException $e) {
         throw new Exception('Возникли проблемы при добавлении записи.');
      }
   }
*/
   public function Delete($params)
   {
      try {
         $this->entity->delete($params['id']);
      } catch (DBException $e) {
         throw new Exception("Возникли проблемы при удалении записи.");
      }
   }

   public function Handle($in)
   {
      try {
         return $this->$in['mode'](isset($in['params']) ? $in['params'] : Array());
      } catch (ValidateException $e) {
         throw new Exception($e->getMessage());
      }
   }
}

function GetPOST()
{
   foreach ($_POST as &$value) {
      if (!is_array($value)) {
         $value = trim($value);
      }
   }
   return $_POST;
}

try {
   $post = GetPOST();
   $handler = new Handler($_walls);
   $handler->Handle($post);
} catch (Exception $e) {
   $ajaxResult['result'] = false;
   $ajaxResult['message'] = $e->getMessage();
}

echo json_encode($ajaxResult);

?>