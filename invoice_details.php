<?php 
require('initialize.php');

	$id = $_GET['id'];

	$sql = "
		SELECT CONCAT(c.first_name, ' ', c.last_name) AS customer_name, quantity, i.name, price, (price * quantity) AS total
		FROM invoice_item AS t, invoice AS v, item AS i, customer AS c
		WHERE v.id = t.invoice_id
		AND i.id = t.item_id
		AND c.id = v.customer_id
		AND v.id = $id
		";
	$prepare_values = [
		':id' => $_GET['id']
		];

// Make a PDO statement
$statement = DB::prepare($sql);

// Execute
DB::execute($statement);

// Get all the results of the statement into an array
$results = $statement->fetchAll();

// Loop array to get each row
$total = [];
$template = '';
foreach ($results as $heading => $row) {
	$customer = $row['customer_name'];
	$total[] .= $row['total'];
	$sum = array_sum($total);
	$template .=
			'<tr>
				<td>' . $row['quantity']  . '</td>
				<td>' . $row['name']  . '</td>
				<td>' . $row['price']  . '</td>
				<td>' . $row['total'] . '</td>
				<td>' . '<a href="delete_invoice.php?id=' . $id . '">Remove</a></td>
			</tr>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invoice <?php echo $id; ?></title>
</head>
<body>
	<a href="/">Home</a>
	<h1>Invoice: <?php echo $id; ?> Customer: <?php echo ucwords($customer); ?></h1>
	<table border="1">
		<tr>
			<th>Quantity</th>
			<th>Name</th>
			<th>Price</th>
			<th>Sub-Total</th>
		</tr>
			<?php echo $template; ?>
		<tr>
			<td></td>
			<td></td>
			<th>Total</th>
			<td>$<?php echo number_format($sum, 2); ?></td>
		</tr>
	</table>
	<form action="">
		<label>QTY</label>
		<input type="text" name="quantity">
		<label>Item</label>
		<select>
			<option name=" ">Tequila</option>
			<option>Draft Beer</option>
		</select>
		<button>Add</button>
	</form>
	<a href="invoices.php">Back To Invoices</a>
</body>
</html>