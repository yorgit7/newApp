<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
	<h1>Login</h1>
	<form method="post" action="login.php">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" required><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br>
		<input type="submit" value="Login">
        <p><a href="signup.php">Create Account</a></p>
	</form>

	<?php
	// When the form is submitted, connect to the database and check the user's credentials
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Connect to the database
		$servername = "localhost";
		$usernameC = "root";
		$passwordC = "";
		$dbname = "optiman";

		$conn = new mysqli($servername, $usernameC, $passwordC, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Check the user's credentials
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = $conn->query($sql);
        
		if ($result->num_rows == 1) {
			echo "Login successful";
            $id = mysqli_fetch_assoc($result);
            
            $st = strval($id['id']);
            setcookie("id", "$st", time() + 3600, "/");
            header("location: index.html");
		} else {
			echo "Invalid username or password";
		}

		$conn->close();
	}
	?>
</body>
</html>