<?php


$host='localhost';
$username='pi';
$pwd='CSCE482$$';
$db='eyedoorbell';

$con=mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');

if(mysqli_connect_error($con))
{
	echo "Failed to connect";
}

$query=mysqli_query($con,"SELECT date_time_taken,audio_url FROM photos ORDER BY date_time_taken DESC");



while($row=mysqli_fetch_array($query))
{
	$rows[] = array(
	"time" => $row['date_time_taken'],
	"message" => $row['audio_url']);
	//"message"  => base64_encode($row['msg']));

}
echo json_encode($rows);


mysqli_close($con);

?>
