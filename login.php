<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
    $row = mysqli_fetch_assoc($res);

    if(password_verify($password,$row['password'])){
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid Login";
    }
}
?>

<form method="post">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button name="login">Login</button>
</form>