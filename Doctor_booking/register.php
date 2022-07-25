<?php
    require_once './dbTools.php';

    $empty = 0;
    if(isset($_REQUEST['submit'])){
        foreach($_REQUEST as $key){
            if($key == ""){
              $empty = 1;
              break;
            }    
        }
        if($empty == 0){
            insertReg($_REQUEST['first_name'],$_REQUEST['last_name'],$_REQUEST['username'],$_REQUEST['email'],$_REQUEST['password']);
            header("Location: login.php");
        }
        else{
            echo "Invalid Registration";
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    </head>
    <body style="background-color: lightgray;">
    <form action="register.php" method="POST">
        <div class="reg">
            <div>
                <h1>Registration</h1>
            </div>
            <div>
                <input type="text" name="first_name" placeholder="Enter First Name"/>
            </div>
            <div>
                <input type="text" name="last_name" placeholder="Enter Last Name"/>
            </div>
            <div>
                <input type="text" name="email" placeholder="Enter Email"/>
            </div>
            <div>
                <input type="text" name="username" placeholder="Enter Username"/>
            </div>
            <div>
                <input type="text" name="password" placeholder="Enter Password"/>
            </div>
            <div>
                <input type="submit" name="submit" value="Registrieren"/>
            </div>
        </div>
    </form>
    </body>
</html>
