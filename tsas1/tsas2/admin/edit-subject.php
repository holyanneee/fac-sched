<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['tsasaid']==0)) {
  header('location:logout.php');
} else {
  if(isset($_POST['submit'])) {
    $cid=$_POST['cid'];
    $sfname=$_POST['sfname'];
    $ssname=$_POST['ssname'];
    $subcode=$_POST['subcode'];
    $eid=$_POST['eid'];

    $sql="update tblsubject set CourseID=:cid, SubjectFullname=:sfname, SubjectShortname=:ssname, SubjectCode=:subcode where ID=:eid";
    $query=$dbh->prepare($sql);
    $query->bindParam(':cid',$cid,PDO::PARAM_STR);
    $query->bindParam(':sfname',$sfname,PDO::PARAM_STR);
    $query->bindParam(':ssname',$ssname,PDO::PARAM_STR);
    $query->bindParam(':subcode',$subcode,PDO::PARAM_STR);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("Subject has been updated")</script>';
    echo "<script>window.location.href ='subject.php'</script>";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PUP : Course Update</title>
    <!-- Styles -->
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
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
                            <h1>Subject</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li class="active">Course</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <div id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card alert">
                            <div class="card-header pr">
                                <h4>Update Subject</h4>
                                <!-- Trigger button for update modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateSubjectModal">
                                    Edit Subject
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->

                </div>
                <!-- /# row -->

                <?php include_once('includes/footer.php');?>
            </div>
        </div>
    </div>
</div>

<!-- Update Subject Modal -->
<div class="modal fade" id="updateSubjectModal" tabindex="-1" role="dialog" aria-labelledby="updateSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSubjectModalLabel">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <?php
                    if($query->rowCount() > 0) {
                        foreach($results as $row) {
                    ?>
                    <input type="hidden" name="eid" value="<?php echo htmlentities($row->sid);?>">
                    <div class="form-group">
                        <label for="cid">Course Name</label>
                        <select class="form-control" name="cid">
                            <option value="<?php echo htmlentities($row->cid);?>"><?php echo htmlentities($row->CourseName);?> (<?php echo htmlentities($row->BranchName);?>)</option>
                            <?php
                            $sql="SELECT * from tblcourse";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            if($query->rowCount() > 0) {
                                foreach($results as $row1) {
                            ?>
                            <option value="<?php echo htmlentities($row1->ID);?>"><?php echo htmlentities($row1->CourseName);?> (<?php echo htmlentities($row1->BranchName);?>)</option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sfname">Course Code</label>
                        <input type="text" class="form-control" name="sfname" value="<?php echo htmlentities($row->SubjectFullname);?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ssname">Course Title</label>
                        <input type="text" class="form-control" name="ssname" value="<?php echo htmlentities($row->SubjectShortname);?>" required>
                    </div>
                    <div class="form-group">
                        <label for="subcode">Lec</label>
                        <input type="text" class="form-control" name="subcode" value="<?php echo htmlentities($row->SubjectCode);?>" required>
                    </div>
                    <?php } } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
<!-- script init-->

</body>
</html>
<?php } ?>
