<?php 
// Initialize Code
require('initialize.php');


$sql = "
	SELECT *
	FROM customer
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
				<td>' . ucfirst($row['first_name'])  . '</td>
				<td>' . ucfirst($row['last_name']) . '</td>
				<td>' . $row['email'] . '</td>
				<td>' . '<a href="invoice_details.php?id=' . $row['id'] . '">New Invoice</a></td>
				<td>' . '<a href="edit_customer.php?id=' . $row['id'] . '">Edit</a></td>
				<td>' . '<a href="delete_customer.php?id=' . $row['id'] . '">Remove</a></td>
			</tr>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customers</title>
</head>
<body>
	<a href="/">Home</a>
	<h1>Customers</h1>
	<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
		</tr>
			<?php echo $template; ?>
	</table>
	<a href="edit_customer.php">Add Customer</a>
</body>
</html>

