<?php
include_once('../models/users.php');
include_once('../utils/check_session.php');

include_once('../includes/nav_bar.php');
include_once('../includes/logout.php');
if(isset($_POST['old']) and isset($_POST['new']) and isset($_POST['new2'])){
    if($_POST['new'] != $_POST['new2']){
	echo 'Error in new password';
    }
    else{
    	if(change_user_password($_SESSION['user'], $_POST['old'], $_POST['new'], $_POST['new2'])){
	
    	    unset($_POST['old']);
    	    unset($_POST['new']);
    	    unset($_POST['new2']);
        }else{
	    echo 'Old password is wrong!';	
        }
   }
}
?>
<html>
<head>
</head>
<body>
<?php echo $_SESSION['user'];?>
<form action="../views/profile.php" method="post">
<input type="password" name="old" placeholder="Current password"><br/>
<input type="password" name="new" placeholder="New password"><br/>
<input type="password" name="new2" placeholder="Confirm new password"><br/>
<input type="submit" value="Submit">
</form>
</body>
</html>
