<?php 

if (isset($_POST['delete'])) {

	include_once 'dbh.inc.php';
	$post_id = $_POST['post_id'];

	$sql = "DELETE FROM posts WHERE post_id='$post_id'";
	mysqli_query($conn, $sql);
	header("Location: ../index.php?delete=success");
	exit();

} else {
	header("Location: ../index.phperror");
}