<?php 
    $server = 'sql-service';
    $username = 'root';
    $password = 'root';
    $database = 'orbis_db';
    $driver = 'mysql';
    
    try{
        $conn = new PDO("mysql:host=$server;port=3306;dbname=$database;",$username,$password);
    }catch(PDOException $e) {
        die('Connected failed: '.$e->getMessage());
    }
  
?>