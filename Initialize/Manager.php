<?php 
class Manager extends DB {

	public static function getByID($id, $table, $pk) {
		$q = 'select * from ' . $table . ' where ' . $pk . '= :id';
		$stmt = $this->db->prepare($q);
		$stmt->execute(['id'=> $id]);
		$results = $stmt->fetch();
		return $results;
	}

	public static function getAll() {
		$q = "select * from $table";
		$stmt = $this->db->prepare($q);
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;
		
	}
}