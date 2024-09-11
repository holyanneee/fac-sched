<?php

//From Log in form
    function sched($daysNo){
      $servername = "localhost";
      $username = "root";
      $password = "";
      // code...
      $week = [" ","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
      $days = $week[$daysNo];
      try{
        $conn = new PDO("mysql:host=$servername;dbname=tsasdb", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM sched WHERE daysched = '".$days."' AND Teacher = '".$_POST['teach']."'";
    
          if ($result = $conn->query($query)) {
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $sched_no = $row['sched_id'];
                $sub = $row['sub'];
                $d = $row['daysched'];
                $s = $row['start_time'];
                $e = $row['end_time'];
                $sem = $row['sem'];
                $sec = $row['section'];
                $sno = $row['schedNo'];
    
                if ($days == "Monday") {
                  echo
                  '<li class="cd-schedule__event">
                    <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-sched'.$sno.'" data-event="event-1" href="#0">
                    <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                    <br>'.$sub.'
                    <br>
                    <br>'.$sem.'
                    </em>
                    </a>
                   </li>';
                   
    
    
                }
    
                if ($days == "Tuesday") {
                  echo
                  '<li class="cd-schedule__event">
                    <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-con" data-event="event-2" href="#0">
                    <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                    <br>'.$sub.'
                    <br>
                    <br>'.$sem.'
                    </em>
                    </a>
                   </li>';
                }
    
                if ($days == "Wednesday") {
                  echo
                  '<li class="cd-schedule__event">
                    <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-con" data-event="event-3" href="#0">
                    <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                    <br>'.$sub.'
                    <br>
                    <br>'.$sem.'
                    </em>
                    </a>
                   </li>';
                }
    
                if ($days == "Thursday") {
                  echo
                  '<li class="cd-schedule__event">
                    <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-con" data-event="event-4" href="#0">
                    <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                    <br>'.$sub.'
                    <br>
                    <br>'.$sem.'
                    </em>
                    </a>
                   </li>';
                }
    
                if ($days == "Friday") {
                  echo
                  '<li class="cd-schedule__event">
                    <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-con" data-event="event-1" href="#0">
                    <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                    <br>'.$sub.'
                    <br>
                    <br>'.$sem.'
                    </em>
                    </a>
                   </li>';
                }
    
                if ($days == "Saturday") {
                  echo
                  '<li class="cd-schedule__event">
                    <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-con" data-event="event-2" href="#0">
                    <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                    <br>'.$sub.'
                    <br>
                    <br>'.$sem.'
                    </em>
                    </a>
                   </li>';
                }
    
              }
    
    
        }
    
      }catch(PDOException $e)
      {
        echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
        $errorMsg=  $e->getMessage();
        echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }
    
    }


?>      