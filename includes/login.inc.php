<?php 
	session_start();
if (isset($_POST['login'])) {
	
	include_once 'dbh.inc.php';
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

	// Error handlers
	// Check for empty input

	if (empty($username) || empty($password)) {
		header("Location: ../login.php?empty=input");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck < 1) {
			header("Location: ../login.php?username=incorrect");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				// De-hashing the password
				$hashedpwdcheck = password_verify($password, $row['password']);

				if ($hashedpwdcheck == false) {
					header("Location: ../login.php?pwd=incorrect");
					exit();
				} elseif ($hashedpwdcheck == true) {
					// Login user in here
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
					
					setcookie($row['username'], $row['user_id'], time() + (86400 * 30), "/"); // 86400 = 1 day
					header("Location: ../index.php?login=success");
					exit();
				}

			}
		}
	}



} else {
	header("Location: ../login.php?error");
	exit();
}