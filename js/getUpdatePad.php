<?php
include_once('connection.php');
	$postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 $sql = "select * from terij_karyalaya where id = '$request->id'";
 $result = $conn->query($sql);

	$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
    $conn->close();
 ?>