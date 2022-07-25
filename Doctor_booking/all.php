<?php 
    session_start();
    require_once './dbTools.php';
    $user_id = $_SESSION['user_id']; 
    $bookings = showBookings();
    if(count($bookings) == 0)
        echo "Keine Termine Eingetragen"
?>
<html>
    <head>
        <title>all bookings</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-color:#202b38">
        <div>
            <div style="margin: auto; width:200px">
                <h1 style="color:aliceblue" >Alle Termine</h1>
            </div>
            <div style="max-width:800px; margin:auto">
                <?php foreach($bookings as $boking): ?>    
                    <p class="allbok"><?php echo "USER: ".$boking[0]." Datum: ".$boking[1]." Termin: ".$boking[2]." SVN ".$boking[3]?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>

