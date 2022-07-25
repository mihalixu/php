<?php
 session_start();
 require_once './dbTools.php';
 $time = $_SESSION['time']; // datum aus dem kalendar
 $termine = getTermine($time);
 
 if($termine != NULL)
    $_SESSION['termin_id'] = $termine[0][3];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>termine</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-color: lightgray;">
        <div class="th">
            <h1>Termine</h1>
        </div>
            <div class="hwar">
                <?php if(count($termine) == 0) echo "Keine Termine eingentragen!" ?>
            </div>
            <div style="max-width:400px; margin:auto">
                <?php foreach($termine as $termin): ?>
                    <div class="term">
                    <a href="buchung.php"><?php echo $termin[0]." Dr. ".$termin[1]. " ".$termin[2]. " ".$termin[4] ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
    </body>
</html>
