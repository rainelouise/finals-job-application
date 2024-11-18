<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<h1>Nursing Job Application Form</h1>
	<form action="core/handleForms.php" method="POST">
		
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name">
			<label for="firstName">Last Name</label> 
			<input type="text" name="last_name">
		</p>
        <p>
			<label for="firstName">Date of Birth</label> 
			<input type="date" name="birth_date">
            <label for="firstName">Gender</label> 
			<input type="text" name="gender">
		</p>
        <p>
			<label for="firstName">Email Address</label> 
			<input type="text" name="email_address">
			<label for="firstName">Phone Number</label> 
			<input type="text" name="phone_number">
		</p>
        <p>
			<label for="firstName">Applied Position</label> 
			<input type="text" name="applied_position">
			<label for="firstName">Start Date</label> 
			<input type="date" name="start_date">
		</p>
		<p>
			<label for="firstName">Address</label> 
			<input type="text" name="address">
			<label for="firstName">Nationality</label> 
			<input type="text" name="nationality">
        <p>     
            <input type="submit" name="insertUserBtn">
        </p>

	</form>
</body>
</html>