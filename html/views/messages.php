<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location:login.php');
}
?>
<html>
<head>
</head>
<body>
Hello <?php echo $_SESSION['user']; echo 'Role: '.$_SESSION['role'];?>

<form action="../utils/logout.php" method="post">
<input type="submit" value="Log out">
</form>
<form action="../views/profile.php">
<input type="submit" value="My profile">
</form>
</body>
</html>

