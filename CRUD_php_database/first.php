<?php
    $dsn = 'mysql:host=localhost;dbname=employees_crud';
    $user = 'root';
    $password = '';

    try{
      $db = new PDO($dsn, $user, $password);

      if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(isset($_GET['creat'])){
          $set = "INSERT INTO employees (name, address, salary) VALUES ('" . $_REQUEST['name'] . "','" . $_REQUEST['address'] . "', " . $_REQUEST['salary'] ." );";
          // echo $set;
          $db->exec($set);
          $set = '';
        }
      }
      
      $count = $db->prepare("SELECT id AS total FROM employees ORDER BY id DESC LIMIT 1;");
      $count->execute();
      $count = $count->fetch(PDO::FETCH_ASSOC);

      // $getUser = $db->prepare("SELECT * FROM employees where id=$i;");

      // $getUser->execute();

      // $getUser = $getUser->fetch(PDO::FETCH_ASSOC);
      // if($getUser):


      if($_SERVER['REQUEST_METHOD'] == "GET"){
        for($id=1; $id<=$count['total'] ;$id++){
          if(isset($_GET["delete$id"])){
            $set = "DELETE FROM employees WHERE id=$id;";
            // echo $set;
            $db->exec($set);
          }
        }
      }


        
          

        
        

    }catch(PDOException $E){
        echo 'filed ' . $E->getMessage();
        // echo '';
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <h1>CRUD Application</h1>

    <form id="up" method="get">
      <label for="inputName">Name</label>
      <input type="text" id="inputName" placeholder="Please enter your name" name="name"/>

      <label for="inputAge">Address</label>
      <input type="text" id="inputAge" placeholder="Please enter your Address" name="address"/>

      <label for="inputAddress">Salary</label>
      <input type="number" id="inputAddress" placeholder="Please enter your salary" name="salary"/>
      

      <input type="submit" id="creatBtn" name="creat" value="CREAT">
      <input type="submit" id="updateBtn" onclick="update()" name="update" value="UPDATE">
    </form>

    <hr style="margin: 3vh 0" />

    <div style="display: flex; justify-content: center">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          
          $count = $db->prepare("SELECT id AS total FROM employees ORDER BY id DESC LIMIT 1;");
          $count->execute();
          $count = $count->fetch(PDO::FETCH_ASSOC);

          for($i=1; $i<=$count['total'] ; $i++): ?>
          <?php  $getUser = $db->prepare("SELECT * FROM employees where id=$i;");

          $getUser->execute();

          $getUser = $getUser->fetch(PDO::FETCH_ASSOC);
          if($getUser):
          ?>

          <tr>
            <td class="tdOk nameTable${idForData}"><?php echo $getUser["name"] ?></td>
            <td class="tdOk addressTable${idForData}"><?php echo $getUser['address'] ?></td>
            <td class="tdOk emailTable${idForData}"><?php echo $getUser['salary'] ?></td>
            <td class="tdOk">
                <form action="" method="get">
                  <input type="submit" value="delete" class="td-delete_all" name="delete<?php echo $getUser['id']?>">
                  <input type="submit" value="Edit" class="td-edit_all" name="update<?php echo $getUser['id']?>">
                </form>
            </td>
          </tr>
          <?php endif; ?>
          <?php endfor; ?>

        </tbody>
      </table>
    </div>


    
      
    <script src="js.js"></script>
  </body>
</html> 
