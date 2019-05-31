<?php 
	if (isset($_POST['comment'])) {
		include_once 'dbh.inc.php';
		$fullname = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
		$post_id = $_POST['post_id'];

		// Error handlers 
		// Check for empty input

		if (empty($fullname) || empty($message)) {
			header("Location: ..article.php?post_id=".$post_id."");
			exit();
		} else {
			$comment_date = date("Y-m-d h:i:sa");
			$sql = "INSERT INTO comments (fullname, post_id, comment, comment_date) VALUES ('$fullname', '$post_id,', '$message', '$comment_date')";
			mysqli_query($conn, $sql);
			header("Location: ../article.php?post_id=".$post_id."success");
			exit();

		}
		
	} else {
		header("Location: ../article.php?post_id=".$post_id."error");
		exit();
	}