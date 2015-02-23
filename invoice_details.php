<?php 
// Initialize files
require('Initialize/initialize.php');

// Set $id
$id = $_GET['id'];

<<<<<<< HEAD
	$sql = "
		SELECT CONCAT(c.first_name, ' ', c.last_name) AS customer_name, quantity, i.name, 
		price, (price * quantity) AS total, t.id AS invoice_item_id
		FROM invoice_item AS t, invoice AS v, item AS i, customer AS c
		WHERE v.id = t.invoice_id
		AND i.id = t.item_id
		AND c.id = v.customer_id
		AND v.id = $id
		";
	$prepare_values = [
		':id' => $_GET['id']
		];
=======
// Call method to get customer's full name
$customer = Customer::getCustomerNameByID($id);
>>>>>>> 0f4cc642c6f6fafaf19029480c346bb711bb82f2

// Get template
$template = Invoice::getInvoiceDetails($id);

<<<<<<< HEAD
// Execute
DB::execute($statement);

// Get all the results of the statement into an array
$results = $statement->fetchAll();

// Loop array to get each row
$total = [];
$template = '';
foreach ($results as $heading => $row) {
	$customer = "Customer: " . $row['customer_name'];
	$total[] .= $row['total'];
	$invoice_item_id = $row['invoice_item_id'];
	$sum = array_sum($total);
	$template .=
			'<tr>
				<td>' . $row['quantity']  . '</td>
				<td>' . $row['name']  . '</td>
				<td>' . $row['price']  . '</td>
				<td>' . $row['total'] . '</td>
				<td>' . '<a href="delete_invoice.php?id=' . $invoice_item_id . '">Remove</a></td>
			</tr>';
}

// Loop through items to populate drop down
$sql2 = "
	SELECT * FROM item
	";
$prepare_values2 = [
	':id' => $_GET['id']
	];

// Make a PDO statement
$statement2 = DB::prepare($sql2);

// Execute
DB::execute($statement2);

// Get all the results of the statement into an array
$results2 = $statement2->fetchAll();
foreach ($results2 as $heading2 => $row2) {
	$item .= '<option value="' . $row2['id'] . '">' . $row2['name'] . '</option>';
}

=======
// Get drop down options
$item = Item::getItemOptions();

// Get invoice_items total
$sum = Invoice::getTotal($id);
>>>>>>> 0f4cc642c6f6fafaf19029480c346bb711bb82f2
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invoice <?php echo $id; ?></title>
</head>
<body>
	<a href="/">Home</a>
<<<<<<< HEAD
	<h1>Invoice: <?php echo $id . " " . ucwords($customer); ?></h1>
=======
	<h1>Invoice: <?php echo $id . " Customer: " . ucwords($customer); ?></h1>
>>>>>>> 0f4cc642c6f6fafaf19029480c346bb711bb82f2
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
	<form action="new_invoice.php?id=<?php echo $id; ?>" method="POST">
		<label>QTY</label>
		<input type="text" name="quantity">
		<label>Item</label>
		<select name="item_id">
			<?php echo $item; ?>
		</select>
		<button>Add</button>
	</form>
	<a href="invoices.php">Back To Invoices</a>
</body>
</html>