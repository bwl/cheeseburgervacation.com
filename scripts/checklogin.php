<?php

$host="localhost"; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select database
mysql_connect("$host", "$username", "$password") or die("Cannot Connect");
mysql_select_db("$db_name") or die("Cannot select DB");

// username and password sent from form
$loginUsername = $_POST['username'];
$loginPassword = $_POST['password'];

// To protect MySQL injection
$loginUsername = stripslashes($loginUsername);
$loginPassword = stripslashes($loginPassword);
$loginUsername = mysql_real_escape_string($loginUsername);
$loginPassword = mysql_real_escape_string($loginPassword);
$sql = "SELECT * FROM $tbl_name WHERE username='$loginUsername' and password='$loginPassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $loginUsername and $loginPassword, table row must be 1 row
if($count==1) {
    session_register("loginUsername");
    session_register("loginPassword");
    header("location:login_success.php");
} else {
    echo "Wrong Username or Password";
}
?>