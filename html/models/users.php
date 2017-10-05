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

function change_user_password($user, $old, $new, $new2){
    // check if old is correct
    // check if new and new2 are equal
    
        if(!is_null(authentify_user($user, $old))){
	    $password = crypt($new);
	    $file_db = connect();
	    $file_db->exec("UPDATE users SET password = '{$password}' WHERE login = '{$user}'");
            return true;
	}
    
    return false;
}

//admin functions
function get_all_users(){
    $file_db = connect();
    $result = $file_db->query("SELECT id, login FROM users");
    return $result;
}
function get_user_id($user){
    $file_db = connect();
    $result = $file_db->prepare("SELECT id FROM users WHERE login = ?");
    $result->execute(array($user));
    $data = $result->fetch();
    return $data['id'];
}
function get_user_detail($user){
    $file_db = connect();
    $result = $file_db->prepare("SELECT login, validity, role, password FROM users WHERE id = ?");
    $result->execute(array($user));
    $data = $result->fetch();
    return $data;
}
function delete_user($id){
    $file_db = connect();
    $file_db->exec("DELETE FROM users WHERE id = '{$id}'");
    disconnect();

}
function edit_user($id, $user,$role,$validity,$password){
    $file_db = connect();
    $command = $file_db->prepare("UPDATE users SET login = ?, role = ?, validity = ?, password = ? WHERE id = ?");
    $command->execute(array($user, $role, $validity, $password, $id));
    disconnect();
}

function create_user($user, $role, $validity, $password){
    try{
        $file_db = connect();
        $command = $file_db->prepare("INSERT INTO users (login, role, validity, password) VALUES (?,?,?,?)");
        $command->execute(array($user, $role, $validity, $password));
        disconnect();
    }
    catch(PDOException $e){
        return false;
    }
    return true;

}
?>
