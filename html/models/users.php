<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('../utils/db.php');

function authentify_user($login, $password){
    $file_db = connect();
    $result = $file_db->prepare('SELECT login, password, validity, role FROM users WHERE login = ?');  
    $result->execute(array($login));
   
    $data = $result->fetchAll();
    if(!empty($data)){   
        foreach($data as $row){
            $password_hash = $row['password'];
	    $validity = $row['validity'];
	    $role = $row['role'];
        }
	if($validity == 1){
            if($password_hash == crypt($password, $password_hash)){
                return $role;
            }
        }
    }    
    $file_db = disconnect();
    return null;
}

function change_user_password($old, $new, $new2){
    //TODO
}

//admin functions
?>
