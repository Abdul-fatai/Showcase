<?php

$dbhServerName = "localhost";
$dbhUsername = "root";
$dbhPassword = "";
$dbhName = "showcase";

$conn = mysqli_connect($dbhServerName, $dbhUsername, $dbhPassword, $dbhName);

// Check connection
if (!$conn ) {
	die("Connection failed:" . mysqli_connect_error());
}
