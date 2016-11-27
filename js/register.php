<?php
include_once('connection.php');
	$postdata = file_get_contents("php://input");
 	$request = json_decode($postdata);
 	@$username = $request->username;
 	@$password = md5($request->password);
 	@$firstname = $request->firstname;
 	@$lastname = $request->lastname;
 	@$usertype = $request->usertype;
 	
 	$sql = "insert into register (username,password,firstname,lastname,usertype) values (
 		'".$username."','".$password."','".$firstname."','".$lastname."','".$usertype."')";
	if ($conn->query($sql) === TRUE) {
    
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>