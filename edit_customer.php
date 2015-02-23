<?php 
require('initialize.php');
	
	// Initialize SQL statement and template for viewing and editing individual customer
	if(isset($_GET['id'])){
		if($_GET['id'] === "") {
			header('Location: customers.php');
		} 
		$sql = "
			SELECT *
			FROM customer
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
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
		$id = $row['id'];

		// Set up template for viewing 
		$template = "
		$message
		<form method=\"POST\" action=\"update_customer.php?id=$id\">
			<label>First Name</label>
			<input type=\"text\" name=\"first_name\" value=\"$first_name\">
			<label>Last Name</label>
			<input type=\"text\" name=\"last_name\" value=\"$last_name\">
			<label>Email Name</label>
			<input type=\"email\" name=\"email\" value=\"$email\">
			<select name=\"gender\">
				<option value=\"male\">Male</option>
				<option value=\"female\">Female</option>
			</select>
			<button>Update</button>
		</form>";
	} else  {
		// This will initialize template for new customer
		$template = '
		<form method="POST" action="new_customer.php">
			<label>First Name</label>
			<input type="text" name="first_name" value="">
			<label>Last Name</label>
			<input type="text" name="last_name" value="">
			<label>Email Name</label>
			<input type="email" name="email" value="">
			<select name="gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
			<button>ADD</button>
		</form>';
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Customer</title>
</head>
<body>
	<a href="/">Home</a>
	<?php echo $template; ?>
	<a href="customers.php">Back To Customers</a>
	<a href="customers.php">Cancel</a>
</body>
</html>