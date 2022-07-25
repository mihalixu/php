<?php

$host = "localhost";
$dbUser = "root";
$dbPwd = "";
$database ="booking";

//Verbindung
$con = @mysqli_connect($host,$dbUser,$dbPwd,$database);
if (!$con)
    die("error connecting database");

mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,"SET CHARACTER SET 'utf8'");


function selectUser($user,$pwd){
    global $con;
    $sql = "SELECT id,status,user_name FROM user_login WHERE user_name = '$user' AND password = '$pwd'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) == 0) // gibts uns anzahl der datensatze,wenn 0 dann return 0
        return null;
    $row = mysqli_fetch_array($result); //hole denn nächsten Datensatz     
    return $row;
}

function getDocs($datum){
    global $con;
    $sql = "select id,first_name,last_name from doctor ";
    $sql .= "where id not in (select d.id from doctor d, termine t where d.id = t.doctor_id and t.datum = '$datum')";
    $result = mysqli_query($con,$sql);
    return mysqli_fetch_all($result);
}

function insertReg($first,$last,$username,$email,$password){ //insert Reg.
    global $con;
    $sql = "INSERT INTO user_login (first_name,last_name,user_name,email,password,status) VALUES ('$first','$last','$username','$email','$password',1)";
    mysqli_query($con,$sql);
}

function insertTermin($date,$termin,$doctor){ //insert Reg.
    global $con;
    $sql = "INSERT INTO termine (datum,uhrzeit,doctor_id,status) VALUES('$date','$termin',$doctor,1)";
    mysqli_query($con,$sql);
}

function insertBuchung($user_id,$termine_id,$DayofBirth,$Social){
    global $con;
    $sql = "INSERT into gebuchte_termine (user_id,termine_id,DOB,SVN) VALUES($user_id,$termine_id,'$DayofBirth','$Social')";
    mysqli_query($con,$sql);
}

function updateStatus($termin_id){ // change status to 2 if gebucht
    global $con;
    $sql = "UPDATE termine set status = 2 where id = $termin_id";
    mysqli_query($con,$sql);
}


function getTermine($where=null){
    global $con;     
    $sql = "SELECT  t.uhrzeit,d.first_name,d.last_name,t.id,t.datum FROM termine t, doctor d where datum = '$where' and t.doctor_id = d.id and status = 1"; //datum um die tage zu filtern, status 1 frie, status 2 nicht frei;
    $result = mysqli_query($con,$sql); 
    return mysqli_fetch_all($result);
}

function showBookings($user_id=NULL){
    global $con;
    $sql = "SELECT u.user_name,t.datum,t.uhrzeit,g.SVN ";
    $sql .= "FROM gebuchte_termine g,termine t,user_login u"; 
    if($user_id != NULL){
        $sql.= " where g.user_id = u.id and g.termine_id = t.id and g.user_id = $user_id";
    }
    else{
        $sql.= " where g.user_id = u.id and g.termine_id = t.id";
    }
    $result = mysqli_query($con,$sql); 
    return mysqli_fetch_all($result);
}

function termineCnt($user_name){
    global $con; 
    $sql = "Select count(*) from gebuchte_termine where user_id = $user_name";
    $result = mysqli_query($con,$sql); 
    return mysqli_fetch_all($result);
}

function selectCnt($datum){
    global $con; 
    $sql = "Select count(*) from termine where datum = '$datum' and status = 1";
    $result = mysqli_query($con,$sql); 
    return mysqli_fetch_all($result);
}