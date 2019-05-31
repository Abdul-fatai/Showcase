<?php 

  session_start();
  $username = $_SESSION['username'];

if (isset($_POST['submit'])) {
	$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
	$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
	$file = $_FILES['file'];


	 $fileName = $file["name"];
	 $fileType = $file["type"];
	 $fileTmpName = $file["tmp_name"];
	 $fileError = $file["error"];
	 $fileSize = $file["size"];

	 $fileExt = explode(".", $fileName);
	 $fileActualExt = strtolower(end($fileExt));

	 $allowed =  array("jpg", "jpeg", "png", "gif", "pdf");

	 if (empty($subject) || empty($message)) {
		header("Location: ../post.php?input=empty");
		exit();
	 } else {
	 	if (in_array($fileActualExt, $allowed)) {
	 	if ($fileError === 0) {
	 		if ($fileSize < 200000) {
	 			$imgFullName = uniqid("", true) . "." .$fileActualExt;
	 			$fileDestionation = "../post_imgs/".$imgFullName;

	 			include_once 'dbh.inc.php';

	 			$sql = "INSERT INTO posts (post_subject, post_content, post_imgName, post_author, post_date) VALUES (?, ?, ?, ?, ?);";
	 			$stmt = mysqli_stmt_init($conn);
	 			if (!mysqli_stmt_prepare($stmt, $sql)) {
	 				echo "SQL statemet failed ";
	 				exit();
	 			} else {
	 				$date = date("Y-m-d h:i:sa");
	 				
	 				mysqli_stmt_bind_param($stmt, "sssss", $subject, $message, $imgFullName, $username, $date);
	 				mysqli_stmt_execute($stmt);

	 				move_uploaded_file($fileTmpName, $fileDestionation);
	 				header("Location: ../index.php?upload=success");
	 				exit();
	 			}
	 		} else {
	 			echo "Your file size is too big!";
	 		}
	 	} else {
	 		echo "You had an Error!";
	 	
	 	}
	 } else {
	 	echo "You need to upload a proper file type!";
	 
	 }
	 }

	 

} else {
	header("Location: ../post.php?error");
	exit();
}