<?php
	$postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 include_once('connection.php');
 $sql = "delete from emp_document where id = '$request->id'";
 if($conn->query($sql) === true){
 	echo "success";
 }
 else{
 	echo "delete";
 }
 $conn->close();
?>