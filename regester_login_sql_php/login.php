<?php
  try{
    $db = new PDO('mysql:host=localhost; dbname=signin_login', 'root', '');

    
    $count = $db->prepare("SELECT * FROM users ORDER BY id DESC LIMIT 1;");
    $count->execute();
    $count = $count->fetch(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_REQUEST['submit'])){
            for($id=1 ; $id <= $count['id'] ; $id++){

                $database = $db->prepare("SELECT * FROM users WHERE id = $id;");
                $database->execute();
                $database = $database->fetch(PDO::FETCH_ASSOC);
                
                if( $_REQUEST['email'] == $database['email'] && $_REQUEST['pass'] == $database['pass']){
                    session_start();
                    $_SESSION['userName'] = $database['name'];
                    header('Location: homePage.php');
                    exit;
                }
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
        Email: <input type="email" name="email" >
        Password: <input type="password" name="pass" >
        <input type="submit" name="submit">
    </form>
</body>
</html>
