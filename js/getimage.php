<?php
 $postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
 	@$image_id = $request->id;
 	
 include_once('connection.php');
 	$sql = "select emp_img from emp_pic where emp_id  = '$image_id'";
 	$result = $conn->query($sql);
 	if (mysqli_num_rows($result) > 0) {
   $row_id = mysqli_fetch_row($result);
   header('Content-type: image/jpg'); 
   echo(base64_encode($row_id[0]));
   
	}

	$conn->close();
	
?>

