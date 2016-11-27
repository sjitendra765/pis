<?php
$postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 include_once('connection.php');
 $sql = "update heath_holidays set
	absent_left = '$request->absent_left',
	absent_taken = '$request->absent_taken',
	absent_total = '$request->absent_total',
	description= '$request->description',
	education_left = '$request->education_left',
	education_taken = '$request->education_taken',
	education_total = '$request->education_total',
	emergency_left = '$request->emergency_left',
	emergency_taken = '$request->emergency_taken',
	emergency_total = '$request->emergency_total',
	h_left = '$request->h_left',
	h_taken = '$request->h_taken',
	h_total = '$request->h_total',
	paternity_left = '$request->paternity_left',
	paternity_taken = '$request->paternity_taken',
	paternity_total= '$request->paternity_total',
	remarks = '$request->remarks',
	sick_left = '$request->sick_left',
	sick_taken = '$request->sick_taken',
	sick_total = '$request->sick_total',	
	treatment_date = '$request->treatment_date',
	per_id = '$request->per_id'
	where id = '$request->id'";
	

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>