<?php
	$postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
 	include_once('connection.php');
 	$sql = "update section_punish set
 	appeal_date = '$request->appeal_date',
	appeal_name = '$request->appeal_name',
	punishment_date = '$request->punishment_date',
	punishment_type= '$request->punishment_type',
	remarks = '$request->remarks',
	sanket_no = '$request->sanket_no',
	s_employeename = '$request->s_employeename',	
	s_no = '$request->s_no',
	per_id = '$request->per_id'
	where id = '$request->id'";	

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>