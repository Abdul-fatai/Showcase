<?php 

include_once 'header.php';
if (!$_SESSION['user_id']) {
	header("Location: index.php");
}
?>

<div class="container">
	<div class="form">
		<h1>Create post</h1>
	<form action="includes/post.inc.php" method="POST" enctype="multipart/form-data">
	<label>Post subject</label>
	<input type="text" name="subject" placeholder="Subject">
	<label>Post article</label>
	<textarea placeholder="Article" name="message"></textarea>
	<label>Post img</label>
	<input type="file" name="file" placeholder="">
	<input type="submit" name="submit" value="Submit">

</form>
</div>
</div>





<?php 

include_once 'footer.php';

?>