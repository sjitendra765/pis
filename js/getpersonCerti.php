<?php
$postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
	include_once('connection.php');
	$sql = "select* from certi_exp where per_id = '$request->id'";
	$result = $conn->query($sql);

	$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
    $conn->close();
?>