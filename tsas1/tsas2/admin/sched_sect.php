<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['tsasaid']==0)) {
  header('location:logout.php');
  } else{

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>PUP Admin : Dashboard</title>
    <link href="../assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="../assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
   
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Schedule 
                                <a href="sched.php" type="button" class="btn btn-primary">View by Teacher</a></h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-8 p-r-0 title-margin-right">

                    <form id="sectform" method="POST">
                      <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
    
                      <?php include_once('assets/addsched.php');?>
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="addScheduleModalLabel">Add Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              
                              <div class="form-group">
                                <label for="subject">Subject</label>
                                <select class="form-control" id="ID" name="subject">
                                <?php
                                          try {
                                            $sql = "SELECT ID, course_title FROM tblsubject";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                    
                                            if($query->rowCount() > 0) {
                                              foreach($results as $row) {
                                                echo '<option value="' . $row->course_title . '">' . $row->course_title . '</option>';
                                              }
                                            } else {
                                              echo '<option>No subjects found</option>';
                                            }
                                          } catch (PDOException $e) {
                                            echo 'Error: ' . $e->getMessage();
                                          }
                                          ?>
                                
                                  <!-- Add more subjects as needed -->
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="day">Day of Schedule</label>
                                <select class="form-control" id="daysched" name="day">
                                  <option value="Monday">Monday</option>
                                  <option value="Tuesday">Tuesday</option>
                                  <option value="Wednesday">Wednesday</option>
                                  <option value="Thursday">Thursday</option>
                                  <option value="Friday">Friday</option>
                                  <option value="Saturday">Saturday</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="section">Section</label>
                                <select class="form-control" id="section" name="section">
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <!-- Add more sections as needed -->
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="semester">Semester</label>
                                <select class="form-control" id="seme" name="semester">
                                  <option value="1st Semester">1st Semester</option>
                                  <option value="2nd Semester">2nd Semester</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="year">Year Level</label>
                                <select class="form-control" id="year" name="year">
                                  <option value="1st Year">1st Year</option>
                                  <option value="2nd Year">2nd Year</option>
                                  <option value="3rd Year">3rd Year</option>
                                  <option value="4th Year">4th Year</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="department">College Department</label>
                                <select class="form-control" id="department" name="department">
                                  <option value="IT">IT Department</option>
                                  <option value="Educ">Educ Department</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="semester">Semester</label>
                                <select class="form-control" id="seme" name="semester">
                                  <option value="1st Semester">1st Semester</option>
                                  <option value="2nd Semester">2nd Semester</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="startTime">Start Time</label>
                                <input type="time" class="form-control" id="start_time" name="start_time">
                              </div>
                              <div class="form-group">
                                <label for="endTime">End Time</label>
                                <input type="time" class="form-control" id="end_time" name="end_time">
                              </div>
                              <button type="submit" class="btn btn-primary" name="sub_sched">Save Schedule</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="sec">Section</label>
                      <select class="form-control" id="sec" name="sec">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                      </select>
                    </div>
                    </form>
                    </div>

                </div><!-- /# row -->

                </div>
            </div>
        </div>
    </div>
    

    <?php include "assets/dbSched_sect.php";?>
    <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
      
    <div class="cd-schedule__timeline">
      <ul>
        
        <li><span>06:00</span></li>
        <li><span>06:30</span></li>
        <li><span>07:00</span></li>
        <li><span>07:30</span></li>
        <li><span>08:00</span></li>
        <li><span>08:30</span></li>
        <li><span>09:00</span></li>
        <li><span>09:00</span></li>
        <li><span>09:30</span></li>
        <li><span>10:00</span></li>
        <li><span>10:30</span></li>
        <li><span>11:00</span></li>
        <li><span>11:30</span></li>
        <li><span>12:00</span></li>
        <li><span>12:30</span></li>
        <li><span>01:00</span></li>
        <li><span>01:30</span></li>
        <li><span>02:00</span></li>
        <li><span>02:30</span></li>
        <li><span>03:00</span></li>
        <li><span>03:30</span></li>
        <li><span>04:00</span></li>
        <li><span>04:30</span></li>
        <li><span>05:00</span></li>
        <li><span>05:30</span></li>
        <li><span>06:00</span></li>
        <li><span>06:30</span></li>
        <li><span>07:00</span></li>
        <li><span>07:30</span></li>
        <li><span>08:00</span></li>

      </ul>
    </div> <!-- .cd-schedule__timeline -->
  
    <div class="cd-schedule__events">
      <ul>
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Monday</span></div>
  
          <ul>
            <?php if(isset($_POST['sec'])){echo sched(1); } ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Tuesday</span></div>
  
          <ul>
          <?php if(isset($_POST['sec'])){echo sched(2);}?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Wednesday</span></div>
  
          <ul>
          <?php if(isset($_POST['sec'])){echo sched(3);} ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Thursday</span></div>
  
          <ul>
          <?php if(isset($_POST['sec'])){echo sched(4);} ?>
          </ul>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Friday</span></div>
  
          <ul>
          <?php if(isset($_POST['sec'])){echo sched(5);} ?>
          </ul>
        </li>
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>Saturday</span></div>
  
          <ul>
          <?php if(isset($_POST['sec'])){echo sched(6);} ?>
          </ul>
        </li>
      </ul>
    </div>
  
    <div class="cd-schedule-modal">
      <header class="cd-schedule-modal__header">
        <div class="cd-schedule-modal__content">
          <span class="cd-schedule-modal__date"></span>
          <h3 class="cd-schedule-modal__name">sfsdf</h3>
        </div>
  
        <div class="cd-schedule-modal__header-bg"></div>
      </header>
  
      <div class="cd-schedule-modal__body">
        <div class="cd-schedule-modal__event-info"></div>
        <div class="cd-schedule-modal__body-bg"></div>
      </div>
  
      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>
  
    <div class="cd-schedule__cover-layer"></div>
  </div> <!-- .cd-schedule -->
 

  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/main.js"></script>

  <!-- jquery vendor -->
  <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../assets/js/lib/menubar/sidebar.js"></script>
    <script src="../assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    
    <!-- bootstrap -->
    <script src="../assets/js/scripts.js"></script>
    
    <script>
          document.getElementById("sec").value=  "<?php echo $_COOKIE['Sched_Section'] ?>";
        $('#sec').on('change', function(){
          var x = document.getElementById("sec").value;
          document.cookie = "Sched_Section="+x+";path=/";
          document.getElementById("sectform").submit();
        });
    </script>
</body>

</html><?php }  ?>