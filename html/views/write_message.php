<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../models/messages.php');
include_once('../utils/check_session.php');
include_once('../includes/nav_bar.php');
include_once('../includes/logout.php');
if(isset($_POST['to']) and isset($_POST['title']) and isset($_POST['message'])){
    write_message($_SESSION['user'], $_POST['to'], $_POST['title'], $_POST['message']);
    header('Location: messages.php');
}
if(isset($_POST['reply_to']) and isset($_POST['reply_title'])){
    $to = $_POST['reply_to'];
    $title = $_POST['reply_title'];
    unset($_POST['reply_to']);
    unset($_POST['reply_title']);
}
else{
    $to = '';
    $title = '';
}

?>
<html>
    <head>
    </head>
    <body>
	<form action="messages.php">
	    <input type="submit" value="Return to messages">
	</form>
        <form action="write_message.php" method="post">
	    <label>To: </label>
	    <input type="text" name="to" value="<?php echo $to;?>"><br/>
	    
	    <label>Title: </label>
	    <input type="text" name="title" value="<?php echo $title;?>"><br/>
	
	    <label>Message:</label><br/>
	    <textarea name="message"></textarea><br/>

	    <input type="submit" value="Submit">
	</form>

    </body>

</html>
