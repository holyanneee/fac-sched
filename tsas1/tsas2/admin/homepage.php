<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <style>
        body {
    height: 100%;
    background-image: url('pup1.jpg');
    background-repeat: no-repeat;
    background-size: cover; /* Ensures the background image covers the whole body */
    margin: 0;
    padding: 0;
}

section {
    background-color: rgba(206, 200, 200, 0.479); /* 50% opacity for transparency */
    width: 30%;
    height: 690px;
    float: right; /* Moves the section to the right */
    margin: 20px; /* Adds some space around the section */
    backdrop-filter: blur(5px); /* Adds a blur effect */
    -webkit-backdrop-filter: blur(10px); /* Ensures compatibility with Safari */
    border-radius: 10px; /* Optional: Adds rounded corners */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Optional: Adds a shadow effect */
}

h1{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
font-size: 30px;
text-align: center;

}
.center{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 15px;
    text-align: center;

}
.btn {
    border-radius: 0;
    border-width: 1px;
    box-shadow: none;
    display: block;
    width: 80%; /* Button takes up 80% of the container's width */
    padding: .5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.5;
    text-align: center;
    margin: 0 auto; /* Centers the button horizontally */
    text-decoration: none;
    color: black;
}

    </style>
</head>
<body>
    
<section>
    <div>
        <br>
        <img src="PUPLogo.png" alt="" width="25%;" style=" display: block;margin-left: auto;margin-right: auto; ">
        <h1> PUPCC Management System</h1>

        <div class="center">
        <span> Hi, PUPian! Please tap your destination.</span>
        <br><br>    <br>
            <div class="center">
            <a class="btn" href="login.php" style="background-color: #FFF078;">
                Admin
            </a>
            <br>
            <a class="btn" href="../teacher/tclogin.php" style="background-color: #C80036;">
                Faculty
            </a>
            <br>
            <a class="btn" href="#" style="background-color: #5B99C2;">
                Student
            </a>
            
            </div>
            <p>By using this service, you understood and agree to the PUP Online Services 
                <a href="https://www.pup.edu.ph/terms" target="_blank" class="text-primary">Terms of Use</a> 
            and
            <a href="https://www.pup.edu.ph/privacy" target="_blank" class="text-primary">Privacy Statement</a>
            </p>
        </div>
    </div>
</section>
</body>
</html>