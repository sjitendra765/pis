<?php
	include_once('connection.php');
	
	$sql = "select * from terij_karyalaya ";	
	$result = $conn->query($sql);
	$data = array();
	$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
  $data[$i] = $row;  
  $i++;
}
    print json_encode($data);
    $conn->close();
?>