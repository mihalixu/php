<?php
    session_start();
    require_once './dbTools.php';
    if(isset($_REQUEST['submit'])){
        $row = selectUser($_REQUEST['user'],$_REQUEST['pw']);
        if($row == null)
            $msg = "login failed";
        else{
            $_SESSION['user_id'] = $row['id'];
            if($row['status'] == 2) // admin
                header("Location: termin_admin.php");
            else
                header("Location: calendar.php");
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>
    <body>
        <div class="reg">
        <div>
            <h1>Login</h1>
            <?php if(isset($msg)) : ?>
                <div><?php echo $msg ?></div>
            <?php endif;?>
        </div>
        <form action="login.php" method="POST">
            <div>Anwender</div> 
            <div>
                <input type="text" name="user"/>
            </div>
            <div>Kennwort</div> 
            <div>
                <input type="password" name="pw"/>
            </div>
            <div>
                <input type="submit" name="submit" value="anmelden"/>
            </div>
        </form>
        </div>
    </body>
</html>