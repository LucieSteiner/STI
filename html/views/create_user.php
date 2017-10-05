<?php
include_once('../models/users.php');
include_once('../utils/check_session.php');
include_once('../utils/check_admin.php');
include_once('../includes/nav_bar.php');
include_once('../includes/logout.php');


if(isset($_POST['login']) and isset($_POST['role']) and isset($_POST['validity']) and isset($_POST['password'])){
    $result = create_user($_POST['login'], $_POST['role'], $_POST['validity'], crypt($_POST['password']));
    if(!$result){
	echo 'This username is not available!';
    }
    else{
	header('Location: users.php');
    }
}

?>
<html>
    <head>
    </head>
    <body>
	<form action="create_user.php" method="post">
	    <label for="login">Login</label>
	    <input type="text" name="login"><br/>

	    <label for="role">Role</label>
	    <select name="role">
		<option value="employee">Employee</option>
		<option value="admin">Administrator</option>
	    </select><br/>

	    <label for="validity">Active?</label>
	    <input type="radio" name="validity" value="1">Yes<br/>
	    <input type="radio" name="validity" value="0">No<br/>
	    <label for="password">Password</label>
	    <input type="password" name="password"><br/>
	    
   	    <a href="users.php"><button type="button">Cancel</button></a>
	    <input type="submit" value="Create">
    </body>
</html>
