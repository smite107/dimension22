<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Entity.php';

class Graphics extends Entity
{

   const TABLE = 'graphics';

   public function __construct() 
   {
      $this->fields[] = 'caption';
      parent::__construct();
   }

}

$_graphics = new Graphics();

?>