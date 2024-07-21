<?php
  try{
    $db = new PDO('mysql:host=localhost; dbname=signin_login', 'root', '');

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_REQUEST['submit'])){
            if($_REQUEST['username'] && $_REQUEST['email'] && $_REQUEST['pass'] && $_REQUEST['pass'] == $_REQUEST['confirmPass']){
                $set = "INSERT INTO users (name, email, pass) VALUES ('" . $_REQUEST['username'] ."','". $_REQUEST['email'] ."','". $_REQUEST['pass']  ."');";
                $db->exec($set);
                header('Location: login.php');
                exit;
            }else{
                header('Location: '.$_SERVER['PHP_SELF']);
                exit;
            }
        }
    }

  }catch(PDOException $e){
    echo 'field ' . $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="get">
        Name: <input type="text" name="username" >
        Email: <input type="email" name="email" >
        Password: <input type="password" name="pass" >
        Confirm Password: <input type="password" name="confirmPass" >
        <input type="submit" name="submit">
    </form>
</body>
</html>
