<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Entity.php';

class DimensionsImages extends Entity
{

	const TABLE = 'dimensions_images';

	public function __construct() 
	{
		$this->fields[] = 'dimension_id';
		
		parent::__construct();
	}

	public function delete($id) {
		parent::delete($id);
		
		unlink($_SERVER['DOCUMENT_ROOT'] . '/scripts/uploads/d' . $id . '.jpg');
		unlink($_SERVER['DOCUMENT_ROOT'] . '/scripts/uploads/d' . $id . '_s.jpg');
		unlink($_SERVER['DOCUMENT_ROOT'] . '/scripts/uploads/d' . $id . '_b.jpg');
	}

	public function selectIdByDimensionId($id) {
		global $db;
		$query = 'SELECT id FROM ' . static::TABLE . ' WHERE dimension_id = ?';
		return $db->query($query, array($id));
	}

}

$_dimensions_images = new DimensionsImages();

?>