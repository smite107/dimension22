<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Entity.php';

class Canvases extends Entity
{

   const TABLE = 'canvases';

   public function __construct() 
   {
      $this->fields[] = 'caption';
      parent::__construct();
   }

}

$_canvases = new Canvases();

?>