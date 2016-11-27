<?php

 $postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
@$usernam = $request->username;
@$password = $request->password;
$pass = md5($password);

include_once('connection.php');
$sql = "select * from register where username = '".$usernam."' and password = '".$pass."'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	$id = (int)$row['id'];
if($row ) {
    //log in the user
    session_start();
    $_SESSION['usertype'] = $row['usertype'];
    echo $_SESSION['usertype'];
}
else{
	echo "failed";
}
$conn->close();
 ?>