<?php

session_start();
if(!isset($_SESSION['user'])){
    header('Location: ../views/login.php');
}

?>
<html>
<head>
</head>
<body>
Profile <?php echo $_SESSION['user'];?>
<form action="../utils/logout.php">
<input type="submit" value="Log out">
</form>

<form action="../views/messages.php">
<input type="submit" value="My messages">
</form>

<form action="../views/profile.php">
<input type="password" placeholder="Current password"><br/>
<input type="password" placeholder="New password"><br/>
<input type="password" placeholder="Confirm new password"><br/>
<input type="submit" value="Submit">
</form>
</body>
</html>
