<?php 
include_once 'header.php';
include_once 'includes/dbh.inc.php';

if (isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];
}
?>



<section id="article">
<div class="container">
<?php 
$sql = "SELECT * FROM posts WHERE post_id=?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
	echo "SQL prepare failed";
	exit();
} else {
	mysqli_stmt_bind_param($stmt, "s", $post_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_assoc($result)) {
		?>
	<div class="article-img">
		<img src="post_imgs/<?= $row['post_imgName'] ?>"alt="postimg">
	</div>
	<div id="content">
		<h3 style="text-align: center;"><?= $row['post_subject']  ?></h3>
		 <small style="float: right;"><?= $row['post_date'] ?></small><br>
		<p><?= nl2br($row['post_content']) ?></p>

		<p><b>Share this post:</b> </p>
     <div class='sharethis-inline-share-buttons'></div>
	</div>

		<?php
	}
}

?>
	<div id="comment-display">
		<h3>Comments</h3>
		<?php 
			$sql = "SELECT * FROM comments WHERE post_id=?  ORDER BY comment_date";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "SQL statement failed ";
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "s", $post_id);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				while ($rows = mysqli_fetch_assoc($result)) {
					?>
				<img src="post_imgs/show.jpeg">
				<span style="float: left; margin-top: 10px;"><?= $rows['fullname'] ?></span>
				<small style="float: right; margin-top: 10px;"><?=  $rows['comment_date'] ?></small><br>
				<p><?= $rows['comment']?></p>
					<?php
				}
			}

		?>
		
	</div>



	<br><br>
	<div class="comment">
	<h3>Write your comment</h3>
	<form class="form-group" action="includes/comment.inc.php" method="POST">
		<input type="text" name="name" placeholder="Your name">
		<input type="hidden" value="<?= $post_id ?>" name="post_id" placeholder="Your name">
		<textarea placeholder="Write your comment...." name="message"></textarea><br>
		<button type="submit" name="comment">Comment</button>
	</form>
	</div>
	
</div>
</section>





















<?php 
include_once 'footer.php';
?>