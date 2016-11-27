<?php
 $target_dir = "./upload/";     
    
if(isset($_FILES['file'])){
    //The error validation could be done on the javascript client side.
    $errors= array();        
    $file_name = $_FILES['file']['name'];
    $file_size =$_FILES['file']['size'];
    $file_tmp =$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];   
    $file_name = $_FILES['file']['name'];
 $image = file_get_contents ($_FILES['file']['tmp_name']);
        $image_name = $_FILES['file']['name'];
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["name"], $target_file);
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];   
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg","jpg","png"); 
       $imagetmp=addslashes (file_get_contents($_FILES['file']['tmp_name']));
//$imagetmp = base64_encode($imagetmp);
include_once('connection.php');
//Insert the image name and image content in image_table
$sql="INSERT INTO emp_pic (emp_img) VALUES('$imagetmp')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();  
	
}
else
echo "failed";
?>