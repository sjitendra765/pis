<?php

 $postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 	@$certificate_name = $request->certificate_name;
	@$certi_org_address = $request->certi_org_address;
	@$certi_org_name = $request->certi_org_name;
	@$certi_subject= $request->certi_subject;
	@$c_employeename = $request->c_employeename;
	@$end_date = $request->end_date;
	@$level = $request->level;
	@$remarks = $request->remarks;
	@$sanket_no = $request->sanket_no;
	@$seminar_training = $request->seminar_training;
	@$start_date = $request->start_date;
	@$s_no = $request->s_no;
	@$per_id = $request->per_id;
	include_once('connection.php');
	$sql = "INSERT INTO certi_exp (certificate_name,certi_org_address,certi_org_name,certi_subject,c_employeename,
						end_date,level,remarks,sanket_no,seminar_training,start_date,s_no,per_id)
VALUES  ('".$certificate_name."','".$certi_org_address."','".$certi_org_name."','".$certi_subject."','".$c_employeename."',
			'".$end_date."','".$level."','".$remarks."','".$sanket_no."','".$seminar_training."','".$start_date."',
			'".$s_no."','".$per_id."')";
 if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 ?>