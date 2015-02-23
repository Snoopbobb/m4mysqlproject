<?php 
// Initialize Code
require('initialize.php');


$sql = "
	SELECT *
	FROM item
	";

// Make a PDO statement
$statement = DB::prepare($sql);

// Execute
DB::execute($statement);

// Get all the results of the statement into an array
$results = $statement->fetchAll();

// Loop array to get each row
$template = '';
foreach ($results as $heading => $row) {
	$template .=
			'<tr>
				<td>' . $row['name']  . '</td>
				<td>' . $row['price'] . '</td>
				<td>' . '<a href="edit_item.php?id=' . $row['id'] . '">Edit</a></td>
				<td>' . '<a href="delete_item.php?id=' . $row['id'] . '">Remove</a></td>
			</tr>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Items</title>
</head>
<body>
	<a href="/">Home</a>
	<h1>Items</h1>
	<table border="1">
		<tr>
			<th>Product Name</th>
			<th>Price</th>
		</tr>
			<?php echo $template; ?>
	</table>
	<a href="edit_item.php">Add Item</a>
</body>
</html>

