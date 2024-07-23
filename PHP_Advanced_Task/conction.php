<?php 
    try{
        $GLOBALS['db'] = new PDO("mysql:host=localhost; dbname=admin_users", 'root', '');
    }catch(PDOException $e){
        echo 'field ' . $e->getMessage();
    }
?>