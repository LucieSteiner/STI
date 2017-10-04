<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../models/messages.php');
session_start();
if(!isset($_SESSION['user'])){
    header('Location:login.php');
}

$messages = get_messages($_SESSION['user']);
?>
<html>
    <head>
    </head>
    <body>
	Hello <?php echo $_SESSION['user']; echo 'Role: '.$_SESSION['role'];?>

        <form action="../views/profile.php">
            <input type="submit" value="My profile">
        </form>

        <form action="../utils/logout.php" method="post">
    	    <input type="submit" value="Log out">
	</form><br/>
	<form action="../views/write_message.php">
	    <input type="submit" value="Nouveau message">
	</form>

	<?php 
	    foreach($messages as $message){
	?>
	<li>
	    <a href="../views/message_detail.php?id=<?php echo $message['id'];?>">
	        <ul>
		    <p> From: <?php echo $message['sender'];?>
		    <p> Subject: <?php echo $message['title'];?>
		    <p> Time: <?php echo $message['time'];?>
		    <form action="../utils/delete_message.php" method="post">
			<input type="hidden" name="msg" value="<?php echo $message['id'];?>">
			<input type="submit" value="Delete">
		    </form>
		    <form action="write_message.php" method="post">
			<input type="hidden" name="reply_title" value="<?php echo $message['title'];?>">
			<input type="hidden" name="reply_to" value="<?php echo $message['sender'];?>">
			<input type="submit" value="Reply">
		    </form>
	        </ul>
	    </a>
	</li>
	<?php } ?>
    </body>
</html>

