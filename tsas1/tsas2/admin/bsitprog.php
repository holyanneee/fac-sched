<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['tsasaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $ocasaid = $_SESSION['tsasaid'];

        $cid = $_POST['cid'];
        $ccode = $_POST['ccode'];
        $ctitle = $_POST['ctitle'];
        $clab = $_POST['clab'];
        $clec = $_POST['clec'];
        $cunit = $_POST['cunit'];

        $sql = "INSERT INTO tblsubject(course_code, course_title, Lec, Lab, unit) VALUES(:ccode, :ctitle, :clec, :clab, :cunit)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':ccode', $ccode, PDO::PARAM_STR);
        $query->bindParam(':ctitle', $ctitle, PDO::PARAM_STR);
        $query->bindParam(':clec', $clec, PDO::PARAM_STR);
        $query->bindParam(':clab', $clab, PDO::PARAM_STR);
        $query->bindParam(':cunit', $cunit, PDO::PARAM_STR);
        $query->execute();

        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Subject has been added.")</script>';
            echo "<script>window.location.href ='bsitprog.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }

    if(isset($_POST['submit']))
    {
  
   $cid=$_POST['cid'];
   $ccode = $_POST['ccode'];
   $ctitle = $_POST['ctitle'];
   $clab = $_POST['clab'];
   $clec = $_POST['clec'];
   $cunit = $_POST['cunit'];
   $subcode=$_POST['subcode'];
   $eid=$_GET['editid'];
  
  $sql="update tblsubject set ID = :cid, course_code = :ccode, course_title = :ctitle, Lec = :clec, Lab = :clab, unit = :cunit where ID=:eid";
  $query=$dbh->prepare($sql);
  $query->bindParam(':cid',$cid,PDO::PARAM_STR);
  $query->bindParam(':ccode', $ccode, PDO::PARAM_STR);
  $query->bindParam(':ctitle', $ctitle, PDO::PARAM_STR);
  $query->bindParam(':clec', $clec, PDO::PARAM_STR);
  $query->bindParam(':clab', $clab, PDO::PARAM_STR);
  $query->bindParam(':cunit', $cunit, PDO::PARAM_STR);
  $query->bindParam(':eid',$eid,PDO::PARAM_STR);
  
   $query->execute();
     echo '<script>alert("Subject has been updated")</script>';
     echo "<script>window.location.href ='bsitprog.php'</script>";
  }

   // Add code for fetching subject details if edit button is clicked
   if(isset($_GET['editid'])) {
    $eid=$_GET['editid'];
    $sql="SELECT tblcourse.CourseName, tblcourse.BranchName, tblcourse.ID as cid, tblsubject.SubjectFullname, tblsubject.SubjectShortname, tblsubject.SubjectCode, tblsubject.ID as sid from tblsubject join tblcourse on tblcourse.ID=tblsubject.CourseID where tblsubject.ID=:eid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
  }
  
    if (isset($_GET['delid'])) {
        $rid = intval($_GET['delid']);
        $sql = "DELETE FROM tblsubject WHERE cid = :cid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':cid', $rid, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Data deleted');</script>";
        echo "<script>window.location.href = 'bsitprog.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>PUP : Course Create</title>
  <!-- Styles -->
  <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
  <link href="../assets/css/lib/menubar/sidebar.css" rel="stylesheet">
  <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/lib/unix.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">

  <style>
  #addSubjectModal .modal-dialog {
  width: 500px;
  padding: 10px;
}
  </style>
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
                <h1>Course List</h1>
              </div>
            </div>
          </div>

          <!-- /# column -->
          <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb text-right">
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li class="active">Course List</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
         <!-- Search Bar -->
         <div class="row">
                    <div class="col-lg-5">
                        <form method="post" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchTerm" placeholder="Search by Course Code or Course Title" value="<?php echo $searchTerm; ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="search">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

        <!-- bsit 1st year 1st sem-->
        <div class="col-md-20">
          <div class="card alert">
            <div class="card-header pr">
              <div class="d-flex justify-content-between align-items-center">
                <h4>Courses List for BSIT 1st Year - Section 1st Semester</h4>
                <button type="button" class="btn btn-primary .m-r-100" data-toggle="modal" data-target="#addSubjectModal">
                  Add Course
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table student-data-table m-t-20">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Course Code</th>
                      <th>Course Title</th>
                      <th>Lec</th>
                      <th>Lab</th>
                      <th>Unit</th>
                
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql=" SELECT * from tblsubject";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);

                    $cnt=1;
                    if($query->rowCount() > 0) {
                      foreach($results as $row) {
                    ?>
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo htmlentities($row->course_code);?></td>
                      <td><?php echo htmlentities($row->course_title);?></td>
                      <td><?php echo htmlentities($row->Lec).'.0';?></td>
                      <td><?php echo htmlentities($row->Lab).'.0';?></td>
                      <td style="text-align: center;"><?php echo htmlentities($row->unit).'.0';?></td>
                      
                    </tr>
                    <?php $cnt=$cnt+1;}} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include_once('includes/footer.php');?>
    </div>
  </div>
</div>


<!<!-- Add Subject Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSubjectModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="ccode">Course Code</label>
            <input type="text" class="form-control" name="ccode" required>
          </div>
          <div class="form-group">
            <label for="ctitle">Course Title</label>
            <input type="text" class="form-control" name="ctitle" required>
          </div>
          <div class="form-group">
            <label for="clec">Lecture Hours</label>
            <input type="text" class="form-control" name="clec" required>
          </div>
          <div class="form-group">
            <label for="clab">Lab Hours</label>
            <input type="text" class="form-control" name="clab" required>
          </div>
          <div class="form-group">
            <label for="cunit">Unit</label>
            <input type="text" class="form-control" name="cunit" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


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

<script src="../assets/js/update.js"></script>
</body>
</html>
<?php } ?>
