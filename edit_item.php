<?php 
<<<<<<< HEAD
require('initialize.php');
	if(isset($_GET['id'])){
		if($_GET['id'] === "") {
			header('Location: customers.php');
		}
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
		// Initialize template for updating item
		$template = "
		<form method=\"POST\" action=\"update_item.php?id=$id\">
			<label>Item</label>
			<input type=\"text\" name=\"name\" value=\"$item_name\">
			<label>Price</label>
			<input type=\"text\" name=\"price\" value=\"$price\">
			<button>Update</button>
		</form>";
	} else {
		// Initialize template for adding item
		$template = '
		<form method="POST" action="new_item.php">
			<label>Item</label>
			<input type="text" name="name" value="">
			<label>Price</label>
			<input type="text" name="price" value="">
			<button>Add</button>
		</form>';
	}
=======
//  Initialize files
require('Initialize/initialize.php');

// call update method and return template
$template = Item::update();
>>>>>>> 0f4cc642c6f6fafaf19029480c346bb711bb82f2
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Item</title>
</head>
<body>
	<a href="/">Home</a>
	<?php echo $template; ?>
	<a href="/items.php">Back To Items</a>
	<a href="items.php">Cancel</a>
</body>
</html>