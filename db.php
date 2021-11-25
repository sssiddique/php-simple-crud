<?php
$conn = mysqli_connect('localhost', 'root', '', 'crud');
if(!$conn){
    return json_encode(array('message'=>'Connection Failed', 'status'=>'false'));
}else{
    return json_encode(array('message'=>'Connection Successful', 'status'=>'true'));
}
?>