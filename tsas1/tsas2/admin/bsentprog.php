<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['tsasaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

 $ocasaid=$_SESSION['tsasaid'];

 $cid=$_POST['cid'];
 $ccode=$_POST['ccode'];
 $ctitle=$_POST['ctitle'];
 $clab=$_POST['clab'];
 $clec=$_POST['clec'];
 $cunit=$_POST['cunit'];

$sql="insert into tblsubject(course_code, course_title, Lec, Lab, unit) values(:ccode, :ctitle, :clec, :clab, :cunit)";

$query=$dbh->prepare($sql);
$query->bindParam(':ccode', $ccode, PDO::PARAM_STR);
$query->bindParam(':ctitle', $ctitle, PDO::PARAM_STR);
$query->bindParam(':clec', $clec, PDO::PARAM_STR);
$query->bindParam(':clab', $clab, PDO::PARAM_STR);
$query->bindParam(':cunit', $cunit, PDO::PARAM_STR);
$query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Subject has been added.")</script>';
echo "<script>window.location.href ='subject.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
// Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblsubject where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();

  echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'subject.php'</script>";     


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

                    <!-- bsit 1st year 1st sem-->
                        <div class="col-md-20">
                            <div class="card alert">
                                <div class="card-header pr">
                                    <h4>Courses List for BSIT 1st Year - Section 1st Semester</h4>
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
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$sql=" SELECT * from tblsubject";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt);?></td>
                                                    <td>
                                                        <?php  echo htmlentities($row->course_code);?>
                                                    </td>
                                                    <td>
                                                        <?php  echo htmlentities($row->course_title);?>
                                                    </td>
                                                     <td>
                                                        <?php  echo htmlentities($row->lec);?>
                                                    </td>
                                                    <td>
                                                        <?php  echo htmlentities($row->lab);?>
                                                    </td>
                                                    <td>
                                                        <?php  echo htmlentities($row->unit);?>
                                                    </td>
                                                    <td>
                                                       
                                                        <span><a href="edit-subject.php?editid=<?php echo htmlentities ($row->sid);?>"><i class="ti-pencil-alt color-success"></i></a></span>
                                                        <span><a href="subject.php?delid=<?php echo ($row->sid);?>"  onclick="return confirm('Do you really want to Delete ?');"><i class="ti-trash color-danger"></i> </a></span>
                                                    </td>
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
</body>

</html><?php }  ?>