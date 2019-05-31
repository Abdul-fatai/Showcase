<?php 

include_once 'includes/dbh.inc.php';
include_once 'header.php';
if (!$_SESSION['user_id']) {
	header("Location: index.php");
}

if (isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];
}
?>

<div class="container">
	<div class="form">
		<h1>Create post</h1>
	<?php 
		$sql = "SELECT * FROM posts WHERE post_id='$post_id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result); 

	?>
	<form action="includes/update.inc.php" method="POST">
	<label>Post subject</label>
	<input type="text" value="<?= $row['post_subject']?>" name="subject" placeholder="Subject">
	<label>Post article</label>
	<textarea name="message" placeholder="Article"><?= $row['post_content'] ?></textarea>
	<input type="hidden" value="<?= $row['post_id']?>" name="post_id">
	<input type="submit" name="update" value="Update post">


</form>
</div>
</div>





<?php 

include_once 'footer.php';

?>