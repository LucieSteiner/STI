<?php
include_once('../models/messages.php');
include_once('../utils/check_session.php');
include_once('../includes/nav_bar.php');
include_once('../includes/logout.php');
//TODO: check if the user is the receiver
if(!isset($_GET['id'])){
    header('Location: messages.php');
}

$message = get_message_detail($_GET['id']);

?>
<html>
    <head>
    </head>
    <body>
	<form action="messages.php">
	    <input type="submit" value="Return to messages">
	</form>
        <p>From: <?php echo $message['sender']; ?>
	<p>Title: <?php echo $message['title']; ?>
	<p>Time: <?php echo $message['time']; ?>
	<p>Message: <br/><br/><?php echo $message['message'];?>
	<form action="../utils/delete_message.php" method="post">
	    <input type="hidden" name="msg" value="<?php echo $message['id'];?>">
	    <input type="submit" value="Delete">
	</form>
	<form action="write_message.php" method="post">
	    <input type="hidden" name="reply_to" value="<?php echo $message['sender'];?>">
	    <input type="hidden" name="reply_title" value="<?php echo $message['title'];?>">
	    <input type="submit" value="Reply">
	</form>
    </body>
</html>
