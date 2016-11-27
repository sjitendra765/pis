<?php
include_once('connection.php');
	$postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 $sql = "update terij_karyalaya set
 		S_no = '$request->S_no',
	pos_type = '$request->pos_type',
	taha = '$request->taha',
	sabik_padh = '$request->sabik_padh',
	thap = '$request->thap',
	ghat = '$request->ghat',
	khud_kayam = '$request->khud_kayam',
	padh_sanket_no = '$request->padh_sanket_no',
	remarks = '$request->remarks',
	kar_id = '$request->kar_id',
	start_date = '$request->start_date',
	last_date = '$request->last_date'
	where id = '$request->id'";
	if($conn->query($sql) ===true){
		echo"sucess";
	}
	else{
		echo"failed";
	}
	$conn->close();
?>