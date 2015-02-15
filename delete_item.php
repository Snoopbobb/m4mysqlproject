<?php 
// Initialize Code
require('initialize.php');

$id = $_GET['id'];

$sql = "
	DELETE
	FROM item
	WHERE id = $id 
	";

// Make a PDO statement
$statement = DB::prepare($sql);

// Execute
DB::execute($statement);

header("Location: items.php");
exit();
