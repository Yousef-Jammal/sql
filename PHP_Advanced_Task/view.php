<?php require 'conction.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $get = $db->prepare("SELECT * FROM users WHERE id=" . $_REQUEST['id']. ";");
        $get->execute();
        $get = $get->fetch(PDO::FETCH_ASSOC);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $image_name = $_FILES['file1']['name'];
        $image_tmp = $_FILES['file1']['tmp_name'];

        $list = explode("." ,$image_name);

        $newImageName = uniqid();
        $newImageName .= '.' . end($list);

        $go=  'C:\xampp\htdocs\back_end\sql_with_php\PHP_Advanced_Task\image\\' . $newImageName;
        move_uploaded_file($image_tmp, $go);
    }
    ?>
    <p>Created date: <?= $get['date_created']?></p>

    <form action="" method="POST">
        <input placeholder="name" type="text" name="name" value="<?= $get['name'] ?>">
        <input placeholder="email" type="text" name="email" value="<?= $get['email'] ?>">
        <div>
            <img src=".\image\<?php echo $get['image']?>" alt="image null" width="100px">
            <input type="file" name="updateImage" >
        </div>
        <input placeholder="phone" type="text" name="phone" value="<?= $get['phone'] ?>">
        <input type="submit" value="update">
    </form>

</body>
</html>