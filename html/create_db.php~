<?php

// Set default timezone
  date_default_timezone_set('UTC');
 
  try {
 
    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:/var/www/databases/database.sqlite');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION); 
    $file_db->exec("DROP TABLE messages"); 
    $file_db->exec("DROP TABLE users"); 
    $file_db->exec("CREATE TABLE IF NOT EXISTS users (
		    id INTEGER PRIMARY KEY AUTOINCREMENT,
		    login TEXT UNIQUE,
		    password TEXT,
		    validity INTEGER,
		    role TEXT)");	
    $file_db->exec("CREATE TABLE IF NOT EXISTS messages (
                    id INTEGER PRIMARY KEY AUTOINCREMENT, 
                    title TEXT, 
                    message TEXT, 
                    time TEXT,
		    sender INTEGER,
		    receiver INTEGER,
 		    FOREIGN KEY(sender) REFERENCES users(id),
		    FOREIGN KEY(receiver) REFERENCES users(id) )");

 
// Close file db connection
    $file_db = null;
  }
  catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }
 
?>
