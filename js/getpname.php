<?php
	include_once('connection.php');
 	$postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
 	@$id = $request->id;
 	$sql = "select first_name ,midlle_name,last_name from personal_info where id = '$id'";
 	$result = $conn->query($sql);

	$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
    $conn->close();
?>