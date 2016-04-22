<?php
session_start();

if(isset($_SESSION['userid'])){
	header("location:main.php");
}

$remail = $_POST['email'];
$rpass = $_POST['pwd'];

$email = strip_tags(stripslashes(mysqli_real_escape_string($conn,$remail)));
$pass = sha1(strip_tags(stripslashes(mysqli_real_escape_string($conn,$rpass))));

$sql="SELECT * FROM user_details WHERE email='$email' and password='$pass'";
$rs = mysql_query($sql) or die ("Query failed");

$numofrows = mysql_num_rows($rs);

if($numofrows==1){
	header("location:main.php");
}
else {
	header("location:index.php");
}

?>