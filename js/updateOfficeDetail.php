<?php
include_once('connection.php');
 $postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 $sql = "update office_detail set 
  address = '$request->address',
  district = '$request->district',
  email = '$request->email',
  fax_no = '$request->fax_no',
  last_date = '$request->last_date',
  name = '$request->name',
  name_eng = '$request->name_eng',
  phone_no = '$request->phone_no',
  position = '$request->position',
  start_date = '$request->start_date',
  ward_no = '$request->ward_no',
  website  = '$request->website' 
  where id = '1'
  ";  
  
if ($conn->query($sql) === TRUE) {
    
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>