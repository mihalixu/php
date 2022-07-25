<?php
session_start();
require_once './dbTools.php';
$termin_id = $_SESSION['termin_id']; // get id from termine
$user_id = $_SESSION['user_id']; // get id from user


if(isset($_REQUEST['submit'])){
    if($_REQUEST['DOB'] == NULL or $_REQUEST['SVN'] == NULL){
        echo "Invalid Input";
    }
    else{
        updateStatus($termin_id); // staut goes from 1 to 2
        insertBuchung($user_id,$termin_id,$_REQUEST['DOB'],$_REQUEST['SVN']);
        header("Location: calendar.php");
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>skiresorts</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    </head>
    <body style="background-color: lightgray;">
        <div class="book">
            <div>
                <h1>Termin Buchen</h1>
            </div>
            <form action="buchung.php" method="POST" id="loginForm">
                <div>DOB</div> 
                    <div>
                        <input type="text" name="DOB" placeholder="Enter DOB"/>
                    </div>
                <div>SVN</div> 
                    <div>
                        <input type="text" name="SVN" placeholder="Enter SVN"/>
                    </div>
                <div>
                    <input type="submit" name="submit" value="Buchen"/>
                </div>
            </form>
        </div>
    </body>
</html>