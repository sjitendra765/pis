<?php

 $postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
  @$address = $request->address;
  @$district = $request->district;
  @$email = $request->email;
  @$fax_no = $request->fax_no;
  @$last_date = $request->last_date;
  @$name = $request->name;
  @$name_eng = $request->name_eng;
  @$phone_no = $request->phone_no;
  @$position = $request->position;
  @$start_date = $request->start_date;
  @$ward_no = $request->ward_no;
  @$website  = $request->website;
  include_once('connection.php');
  $sql = "INSERT INTO office_detail ( address,district,email,fax_no,last_date,name,name_eng,
          phone_no,position,start_date,ward_no,website)
          VALUES ('".$address."','".$district."','".$email."','".$fax_no."','".$last_date."','".$name."',
            '".$name_eng."','".$phone_no."','".$position."','".$start_date."','".$ward_no."','".$website."')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "$last_id";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>