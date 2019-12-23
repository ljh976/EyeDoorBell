<?php


$host='localhost';
$username='root';
$pwd='';
$db='eyedoorbell';

$con=mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');

if(mysqli_connect_error($con))
{
	echo "Failed to connect";
}

$query=mysqli_query($con,"SELECT date_time_taken,recognized_as,image_url FROM photos ORDER BY date_time_taken DESC");



while($row=mysqli_fetch_array($query))
{
	$rows[] = array(
	"time" => $row['date_time_taken'],
	"name" => $row['recognized_as'],
	"image" => $row['image_url']);
	//"image"  => base64_encode($row['img']));

}
echo json_encode($rows);


mysqli_close($con);

?>
