<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";



  try{
        $conn = new PDO("mysql:host=$servername;dbname=tsasdb", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM tblteacher";

        if ($result = $conn->query($query)) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="'.$row['ID'].'">'.$row['FirstName'].' '.$row['LastName'].'</option>';
            } 
        }
    }catch(PDOException $e)
    {
        echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
        $errorMsg=  $e->getMessage();
        echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    }

?>