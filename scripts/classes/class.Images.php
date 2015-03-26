<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Entity.php';

class Images extends Entity
{

	const TABLE = 'images';

	public function __construct() 
	{
		parent::__construct();
	}

	public function delete($id) {
		parent::delete($id);
		unlink($_SERVER['DOCUMENT_ROOT'] . '/scripts/uploads/' . $id . '.jpg');
		unlink($_SERVER['DOCUMENT_ROOT'] . '/scripts/uploads/' . $id . '_s.jpg');
		unlink($_SERVER['DOCUMENT_ROOT'] . '/scripts/uploads/' . $id . '_b.jpg');
	}

}

$_images = new Images();

?>