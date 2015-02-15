<?php

// Initialize Code
require('initialize.php');


$sql = "
	INSERT INTO customer (
		first_name, last_name, email, gender, customer_since
	) VALUES (
		:first_name, :last_name, :email, :gender, CURDATE()
	)
	";

$sql_values = [
	':first_name' => $_POST['first_name'],
	':last_name' => $_POST['last_name'],
	':email' => $_POST['email'],
	':gender' => $_POST['gender'],
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
header('Location: edit_customer.php?id=' . DB::lastInsertId());
exit();