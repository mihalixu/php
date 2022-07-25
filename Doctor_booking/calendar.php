<?php
  session_start();
  require_once './dbTools.php';
  $days = date("t",cal_days_in_month(CAL_GREGORIAN, 6, 2022)); // days in month
  $datumArr = array();
  $datumColors = array();
  
  for($i = date("d",time()); $i < $days; $i++){
    $datumArr[$i] = date("Y-m-$i", strtotime('today'));
    $count = selectCnt($datumArr[$i]);
    if($count[0][0] == 0)
      $datumColors [$i] = '#f08080';
    else if($count[0][0] == 1) 
      $datumColors [$i] = '#FFFF99';
    else if($count[0][0] > 1)
      $datumColors [$i] = '#9ACD32';
  }

  if(isset($_REQUEST['submit'])){
    $_SESSION['time'] = $datumArr[$_REQUEST['submit']];
    header("Location: termnine.php"); 
  }
?>

<html>
<head>
  <link rel="stylesheet" href="css/calendar.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="month">      
  <ul>
    <li>
      Juni<br>
      <span style="font-size:18px">2022</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mon</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<form action="calendar.php" method="POST">
    <ul class="days">
    <li></li>
    <li></li>
    <?php for($i = date("d",time()); $i < $days; $i++):?>
      <li><input style="background-color:<?php echo $datumColors[$i]?>;" type="submit" name="submit" value=<?php echo $i?>></li>
    <?php endfor; ?>
  </ul>
</form>
  <div class="sh">
    <div><a href="login.php">Logout</a></div>
    <div><a href="gebuchte_termine.php">Show User Bookings</a></div>
  </div>
</body>
</html>
