<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/connect.php';

class Entity
{
	const TABLE = '';

	public $fields = array();

	public function __construct()
	{
		
	}

	public function selectAll() {
		global $db;
		$query = 'SELECT * FROM ' . static::TABLE;
		return $db->query($query);
	}

	public function selectById($id) {
		global $db;
		$query = 'SELECT * FROM ' . static::TABLE . ' WHERE id = ?';
		return $db->query($query, array($id));
	}

	public function delete($id) {
		global $db;
		$query = 'DELETE FROM ' . static::TABLE . ' WHERE id = ?';
		return $db->query($query, array($id));
	}

	public function update($id, $params = array()) {
		global $db;
		$query = 'UPDATE ' . static::TABLE . ' SET ' . implode(' = ?, ', $this->fields) . ' = ?' . ' WHERE id = ?';
		return $db->query($query, array_merge($params, array($id)));
	}

	public function insert($params = array()) {
		global $db;
		$query = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $this->fields) . ') VALUES ('
        . (count($this->fields) - 1 >= 0 ? str_repeat('?, ', count($this->fields) - 1) . '?' : '')
        . ')';
		return $db->insert($query, $params, true);
	}
}