<?php
include 'getbrowser.php';
include 'db.php';

$ip=$_SERVER['REMOTE_ADDR'];


$ua=getBrowser();
$bname = $ua['name'];
$bversion = $ua['version'];
$os = $ua['platform'];


$conn = new mysqli($servername, $username, $password, $myDatabase);

$email = $_POST["email"];
$pass = $_POST["pass"];
$rand = mt_rand(10000,99999);
$time = date("d-m-y",time());

$sql = "INSERT INTO user_details VALUES ('$rand','$email','$pass')";
$sql2 = "INSERT INTO user_ip(userid,ip,browser,version,os) VALUES ('$rand','$ip','$bname','$bversion','$os')";

$conn->query($sql);
$conn->query($sql2);

$conn->close();
?>