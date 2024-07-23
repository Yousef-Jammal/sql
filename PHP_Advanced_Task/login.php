<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 97vh;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        form{
            width: 367px;
            height: 538px;
            border-radius: 14px;
            box-shadow: 1px 1px 5px #43434369;

            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }
        form hr{
            width: 90%;
        }
        form div{
            width: 90%;
            height: 50px;
            margin: 1vh 0;
        }
        form div > input{
            width: 100%;
            height: 30px;
            outline: none;
            margin: 0;
        }
        form p{
            margin: 0;
            color: red;
        }
        form > input{
            width: 100px;
            height: 30px;
            border-radius: 5px;
            border: none;
            box-shadow:1px 1px 5px #36363696;
            cursor: pointer;
        }
        form > input:hover{
            background-color: green;
        }
        form a {
            margin: 2px 0;
        }
    </style>
</head>
<body>
    <form action="<?php?>" method="POST" >
        <h1>REGESTER</h1>
        <hr>
        
        <div>
            <input type="email" name="" id="email" placeholder="Email">
            <p>fds</p>
        </div>
        
        <div>
            <input type="password" name="" id="password" placeholder="Password">
            <p>fds</p>
        </div>
     
        <input type="submit" value="SIGN IN">
        <hr>
        <a href="regester.php">Sign in</a>
        <a href="home.php">Home</a>
    </form>
</body>
</html>