<?php 
    session_start();
    require_once './dbTools.php';
    $user_id = $_SESSION['user_id']; 
    $bookings = showBookings($user_id);
    if(count($bookings)==0)
        echo "Keine Termine eingetragen";
?>
<html>
    <head>
        <title>gebuchte_termine</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-color: lightgray;">
        <div style="max-width: 200px;margin: auto; background-color: lightblue;;"><h1>User Termine</h1></div>
        <div style="max-width:600px; margin:auto">
            <?php foreach($bookings as $boking): ?>    
                 <div class="gterm"><p><?php echo "USER: ".$boking[0]." Datum: ".$boking[1]." Termin: ".$boking[2]." SVN ".$boking[3]?></p></div>  
            <?php endforeach; ?>
        </div>
    </body>
</html>

