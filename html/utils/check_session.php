<?php

session_start();

/* Prevents attacks in order to steal the session ID */
ini_set('session.cookie_httponly', 1);
/* Session ID cannot be passed through URLs */
ini_set('session.use_only_cookies', 1);

ini_set('session.use_strict_mode', 1);

if(!isset($_SESSION['user'])){
    header('Location:../views/login.php');
}

?>
