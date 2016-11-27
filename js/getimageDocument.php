<?php
 $postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
 	@$image_id = $request->id;
 	
 include_once('connection.php');
 	$sql = "select id,image_name from emp_document where emp_id  = '$image_id'";
 	$result = $conn->query($sql);
 	$data = array();
 	$i = 0;
while($row = mysqli_fetch_array($result)){
	$data[] = $row;
	$i++;
}

    print json_encode($data);
	$conn->close();
?>

