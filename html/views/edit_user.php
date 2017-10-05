<?php
include_once('../models/users.php');
include_once('../utils/check_session.php');
include_once('../utils/check_admin.php');
include_once('../includes/nav_bar.php');
include_once('../includes/logout.php');

$user = get_user_detail($_POST['user_id']);

if(isset($_POST['role']) or  isset($_POST['validity']) or isset($_POST['password'])){

    if(!isset($_POST['role'])){
	$role = $user['role'];
    }else{
	$role = $_POST['role'];
    }
    if(!isset($_POST['validity'])){
	$validity = $user['validity'];
    }else{
	$validity = $_POST['validity'];
    }
    
    if(!isset($_POST['password']) or empty($_POST['password'])){
	$password = $user['password'];
    }else{
	$password = crypt($_POST['password']);
    }
    edit_user($_POST['user_id'], $user['login'], $role, $validity, $password);
    header('Location: users.php');
}

?>
<html>
    <head>
    </head>
    <body>
	<div id="user_detail">
	    <p>Login: <?php echo $user['login']; ?>
	    <p>Role: <?php if($user['role'] == 'admin'){echo "Administrator";} else{echo "Employee";}?>
	    <p>Active:<?php if($user['validity'] == 1){echo "Yes";} else{echo "No";} ?>
	</div> 
	<form action="edit_user.php" method="post">
	    <label for="role">Role</label>
	    <select name="role">
		<option selected disabled hidden>
		<option value="employee">Employee</option>
		<option value="admin">Administrator</option>
	    </select><br/>

	    <label for="validity">Active?</label>
	    <input type="radio" name="validity" value="1">Yes<br/>
	    <input type="radio" name="validity" value="0">No<br/>
	    <label for="password">Password</label>
	    <input type="password" name="password"><br/>
	    <input type="hidden" name="user_id" value="<?php echo $_POST['user_id'];?>">	    
   	    <a href="users.php"><button type="button">Cancel</button></a>
	    <input type="submit" value="Edit">
    </body>
</html>
