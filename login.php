<?php 

include_once 'header.php';
if (isset($_SESSION['user_id'])) {
	header("Location: index.php");
}

?>

<div class="container">
	<div class="form">
	<h1>Login Admin</h1>
	<?php 
		if (isset($_GET['empty'])) {
			if ($_GET['empty'] == 'input') {
				 echo "<h3 style='color: #ff3333;'>All field are required</h3>";
			}
		}
		if (isset($_GET['username'])) {
			if ($_GET['username'] == 'incorrect') {
				 echo "<h3 style='color: #ff3333;'>Incorrect username</h3>";
			}
		}
		if (isset($_GET['pwd'])) {
			if ($_GET['pwd'] == 'incorrect') {
				 echo "<h3 style='color: #ff3333;'>Incorrect Password</h3>";
			}
		}


	?>
	<form action="includes/login.inc.php" method="POST">
	<label>Username or Email</label>
	<input type="text" name="username" placeholder="Email or Username">
	<label>password</label>
	<input type="password" name="password" placeholder="passsword">
	<input type="submit" name="login" value="Submit"><br>
</form>
	<p style="text-align: center;">Signup instead</p>
	<li><a href="signup.php" id="signinsted">Signup</a></li>

</div>
</div>






<?php 

include_once 'footer.php';

?>