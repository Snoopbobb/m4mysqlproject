<?php

// Initialize Code
<<<<<<< HEAD
require('initialize.php');

$sql = "
	INSERT INTO item (
		name, price
	) VALUES (
		:name, :price
	)
	";

$sql_values = [
	':name' => $_POST['name'],
	':price' => $_POST['price'],
];

// Make a PDO statement
$statement = DB::prepare($sql);

// // Bind Parameters individually instead of using sql_values array
// $statement->bindValue(':first_name', $_POST['first_name']);
// $statement->bindValue(':last_name', $_POST['last_name']);
// $statement->bindValue(':email', $_POST['email']);

// Execute
DB::execute($statement, $sql_values);

// Redirect
header('Location: items.php?id=' . DB::lastInsertId());
exit();
=======
require('Initialize/initialize.php');

new Item($_POST['name'], $_POST['price']);
>>>>>>> 0f4cc642c6f6fafaf19029480c346bb711bb82f2
