<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user'])) header("Location: login.php");
?>

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<form method="post">
    Title: <input type="text" name="title"><br><br>
    Content:<br>
    <textarea name="content"></textarea><br><br>
    <button name="add">Add Post</button>
</form>

<?php
if(isset($_POST['add'])){
    mysqli_query($conn,"INSERT INTO posts(title,content) VALUES('$_POST[title]','$_POST[content]')");
}

$result = mysqli_query($conn,"SELECT * FROM posts");
while($row = mysqli_fetch_assoc($result)){
    echo "<hr>";
    echo "<b>".$row['title']."</b><br>";
    echo $row['content']."<br>";
    echo "<a href='edit.php?id=".$row['id']."'>Edit</a> | ";
    echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";
}
?>