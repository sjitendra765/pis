<?php

 $postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 	@$S_no = $request->S_no;
	@$pos_type = $request->pos_type;
	@$taha = $request->taha;
	@$sabik_padh = $request->sabik_padh;
	@$thap = $request->thap;
	@$ghat = $request->ghat;
	@$khud_kayam = $request->khud_kayam;
	@$padh_sanket_no = $request->padh_sanket_no;
	@$remarks = $request->remarks;
	@$kar_id = $request->kar_id;
	@$start_date = $request->start_date;
	@$last_date = $request->last_date;
 include_once('connection.php');
 $sql = "INSERT INTO terij_karyalaya (S_no,pos_type,taha,sabik_padh,thap,ghat,khud_kayam,
		padh_sanket_no,remarks,kar_id,start_date,last_date)
VALUES  ('".$S_no."','".$pos_type."','".$taha."','".$sabik_padh."','".$thap."','".$ghat."','".$khud_kayam."',
		'".$padh_sanket_no."','".$remarks."','".$kar_id."','".$start_date."','".$last_date."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>