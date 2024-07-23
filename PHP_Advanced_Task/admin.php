<?php require 'conction.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 120px;
        }
    </style>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>User Image</td>
                <td>Name</td>
                <td>Email</td>
                <td>Date created</td>
                <td>Phone number</td>
            </tr>
        </thead>
        <tbody>
            <?php 


            $count = $db->prepare("SELECT * FROM users ORDER BY id DESC LIMIT 1;");
            $count->execute();
            $count = $count->fetch(PDO::FETCH_ASSOC);

            if($count['id']>0):
                for($i = 1 ; $i<=$count['id']; $i++):; 
                
                    $get = $db->prepare("SELECT * FROM users WHERE id=$i;");
                    $get->execute();
                    $get = $get->fetch(PDO::FETCH_ASSOC);
                    if($get):
                    ?>
                        <tr>
                            <td><?php echo $get['id']?></td>
                            <td><img src=".\image\<?php echo $get['image']?>" alt=""></td>
                            <td><?php echo $get['name']?></td>
                            <td><?php echo $get['email']?></td>
                            <td><?php echo $get['date_created']?></td>
                            <td><?php echo $get['phone']?></td>
                            <td>
                                <a href="view.php?id=<?= $get['id']?>">more</a>
                            </td>
                        </tr>
                <?php 
                    endif;
                endfor;
            endif;?>
            <?php
            // if($_SERVER['REQUEST_METHOD'] == 'GET'){
            //     session_start();
            //     $_SESSION['id_view'] =$_REQUEST['more'];
            // }
            ?>
        </tbody>
    </table>
</body>
</html>