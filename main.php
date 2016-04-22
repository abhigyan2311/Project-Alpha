<?
session_start();

//if(!isset($_SESSION['username'])){
//	header("location:index.php");
//}

$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.havenondemand.com/1/api/sync/analyzesentiment/v1?text=I+love+apples+%3C3&apikey=7cb8c3d6-1f57-4525-b368-8cab997adf85'
));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// Send the request & save response to $resp
$resp = curl_exec($curl);
if(!curl_exec($curl)){
    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
echo $resp;
// Close request to clear up some resources
curl_close($curl);


?>

<html>
<head>
  <title>Home : Project Alpha</title>
</head>
<body>

</body>
</html>