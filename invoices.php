<?php 
// Initialize Code
require('initialize.php');

$sql = "
	SELECT v.id, CONCAT(first_name, ' ', last_name) AS name, (quantity * price) AS total
	FROM customer AS c, invoice AS v, invoice_item AS t, item as i 
	WHERE c.id = v.customer_id
	AND v.id = t.invoice_id
	AND i.id = t.item_id
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
				<td>' . $row['id']  . '</td>
				<td>' . $row['name']  . '</td>
				<td>' . $row['total'] . '</td>
				<td>' . '<a href="invoice_details.php?id=' . $row['id'] . '">Details</a></td>
			</tr>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invoices</title>
</head>
<body>
	<a href="/">Home</a>
	<h1>Invoices</h1>
	<table border="1">
		<tr>
			<th>Invoice</th>
			<th>Name</th>
			<th>Total</th>
		</tr>
			<?php echo $template; ?>
	</table>
</body>
</html>

