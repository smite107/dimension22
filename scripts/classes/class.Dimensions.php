<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.Entity.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/classes/class.DimensionsImages.php';

class Dimensions extends Entity
{

	const TABLE = 'dimensions';

	public function __construct() 
	{
		$this->fields[] = 'name';
		$this->fields[] = 'text';
		$this->fields[] = 'background';
		$this->fields[] = 'image_main_id';

		parent::__construct();
	}

	public function selectById($id) {
		$return = parent::selectById($id);
		global $_dimensions_images;
		$return[0]['images'] = $_dimensions_images->selectIdByDimensionId($id);
		return $return;
	}

}

$_dimensions = new Dimensions();

?>