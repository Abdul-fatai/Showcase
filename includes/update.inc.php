<?php 
	
if (isset($_POST['update'])) {
	include_once 'dbh.inc.php';
	$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
	$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
	$post_id = $_POST['post_id'];

	// ERROR HANDLERS\
	// Check for empty input
	if (empty($subject) || empty($message)) {
		header("Location: ../update_post.php?post_id=".$post_id."empty=input");
		exit();
	} else {
		$current = date("Y-m-d h:i:sa");
		$sql = "UPDATE posts SET post_subject='$subject', post_content='$message', post_update_at='$current' WHERE post_id='$post_id'";
		mysqli_query($conn, $sql);
		header("Location: ../index.php?update=success");
		exit();
	}

} else {
	header("Location: ../update_post.php?error");
	exit();
}