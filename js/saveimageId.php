<?php
 $postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 @$perid = $request->id;
 include_once('connection.php');
 $sql = "insert into emp_document (emp_id) values ('".$perid."')";
 if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>