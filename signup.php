<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
   <link rel="stylesheet" href="log.css">
</head>
<body>
	<h1>Sign Up</h1>
	<form method="post" action="signup.php" autocomplete="off">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" required><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br>
		<input type="submit" value="Sign Up">
	</form>

	<?php
	// When the form is submitted, connect to the database and insert the new user
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

		// Insert the new user into the database
		$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

		if ($conn->query($sql) === TRUE) {
			echo "New user created successfully";
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		    $result = $conn->query($sql);
            $id = mysqli_fetch_assoc($result);
            
            $st = strval($id['id']);
            setcookie("id", "$st", time() + 3600, "/");
            header("location: index.html");

		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	?>
</body>
</html>