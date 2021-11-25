<?php
include ('db.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "INSERT INTO user(name, password) VALUES('$name', '$password')";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "Couldnot Insert";
    }else{
        echo "Inserted";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <div class="input-field">
        <form action="" method="POST">
            <input type="text" name="name"><br>
            <input type="text" name="password"><br>
            <input type="submit" name="submit">
        </form>
    </div>
    <hr>
    <div class="table">
        <table>
            <tbody>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>password</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
<?php
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></a></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><a href="edit.php?eid=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="delete.php?delid=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
<?php
        }
    }
?>
            </tbody>
        </table>
    </div>
</body>
</html>