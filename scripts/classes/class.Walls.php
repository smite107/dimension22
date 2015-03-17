<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Entity.php';

class Walls extends Entity
{

   const TABLE = 'walls';

   public function __construct() 
   {
      $this->fields[] = 'caption';
      parent::__construct();
   }

}

$_walls = new Walls();

?>