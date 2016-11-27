<?php

 $postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 include_once('connection.php');
 $sql = "update certi_exp set
 	certificate_name = '$request->certificate_name',
	certi_org_address = '$request->certi_org_address',
	certi_org_name = '$request->certi_org_name',
	certi_subject= '$request->certi_subject',
	c_employeename = '$request->c_employeename',
	end_date = '$request->end_date',
	level = '$request->level',
	remarks = '$request->remarks',
	sanket_no = '$request->sanket_no',
	seminar_training = '$request->seminar_training',
	start_date = '$request->start_date',
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