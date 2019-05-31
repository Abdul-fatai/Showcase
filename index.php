<?php 
 $active = 'home';
	include_once 'header.php';

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }


  $num_per_page = 8;
  $start_from = ($page-1)*8;
?>


	<section id="showcase">
		<div class="container">
			<h1>Showcase your bussines here</h1>
			<p>W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. </p>
			
		</div>
	</section>
	<section id="newsletter">
		<div class="container">
      <?php 
        if (isset($_SESSION['user_id'])) {
          echo '<h3><a href="post.php">Create post</a></h3>';
        }
      ?>
			<h3>Subcribe to our newsletter</h3>
			<form>
				<input type="email" name="" placeholder="Enter your email.... ">
				<button type="submit">Subcribe</button>
			</form>
		</div>
	</section>
     
    <?php 
      include_once 'includes/dbh.inc.php';
      $sql = "SELECT * FROM posts ORDER BY post_date DESC LIMIT ?, ?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
      } else {
        mysqli_stmt_bind_param($stmt, "ii", $start_from, $num_per_page);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class='responsive'>
          <div class='img'>
              <img src="post_imgs/<?= $row['post_imgName'] ?>"alt="postimg">
                <div class='desc'><a href='article.php?post_id=<?= $row["post_id"]?>&post_subject=<?= $row['post_subject'] ?>&post_date=<?= $row['post_date']?>'><b><?= $row['post_subject'] ?></b></a></div>

          <?php 
            if (isset($_SESSION['user_id'])) {
              ?>
            <a href='update_post.php?post_id=<?= $row['post_id']?>' id='edit'>Edit post</a>

            <form action="includes/delete.inc.php" method="POST">
              <input type="hidden" value="<?= $row['post_id']?>" name="post_id" >
            <button type='submit' name="delete" style='float: right;'>Delete</button>
            </form> 
          <?php      
        }

            ?>
                </div>
              </div>
            <?php     

          
        }
      }
?>


<div class="clearfix"></div>




  <div class="pagnation">
    <div class="container">
<ul>
  <?php
  $sql = "SELECT * FROM posts";
  $resultnew = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($resultnew);
  
  $total_page = ceil($resultCheck/$num_per_page);



  if ($page > 1) {
    echo "<li><a href='index.php?page=".($page-1)."'>Previous</a></li>";
  }
  for ($i=1; $i < $total_page; $i++) { 
    echo " <li><a href='index.php?page=".$i."'>$i</a></li>";
  }

  if ($i > $page) {
    echo "  <li><a href='index.php?page=".($page+1)."'>Next</a></li>";
  }

?>
  
</ul>
</div>
</div>


<?php 

include_once 'footer.php';

?>

