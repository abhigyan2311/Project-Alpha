<?php
/**
 * Created by PhpStorm.
 * User: Aalekh
 * Date: 01-Feb-16
 * Time: 12:49 PM
 */
$servername = "23.97.54.87";
$username = "iwp";
$password = "Galaxy2311";
$myDatabase = "iwp";
// Create connection
$conn = new mysqli($servername, $username, $password, $myDatabase);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}
else{
    echo "Connected successfully";}
$email = $_POST["email"];
$pass = $_POST["pass"];
$rand = mt_rand(10000,99999);
$time = date("d-m-y",time());
$sql = "INSERT INTO user_details(userid,email,pwd) VALUES ('$rand','$email','$pass')";
$conn->query($sql);


$conn->close();
?>