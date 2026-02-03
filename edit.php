<?php
include 'db.php';
$id = $_GET['id'];

if(isset($_POST['update'])){
    mysqli_query($conn,"UPDATE posts SET title='$_POST[title]',content='$_POST[content]' WHERE id=$id");
    header("Location: dashboard.php");
}

$res = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM posts WHERE id=$id"));
?>

<form method="post">
    Title: <input type="text" name="title" value="<?php echo $res['title']; ?>"><br><br>
    <textarea name="content"><?php echo $res['content']; ?></textarea><br><br>
    <button name="update">Update</button>
</form>