<?php
include_once('connection.php');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$usernam = $request->username;
@$password = $request->password;
$pass = md5($password);
@$passwordnew = $request->passwordnew;
$passnew = md5($passwordnew);
$sql = "select * from register where username = '".$usernam."' and password = '".$pass."'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	$id = (int)$row['id'];
if($row ) {

    $sqlup = "update register set 
    		password = '$passnew'
    		where id = '$id'";
    $re = $conn->query($sqlup);
    echo "success";
}
else{
	echo "failed";
}
$conn->close();
 ?>