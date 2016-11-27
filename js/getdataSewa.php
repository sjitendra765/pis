<?php

 	$postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
 	@$bahali_miti = $request->bahali_miti;
	@$e_level = $request->e_level;
	@$incentive = $request->incentive;
	@$new_recruit= $request->new_recruit;
	@$nirnaya_date = $request->nirnaya_date;
	@$padh_name = $request->padh_name;
	@$Salary = $request->Salary;
	@$sanket_no = $request->sanket_no;
	@$sttar = $request->sttar;
	@$s_empname = $request->s_empname;
	@$s_no = $request->s_no;
	@$s_office_name = $request->s_office_name;
	@$per_id = $request->per_id;
	@$baduwa_miti = $request->baduwa_miti;
	include_once('connection.php');
	$sql = "INSERT INTO sewa_bibaran (bahali_miti,e_level,incentive,new_recruit,nirnaya_date,
						padh_name,Salary,sanket_no,sttar,s_empname,s_no,s_office_name,per_id,baduwa_miti)
VALUES  ('".$bahali_miti."','".$e_level."','".$incentive."','".$new_recruit."','".$nirnaya_date."',
			'".$padh_name."','".$Salary."','".$sanket_no."','".$sttar."','".$s_empname."','".$s_no."',
			'".$s_office_name."','".$per_id."','".$baduwa_miti."')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "$last_id";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	?>