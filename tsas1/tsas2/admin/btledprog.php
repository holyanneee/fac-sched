<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['tsasaid'] == 0)) {
    header('location:logout.php');
} else {

    // Initialize search variables
    $searchTerm = '';
    $year = '';
    $semester = '';

    if (isset($_POST['search'])) {
        $searchTerm = $_POST['searchTerm'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
    }

    // Modify SQL query to include year, semester, and search term
    $sql = "SELECT * FROM tblsubject WHERE 1 = 1";

    if (!empty($year)) {
        $sql .= " AND year = :year";
    }

    if (!empty($semester)) {
        $sql .= " AND semester = :semester";
    }

    if (!empty($searchTerm)) {
        $sql .= " AND (course_code LIKE :searchTerm OR course_title LIKE :searchTerm)";
    }

    $query = $dbh->prepare($sql);

    if (!empty($year)) {
        $query->bindValue(':year', $year, PDO::PARAM_STR);
    }

    if (!empty($semester)) {
        $query->bindValue(':semester', $semester, PDO::PARAM_STR);
    }

    if (!empty($searchTerm)) {
        $query->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    }

    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Management</title>
    <link rel="stylesheet" href="path/to/your/css">
</head>

<body>
    <div class="container">
        <h1>Course List</h1>

        <!-- Search Form -->
        <form method="post" action="">
            <div class="form-group">
                <label for="year">Select Year</label>
                <select name="year" class="form-control">
                    <option value="">All Years</option>
                    <option value="1st Year" <?php if(isset($_POST['year']) && $_POST['year'] == '1st Year') echo 'selected'; ?>>1st Year</option>
                    <option value="2nd Year" <?php if(isset($_POST['year']) && $_POST['year'] == '2nd Year') echo 'selected'; ?>>2nd Year</option>
                    <option value="3rd Year" <?php if(isset($_POST['year']) && $_POST['year'] == '3rd Year') echo 'selected'; ?>>3rd Year</option>
                    <option value="4th Year" <?php if(isset($_POST['year']) && $_POST['year'] == '4th Year') echo 'selected'; ?>>4th Year</option>
                </select>
            </div>

            <div class="form-group">
                <label for="semester">Select Semester</label>
                <select name="semester" class="form-control">
                    <option value="">All Semesters</option>
                    <option value="1st Semester" <?php if(isset($_POST['semester']) && $_POST['semester'] == '1st Semester') echo 'selected'; ?>>1st Semester</option>
                    <option value="2nd Semester" <?php if(isset($_POST['semester']) && $_POST['semester'] == '2nd Semester') echo 'selected'; ?>>2nd Semester</option>
                </select>
            </div>

            <div class="input-group">
                <input type="text" class="form-control" name="searchTerm" placeholder="Search by Course Code or Course Title" value="<?php echo isset($_POST['searchTerm']) ? $_POST['searchTerm'] : ''; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="search">Search</button>
                </span>
            </div>
        </form>

        <!-- Courses Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Lec</th>
                    <th>Lab</th>
                    <th>Unit</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display results
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlentities($row->ID) . "</td>";
                        echo "<td>" . htmlentities($row->course_code) . "</td>";
                        echo "<td>" . htmlentities($row->course_title) . "</td>";
                        echo "<td>" . htmlentities($row->Lec) . ".0</td>";
                        echo "<td>" . htmlentities($row->Lab) . ".0</td>";
                        echo "<td>" . htmlentities($row->unit) . ".0</td>";
                        echo "<td>" . htmlentities($row->year) . "</td>";
                        echo "<td>" . htmlentities($row->semester) . "</td>";
                        echo '<td>
                                <a href="edit.php?id=' . htmlentities($row->ID) . '">Edit</a> |
                                <a href="delete.php?id=' . htmlentities($row->ID) . '" onclick="return confirm(\'Are you sure?\')">Delete</a>
                            </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No results found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
}
?>
