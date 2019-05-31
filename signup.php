<?php 

include_once 'header.php';

if (isset($_SESSION['user_id'])) {
	header("Location: index.php");
}

?>

<div class="container">
	<div class="form">
	<h1>Sign up Admin</h1>
	<?php 
		if (isset($_GET['input'])) {
			if ($_GET['input'] == 'empty') {
				 echo "<h3 style='color: #ff3333;'>All field are required</h3>";
			}
		}
		if (isset($_GET['username'])) {
			if ($_GET['username'] == 'taken') {
				 echo "<h3 style='color: #ff3333;'>Username taken</h3>";
			}
		}
		if (isset($_GET['pwd'])) {
			if ($_GET['pwd'] == 'notsame') {
				 echo "<h3 style='color: #ff3333;'>Password didn't match</h3>";
			}
		}


	?>
	<form action="includes/signup.inc.php" method="POST">
	<label>Username</label>
	<input type="text" name="username" placeholder="username">
	<label>Email</label>
	<input type="email" name="email" placeholder="Email....">
	<label>password</label>
	<input type="password" name="pwd" placeholder="passsword">
	<label>Comfirm passsword</label>
	<input type="password" name="Cpwd" placeholder="Reapeat passsword">
	<input type="submit" name="signup" value="Submit">
</form>
	<p style="text-align: center;">Login instead</p>
	<li><a href="login.php" id="signinsted">Login</a></li>
</div>
</div>






<?php 

include_once 'footer.php';

?>