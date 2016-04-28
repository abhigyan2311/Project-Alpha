<?php

session_start();

if(isset($_SESSION['userid'])){
	header("location:main.php");
}

include 'getbrowser.php';
include 'db.php';

$ip=$_SERVER['REMOTE_ADDR'];


$ua=getBrowser();
$bname = $ua['name'];
$bversion = $ua['version'];
$os = $ua['platform'];

$remail = $_POST['email'];
$rpass = $_POST['pwd'];
$currentTime = date('Y-m-d H:i:s',time());

$conn = new mysqli($servername, $username, $password, $myDatabase);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = strip_tags(stripslashes(mysqli_real_escape_string($conn,$remail)));
$pass = sha1(strip_tags(stripslashes(mysqli_real_escape_string($conn,$rpass))));

$sql="SELECT * FROM user_details WHERE email='$email' and pass='$pass'";
$rs = $conn->query($sql);

if ($rs->num_rows > 0){

    $sql2 = "SELECT * FROM user_ip WHERE ip='$ip' && ( created_at > DATE_SUB(now(), INTERVAL 1 DAY));";
    $result = mysqli_query($conn,$sql2);
    if(mysqli_num_rows($result)>0){
      $count = mysqli_num_rows($result);
      if($count>=5){
          header("location:denied.php");
       }
       else{
              while($row = $rs->fetch_assoc()) {
                      $userid = $row["userid"];
                      $_SESSION['userID']= $userid;
                  }
              $sql3="Insert into user_ip(userid,ip,browser,version,os) values('$userid','$ip','$bname','$bversion','$os')";
              $conn->query($sql3);
              header("location:main.php");
       }
    }
}
else {
	header("location:index.php");
}
?>