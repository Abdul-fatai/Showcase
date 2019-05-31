<?php 

if (isset($_POST['signup'])) {

	include_once 'dbh.inc.php';
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
	$Cpwd = filter_input(INPUT_POST, 'Cpwd', FILTER_SANITIZE_STRING);

	// Error handlers 
	// Check for empty input

	if (empty($username) || empty($email) || empty($pwd) || empty($Cpwd)) {
		header("Location: ../signup.php?input=empty");
		exit();
	} else {
		if (!preg_match("/^[a-zA-Z1-9]*/", $username)) {
		header("Location: ../signup.php?invalidcharacter");
		exit();
	} else {
		if ($pwd != $Cpwd) {
			header("Location: ../signup.php?pwd=notsame");
			exit();
		} else {
			$sql = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0) {
				header("Location: ../signup.php?username=taken");
				exit();
			} else {
				$pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);
				$date = date("Y/m/d h:i:sa");

				$sql = "INSERT INTO users (username, email, password, signup_date) VALUES(?, ?, ?, ?);";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "SQL prepare Failed";
					exit();
				} else {
					mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $pwdhashed, $date);
					mysqli_stmt_execute($stmt);
					header("Location: ../login.php?signup=success");
					exit();
				}
			}
		}
	}

}


} else {
	header("Location: ../signup.phperror");
	exit();
}