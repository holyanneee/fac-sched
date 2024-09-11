<style>
/* Float four columns side by side */
.columna {
  width: 10%;
  padding: 20px 10px;
}

/* Remove extra left and right margins, due to padding in columns */


/* Clear floats after the columns */
.rowa:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.carda {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #fff;
}
@media screen and (max-width: 600px) {
  .columna {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}


</style>
<?php
//From Log in form


$servername = "localhost";
$username = "root";
$password = "";
  if (isset($_POST['update_sched5'])) {
try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stc = $_COOKIE['Sched_TC'];
  $query = "SELECT * FROM teaching_load WHERE TC_ID='".$stc."' AND Sched_No=5";

  if ($result = $conn->query($query)) {
    if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $id = $row['TL_ID'];
      $sched_no = $row['Sched_No'];
      $sub = $row['Subject'];
      $tc = $row['TC_ID'];
      $d = $row['Day'];
      $sem = $row['Semester'];
      $sec = $row['Section'];

      $day = $_POST['up_day'];
      $sub = $_POST['up_subject'];
      $sec = $_POST['up_section'];
      $sem = $_POST['up_Semester'];
      $st = $_POST['up_start'];
      $en = $_POST['up_end'];


      $update = "UPDATE teaching_load SET Subject='".$sub."', TC_ID='".$tc."', Day='".$day."', Start='".$st."', end='".$en."',  Section='".$sec."', Semester='".$sem."' WHERE TL_ID='".$id."' ";
      $conn->exec($update);
      echo '<script>
      document.getElementById("teacher").value = "'.$stc.'";
      document.getElementById("aydi").submit();
      </script>';
    }


  }

}catch(PDOException $e)
{
  echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}
}

if (isset($_POST['delete_sched5'])) {
try{
$conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stc = $_COOKIE['Sched_TC'];

$query = "SELECT * FROM teaching_load WHERE TC_ID='".$stc."' AND Sched_No=5";

if ($result = $conn->query($query)) {
  if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['TL_ID'];
    $sched_no = $row['Sched_No'];
    $sub = $row['Subject'];
    $tc = $row['TC_ID'];
    $d = $row['Day'];
    $sem = $row['Semester'];
    $sec = $row['Section'];

    $day = $_POST['up_day'];
    $sub = $_POST['up_subject'];
    $sec = $_POST['up_section'];
    $sem = $_POST['up_Semester'];
    $st = $_POST['up_start'];
    $en = $_POST['up_end'];

    $del = "DELETE FROM teaching_load WHERE TL_ID = '".$id."'";
    $conn->exec($del);
    $update = "UPDATE teaching_load SET Sched_No = Sched_No - 1 WHERE TC_ID = '".$stc."' AND Sched_No BETWEEN 5 AND 20";
    $conn->exec($update);
    echo '<script>
    document.getElementById("teacher").value = "'.$stc.'";
    document.getElementById("aydi").submit();
    </script>';

  }


}

}catch(PDOException $e)
{
echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
$errorMsg=  $e->getMessage();
echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}
}


try{
$conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stc = $_COOKIE['Sched_TC'];
$sel = "SELECT * FROM teaching_load WHERE TC_ID='".$stc."' AND Sched_No=5";

if ($result = $conn->query($sel)) {
  if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['TL_ID'];
    $sched_no = $row['Sched_No'];
    $sub = $row['Subject'];
    $tc = $row['TC_ID'];
    $d = $row['Day'];
    $sem = $row['Semester'];
    $sec = $row['Section'];
    $s = $row['Start'];
    $e = $row['end'];

  }


}

}catch(PDOException $e)
{
echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
$errorMsg=  $e->getMessage();
echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}
?>

  <!-- Card -->


    <div class="cd-schedule-modal__event-info">
      <div style="background:#fff;">
        <div class="row6">
          <div class="column6">
              <form method="post" enctype="multipart/form-data">
              <label for="formGroupExampleInput" style="padding-left: 10px;">Subject</label>
              <select class="form-control" name="up_subject">
              <option value="<?php echo $sub; ?>" selected style="color:red;">Previous Selected: &nbsp;<?php echo $sub; ?></option>
              <?php include 'assets/select_sub.php'; ?>
              </select>
              <br>
              <label for="formGroupExampleInput" style="padding-left: 10px;">Section</label>
              <select class="form-control" name="up_section">
              <option value="<?php echo $sec; ?>" selected style="color:red;">Previous Selected: &nbsp;<?php echo $sec; ?></option>
                <option>Indonesia</option>
                <option>Excellent</option>
                <option>Indonesia</option>
              </select>
              <br>
              <label for="formGroupExampleInput" style="padding-left: 10px;">Day of Schedule</label>
              <select class="form-control" name="up_day">
              <option value="<?php echo $d; ?>" selected style="color:red;">Previous Selected: &nbsp;<?php echo $d; ?></option>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
              </select>
              <br>
              <label for="formGroupExampleInput" style="padding-left: 10px;">Semester</label>
              <select class="form-control" name="up_Semester">
              <option value="<?php echo $sem; ?>" selected style="color:red;">Previous Selected: &nbsp;<?php echo $sem; ?></option>
                <option>1st Semester</option>
                <option>2nd Semester</option>
              </select>
              <br>
              <div class="row">
                <div class="col">

                    <label for="startr">Start</label>
                    <input type="time" class="form-control" value="<?php echo $s; ?>" name="up_start" id="up_start">
                </div>
                <div class="col">
                  <label for="end">End</label>
                  <input type="time" class="form-control" value="<?php echo $e; ?>" name="up_end" id="up_end">
                </div>

                <div class="col-md-6">

                    <label for="end"></label>
                  <button class="btn btn-danger btn-lg btn-block" name="delete_sched5">Delete</button>
                </div>
                <div class="col-md-6">
                  <label for="end"></label>
                  <button class="btn btn-info btn-lg btn-block" name="update_sched5">Update</button>
                </div>

              </div>

            </form>
          </div>
        </div>

      </div>
      </div>
