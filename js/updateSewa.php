<?php
$postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 include_once('connection.php');
 $sql = "update sewa_bibaran set 
 bahali_miti = '$request->bahali_miti',
	e_level = '$request->e_level',
	incentive = '$request->incentive',
	new_recruit= '$request->new_recruit',
	nirnaya_date = '$request->nirnaya_date',
	padh_name = '$request->padh_name',
	Salary = '$request->Salary',
	sanket_no = '$request->sanket_no',
	sttar = '$request->sttar',
	s_empname = '$request->s_empname',
	s_no = '$request->s_no',
	s_office_name = '$request->s_office_name',
	per_id = '$request->per_id' 
	where id  = '$request->id' ";
	if ($conn->query($sql) === TRUE) {
		
    echo "New record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); 

?>