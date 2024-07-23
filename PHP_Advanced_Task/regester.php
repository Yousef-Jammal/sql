<?php 
// require 'conction.php';

    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    try{
        $db = new PDO("mysql:host=localhost; dbname=admin_users", 'root', '');
    }catch(PDOException $e){
        echo 'field ' . $e->getMessage();
    }


    // $set = "INSERT INTO  admins (name, email, pass) VALUES ('yousef', 'fjs@ds.com', 'fjsdk234')";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $GLOBALS['ErrorName'] = '';
        $GLOBALS['ErrorEmail'] = '';
        $GLOBALS['ErrorPhone'] = '';
        $GLOBALS['ErrorPassword'] = '';
        $GLOBALS['ErrorConfirmPassword'] = '';

        if(isset($_POST['submit'])){

            $image_name = $_FILES['file1']['name'];
            $image_tmp = $_FILES['file1']['tmp_name'];
            
            $list = explode("." ,$image_name);
            
            $newImageName = uniqid();
            $newImageName .= '.' . end($list);
            
            $go=  'C:\xampp\htdocs\back_end\sql_with_php\PHP_Advanced_Task\image\\' . $newImageName;
            move_uploaded_file($image_tmp, $go);
            $set = "INSERT INTO  users (name, email, pass, phone, date_created, image) VALUES ('yousef', 'fjs@ds.com', 'fjsdk234', 90432234, '2020-1-1', '$newImageName' )";
            $db->exec($set);
    

            $regEx_name = '/^[a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+$/';
            $regEx_phone = '/^\d{10}$/';
            $regEx_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            $regEx_pass = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=]).{8,30}$/';
            
            if(!preg_match($regEx_name, $_POST['name'])){
                $GLOBALS['ErrorName'] = 'Invalid name. It must consist of four sections, each containing only letters.';
            }
            if(!preg_match($regEx_email, $_POST['email'])){
                $GLOBALS['ErrorEmail'] = 'The email address is invalid. Please enter a valid email address.';
            }
            if(!preg_match($regEx_phone, $_POST['phone'])){
                $GLOBALS['ErrorPhone'] = 'Ten numbers';
            }
            if(!preg_match($regEx_pass, $_POST['password'])){
                $GLOBALS['ErrorPassword'] = 'Invalid password. Must be 8-30 chars with upper, lower, digit, and special char.';
            }
            if($_POST['password'] != $_POST['confPassword']){
                $GLOBALS['ErrorConfirmPassword'] = 'error';
            }
            if( preg_match($regEx_name, $_POST['name']) && preg_match($regEx_email, $_POST['email']) && preg_match($regEx_pass, $_POST['password']) && $_POST['password'] == $_POST['confPassword']){
                $setData = "INSERT INTO users VALUES ()";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regester</title>
    <link rel="stylesheet" href="regesterStyle.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>REGESTER</h1>
        <hr>
        <input type="file" name="file1" id="" >
        <div style="margin: 3vh 0 ;">
            <input type="text" name="name" id="name" placeholder="Name">
            <p><?php echo $GLOBALS['ErrorName'];?></p>
        </div>
        
        <div style="margin: 3vh 0 ;">
            <input type="text" name="email" id="email" placeholder="Email">
            <p><?php echo $GLOBALS['ErrorEmail'];?></p>
        </div>

        <div style="margin: 3vh 0 ;">
            <input type="number" name="phone" id="phone" placeholder="Phone number">
            <p><?php echo $GLOBALS['ErrorPhone'];?></p>
        </div>
        
        <div style="margin: 3vh 0 ;">
            <input type="password" name="password" id="password" placeholder="Password">
            <p><?php echo $GLOBALS['ErrorPassword'];?></p>
        </div>
      
        <div style="margin: 3vh 0 ;">
            <input type="password" name="confPassword" id="confirmPassword" placeholder="Confirm Password">
            <p><?php echo $GLOBALS['ErrorConfirmPassword'];?></p>
        </div>
     
        <input type="submit" value="SIGN IN" name="submit">
        <hr>
        <a href="login.php">Log in</a>
        <a href="home.php">Home</a>
    </form>

</body>
</html>