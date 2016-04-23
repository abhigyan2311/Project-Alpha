<html>
<?php
include 'db.php';

$conn = mysqli_connect($servername,$username,$password,$myDatabase);
if(!$conn){}
else{echo "connected<br>";}

$ip = "::3";
$userid = "12345";
$browser = "Safari";
$version = "9.0";
$os = "MAC";

$sql = "select * from user_ip where ip='$ip'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    echo "ip present<br>";
    $count = mysqli_num_rows($result);
    echo $count."<br>";
    if($count>2){
        echo "access denied";
    }
    else{
        echo "access granted<br>";
        $sql = "insert into user_ip(userid,ip,browser,version,os) values('$userid','$ip','$browser','$version','$os')";
        if(mysqli_query($conn,$sql)){
            echo "new ip updated";
        }
        else{
            echo mysqli_error($conn);
        }
    }

}
else{
    echo "it is a new ip";
    $sql = "insert into user_ip(userid,ip,browser,version,os) values('$userid','$ip','$browser','$version','$os')";
    if(mysqli_query($conn,$sql)){
        echo "new ip updated";
    }
    else{
        echo mysqli_error($conn);
    }
}

?>
</html>