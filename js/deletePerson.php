<?php
include_once('connection.php');
	$postdata = file_get_contents("php://input");
 $request = json_decode($postdata);

 $sql = "delete from personal_info where id = $request->id";
 if($conn->query($sql) === true){
 	echo"success";
 	 }
 	 else{
 	 	echo "$sql";
 	 }
 	$conn->close(); 
?>