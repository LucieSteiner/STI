<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../models/users.php');
if (!empty ($_POST['login'])  and !empty($_POST['password'])){
    $role = authentify_user($_POST['login'], $_POST['password']);
    if (!is_null($role)){
	session_start();
	$_SESSION['user'] = $_POST['login'];
	$_SESSION['role'] = $role;
        header('Location: ../views/messages.php');
    }
    else{
        echo 'Wrond credentials!';
    }
}

?>
<html>
	<head>
	</head>
	<body>
		<form action="../views/login.php" method="post">
			<input type="text" name="login">
			<input type="password" name="password">
			<input type="submit" value="Log in">
		</form>
	</body>
</html>
