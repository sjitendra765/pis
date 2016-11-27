<?php
	include_once('connection.php');
	$sql = "select* from terij_karyalaya";
	$result = $conn->query($sql);

	$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
    $conn->close();
?>