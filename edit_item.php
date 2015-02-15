<?php 
require('initialize.php');

	$sql = "
		SELECT *
		FROM item
		WHERE id = :id
		";
	$prepare_values = [
		':id' => $_GET['id']
		];

// Make a PDO statement
$statement = DB::prepare($sql);

// Execute
DB::execute($statement, $prepare_values);

// Get all the results of the statement into an array
$results = $statement->fetchAll();

// Get the first result as a row
$row = $results[0];
$item_name = $row['name'];
$price = $row['price'];
$id = $row['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Item</title>
</head>
<body>
	<a href="/">Home</a>
	<form method="POST" action="">
		<label>Item</label>
		<input type="text" name="name" value="<?php echo $item_name; ?>">
		<label>Price</label>
		<input type="text" name="price" value="<?php echo $price; ?>">
		<button>Update</button>
	</form>
	<a href="items.php">Cancel</a>
</body>
</html>