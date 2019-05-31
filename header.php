
<?php
session_start();
if(!isset($active)) {
  $active = '';
}
?>


<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="Author" content="Abdul-fatai">
	<title>Showcase</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5ce55a597ff0c00012df0e6c&product='inline-share-buttons' async='async'></script>
</head>
<body>
	<header>
		<div class="container">
			<div id="branding">
				<a href="index.php">
				<h2><span class="highlight">MOTIME</span>  MULTI-LINK</h2>
			</a>
			</div>
			<nav>
				<ul>
					<li class="<?php echo ($active == 'home') ? 'active' : 'null'; ?> current"><a href="index.php">Home</a></li>
					<li class="<?php echo ($active == 'about-us') ? 'active' : 'null'; ?> "><a href="about-us.php">About us</a></li>
					<li class="<?php echo ($active == 'services') ? 'active' : 'null'; ?> "><a href="services.php">Services</a></li>
					<li class="<?php echo ($active == 'contact-us') ? 'active' : 'null'; ?> "><a href="contact-us.php">Contact us</a></li>
				</ul>
			</nav>

		</div>
				 <?php
				    if (isset($_SESSION['user_id'])) {
				      ?>
				      <form action="includes/logout.php" method="POST">
				            <button type="submit" name="logout" style="background-color: #333; float: right;">Logout</button>
				      </form>
				       <?php
				    }
				 ?>
	</header>

