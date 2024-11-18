<?php 
require_once 'core/handleForms.php'; 
require_once 'core/models.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit User</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php 
	$getUserByID = getUserByID($pdo, $_GET['id']); 

	if (!$getUserByID) {
		echo "User not found!";
		exit;
	}
	?>
	<h1>Edit User</h1>
	<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name" value="<?php echo htmlspecialchars($getUserByID['first_name']); ?>" required>
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="last_name" value="<?php echo htmlspecialchars($getUserByID['last_name']); ?>" required>
		</p>
		<p>
			<label for="birthDate">Birth Date</label> 
			<input type="date" name="birth_date" value="<?php echo htmlspecialchars($getUserByID['birth_date']); ?>" required>
		</p>
		<p>
			<label for="gender">Gender</label> 
			<input type="text" name="gender" value="<?php echo htmlspecialchars($getUserByID['gender']); ?>" required>
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="email" name="email_address" value="<?php echo htmlspecialchars($getUserByID['email_address']); ?>" required>
		</p>
		<p>
			<label for="phoneNumber">Phone Number</label> 
			<input type="text" name="phone_number" value="<?php echo htmlspecialchars($getUserByID['phone_number']); ?>" required>
		</p>
		<p>
			<label for="appliedPosition">Applied Position</label> 
			<input type="text" name="applied_position" value="<?php echo htmlspecialchars($getUserByID['applied_position']); ?>" required>
		</p>
		<p>
			<label for="startDate">Start Date</label> 
			<input type="date" name="start_date" value="<?php echo htmlspecialchars($getUserByID['start_date']); ?>" required>
		</p>
		<p>
			<label for="address">Address</label> 
			<input type="text" name="address" value="<?php echo htmlspecialchars($getUserByID['address']); ?>" required>
		</p>
		<p>
			<label for="nationality">Nationality</label> 
			<input type="text" name="nationality" value="<?php echo htmlspecialchars($getUserByID['nationality']); ?>" required>
		</p>
		<p>
			<input type="submit" value="Save" name="editUserBtn">
		</p>
	</form>
</body>
</html>