<?php
<<<<<<< HEAD

// Initialize Code
require('initialize.php');
$id = $_GET['id'];
$sql = "
	INSERT INTO invoice_item (
		invoice_id, item_id, quantity
	) VALUES (
		:invoice_id, :item_id, :quantity
	)
	";

$sql_values = [
	':invoice_id' => $_GET['id'],
	':item_id' => $_POST['item_id'],
	':quantity' => $_POST['quantity'],
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
header('Location: invoice_details.php?id=' . $id);
exit();
=======
// Initialize Code
require('Initialize/initialize.php');

// Create new invoice detail
new Invoice($_GET['id'], $_POST['item_id'], $_POST['quantity']);
>>>>>>> 0f4cc642c6f6fafaf19029480c346bb711bb82f2
