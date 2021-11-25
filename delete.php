<?php
include 'db.php';

$id = $_GET['delid'];
$sql = "DELETE FROM user WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo json_encode(array('message'=>'Couldnot Delete', 'status'=> 'false'));
}else{
    echo json_encode(array('message' => 'Deleted Successfully', 'status'=>'true'));
    header('location:index.php');
}
?>