<?php
include_once('../models/messages.php');
session_start();
if(isset($_POST['msg']) and isset($_SESSION['user'])){
    echo $_POST['msg'];
    $recv = get_message_receiver($_POST['msg']);
    echo $recv;
    if($recv == $_SESSION['user']){
	delete_message($_POST['msg']);
	header('Location: ../views/messages.php');
    }

}

?>
