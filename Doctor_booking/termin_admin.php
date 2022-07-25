<?php
  require_once './dbTools.php';
  
  $curentDay = date("Y-m-d"); // refresh day
  if(isset($_REQUEST['newDay'])){
    $curentDay = $_REQUEST['date'];
  }

  if(isset($_REQUEST['submit'])){
    $termin = $_REQUEST['time1']."-".$_REQUEST['time2']; // von bis -
    $curentDay = $_REQUEST['date'];
    $doc = explode(" ",$_REQUEST['doc']); // doctor
    if($curentDay != NULL and $termin != NULL and $doc != NULL){
      insertTermin($curentDay,$termin,$doc[0]);
    }
    else{
      echo "Invalid Inuput";
    }
  }
  $doctors = getDocs($curentDay); // komplexe subq
  ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>admin</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-color: #202b38;">
    <div class="admin">
          <h1 style="text-align: center;">Termine hinzufügen</h1>
        <form action="termin_admin.php" method="POST">
          <div>
            <h4>Tag: <?php echo $curentDay?></h4>
            <input id="time" type="date" name="date"  value=<?php echo $curentDay ?> min=<?php echo date("Y-m-d")?> max="2022-06-30">
            <input type="submit" name="newDay"value="Add New Day">
          <div> 
            <h4>Von-Bis</h4>
            <input type="time" name="time1" value="08:00">
            <input type="time" name="time2" value="08:30">
          </div>
          <div>
            <h4>Doctor</h4>
            <select name="doc">
              <?php foreach($doctors as $doc): ?>
                <option><?php echo $doc[0]. " ".$doc[1]." ".$doc[2]?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <br>
          <input type="submit" name="submit" value="Add new termin">
        </form>
    </div>
    <div>
          <button><a a href="all.php">ALL BOOKINGS</a>  </button>
    </div>  
    </body>
</html>