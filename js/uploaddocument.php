<?php 


if(isset($_FILES['file'])){
    //The error validation could be done on the javascript client side.
    $errors= array();        
    $file_name = $_FILES['file']['name'];
    $file_size =$_FILES['file']['size'];
    $file_tmp =$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];   
    $file_name = $_FILES['file']['name'];
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];   
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg","jpg","png"); 
        $imagetmp=addslashes (file_get_contents($_FILES['file']['tmp_name']));

include_once('connection.php');
//Insert the image name and image content in image_table
$sql_img = "SELECT id from emp_document ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql_img);
    //echo "$result";
    $row_id = 0;
    if (mysqli_num_rows($result) > 0) {
   $row_id = mysqli_fetch_row($result);
   $sql_ins = "update emp_document set img = '$imagetmp',image_name = '$file_name' where id = '$row_id[0]'";
   $conn->query($sql_ins);
}
echo"successs";
$conn->close();
}  
?>