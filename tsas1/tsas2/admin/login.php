<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

error_reporting(E_ALL); // Enable all errors
ini_set('display_errors', 1); // Display errors

include('includes/dbconnection.php');

$rn = rand(10000,999999);
$email = "";
if(isset($_POST['send'])){
    $username = $_POST['username'];
    $password = ($_POST['password']);
    
    // Debug: Check the input values

    $sql = "SELECT Email FROM tbladmin WHERE UserName=:username AND Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    // Debug: Check if the query executed
    if (!$query) {
        print_r($dbh->errorInfo());
    }

    $code = $rn;
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $email .= $result->Email;
        }

    } else {
        echo "<script>alert('Invalid Details');</script>";
    }


    //Create an instance; passing true enables exceptions
    $mail = new PHPMailer(true);    

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Username   = 'pup201files@gmail.com';                     //SMTP username
        $mail->Password   = 'vwqp ossp jzfz jkpu';                               //SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('pup201files@gmail.com', 'TSAS');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verification Code';

        $bodyContent =$code;

        $mail->Body = $bodyContent; 
        $mail->send();

        $servername = "localhost";
        $username = "root";
        $password = "";
        try{
                $conn = new PDO("mysql:host=$servername;dbname=tsasdb", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $insert = "UPDATE tbladmin SET OTP = '".$code."' WHERE Email = '".$email."' ";
                $conn->exec($insert);

            }catch(PDOException $e)
            {
                echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
                $errorMsg=  $e->getMessage();
                echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
            }
        
       
    } catch (Exception $e) {
    }

}

if(isset($_POST['login'])) 
{
    $username = $_POST['username'];
    $password = ($_POST['password']);
    
    // Debug: Check the input values

    $sql = "SELECT ID,OTP FROM tbladmin WHERE UserName=:username AND Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    // Debug: Check if the query executed
    if (!$query) {
        print_r($dbh->errorInfo());
    }

    $results = $query->fetchAll(PDO::FETCH_OBJ);

  
    $c = 0;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['tsasaid'] = $result->ID;
            $c = $result->OTP;
        }
        
        if($c == $_POST['code']){
            if(!empty($_POST["remember"])) {
                // COOKIES for username
                setcookie ("user_login", $_POST["username"], time()+ (10 * 365 * 24 * 60 * 60));
                // COOKIES for password
                setcookie ("userpassword", $_POST["password"], time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["user_login"])) {
                    setcookie ("user_login","");
                }
                if(isset($_COOKIE["userpassword"])) {
                    setcookie ("userpassword","");
                }
            }
            $_SESSION['login'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
        }
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>PUP Admin : Login</title>
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

    <style>
                    body.bg-primary {
                        background-color: #800000; /* Maroon Background */
                    }

                    .login-content {
                        background: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
                        padding: 40px;
                        border-radius: 8px;
                        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                    }

                    .login-logo span {
                        color: #800000; /* Maroon Text */
                        font-size: 28px;
                        font-weight: bold;
                    }

                    .login-logo img {
                        width: 100px; /* Adjust the size as needed */
                        margin-bottom: 10px;
                    }

                    .login-form h4 {
                        color: #800000; /* Maroon Text */
                        font-size: 24px;
                        margin-bottom: 20px;
                    }

                    .login-form .form-control {
                        border: 1px solid #800000; /* Maroon Border */
                        border-radius: 4px;
                    }

                    .login-form .btn-primary {
                        background-color: #800000; /* Maroon Button */
                        border-color: #800000;
                        font-size: 16px;
                    }

                    .login-form .btn-primary:hover {
                        background-color: #660000; /* Darker Maroon on Hover */
                        border-color: #660000;
                    }

                    .login-form .btn-success {
                        background-color: #FFD700; /* Gold Button */
                        border-color: #FFD700;
                        font-size: 16px;
                        color: #800000; /* Maroon Text */
                    }

                    .login-form .btn-success:hover {
                        background-color: #FFC700; /* Slightly Darker Gold on Hover */
                        border-color: #FFC700;
                    }

                    .login-form .create-account {
                        margin-top: 15px;
                        text-align: center;
                    }

                    .login-form .create-account a {
                        color: #800000; /* Maroon Link */
                        text-decoration: none;
                        font-weight: bold;
                    }

                    .login-form .create-account a:hover {
                        color: #660000; /* Darker Maroon on Hover */
                    }

                    .login-form .checkbox label {
                        color: #800000; /* Maroon Text for Remember Me */
                    }

                    .login-form .checkbox .pull-right a {
                        color: #800000; /* Maroon Text for Forgot Password */
                    }

                    .login-form .checkbox .pull-right a:hover {
                        color: #660000; /* Darker Maroon on Hover */
                    }

                    .text-center a {
                        color: #800000; /* Maroon Text for Back Home */
                    }

                    .text-center a:hover {
                        color: #660000; /* Darker Maroon on Hover */
                    }
                </style>
                
</head>
<body class="bg-primary">
    <div class="unix-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="../index.php"><span>PUP Admin</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Login</h4>
                            <form method="post">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" placeholder="User Name" required="true" name="username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required="true" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
                                </div>
                                <div class="form-group">
                                    
                                    <button type="submit" name="send" class="btn btn-success btn-flat pull-left w-15 m-r-0" style="height: 42px;">Send</button>
                                    <input type="text" class="form-control w-85 m-l-0 "placeholder="Code" name="code" >
                                    
                                </input>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>> Remember Me
                                    </label>
                                    <label class="pull-right">
                                        <a href="forgot-password.php">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                <label>
                                    <a href="../index.php">Back Home!!</a>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
