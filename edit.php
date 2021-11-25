<?php
include 'db.php';
$id = $_GET['eid'];
if(isset($_POST['update'])){  
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sqlins = "UPDATE user SET name='$name', password='$password' WHERE id='$id'";
    $result = mysqli_query($conn, $sqlins);
    if(!$result){
        echo json_encode(array('message'=>'Can Not update', 'status'=> 'false'));
    }else{
        echo json_encode(array('message' => 'Updated Successfully', 'status'=>'true'));
        header('location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <div class="input-field">
<?php
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
?>
        <form action="" method="POST">
             <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
             <input type="text" name="password" value="<?php echo $row['password']; ?>"><br>
            <input type="submit" name="update">
        </form>
<?php
    }
?>
    </div>
</body>
</html>