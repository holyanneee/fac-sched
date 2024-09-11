<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST["sub_sched"])){
    
    $sub = $_POST['subject'];
    $sec = $_POST['section'];
    $day = $_POST['day'];
    $sem = $_POST['semester'];
    $yrl = $_POST['year'];
    $dep = $_POST['department'];
    $stt = $_POST['start_time'];
    $ent = $_POST['end_time'];
    $tca = $_POST['teach'];
    try{
    $conn = new PDO("mysql:host=$servername;dbname=tsasdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT COUNT(schedNo) AS Sched_No FROM sched WHERE Teacher = '".$tca."'";
    if ($result = $conn->query($query)) {
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $insert = "INSERT INTO sched(subject, section, daysched, sem, year, department, start_time, end_time, Teacher, schedNo)
            VALUES ('".$sub."', '".$sec."', '".$day."', '".$sem."', '".$yrl."','".$dep."', '".$stt."', '".$ent."', '".$tca."', ".($row['Sched_No']+1).")";
            $conn->exec($insert);
            header("location:sched.php");
        }  
    } else {
        $output .= "No users are available to chat.";
    }

    

}catch(PDOException $e)
{
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}

}
?>