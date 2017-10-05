<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../utils/check_session.php');
include_once('../utils/check_admin.php');
include_once('../models/users.php');
include_once('../includes/nav_bar.php');
include_once('../includes/logout.php');
$users = get_all_users();
?>
<html>
    <head>
    </head>
    <body>
	<form action="create_user.php">
	    <input type="submit" value="Create new user">
	</form>
	<ul>
	    <?php foreach($users as $user){ ?>
	    <li>
		<?php echo $user['login']; if (get_user_id($_SESSION['user']) != $user['id']){?>

	    	<form action="edit_user.php" method="post">
		    <input type="hidden" name="user_id" value="<?php echo $user['id'];?>">
		    <input type="submit" value="Edit">
		</form>
		<form action="../utils/delete_user.php">
		    <input type="hidden" name="to_delete" value="<?php echo $user['id'];?>">
		    <input type="submit" value="Delete">
		</form>	
		<?php } ?>
	    </li>    
	    <?php } ?>
	</ul>
    </body>
</html>
