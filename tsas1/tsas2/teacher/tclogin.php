<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Faculty : Login</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    max-width: 390px;
    margin: 165px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"], input[type="password"] {
    width: 93%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
}

input[type="submit"] {
  
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: block;
  margin: 0 auto;
}

input[type="submit"]:hover {
    background-color: #3e8e41;
    
}
h2{
    text-align: center;
}

p {
  text-align: center;
  margin-top: 20px;
}

a {
  text-decoration: none;
  color: #337ab7;
}

a:hover {
  color: #23527c;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Faculty Login</h2>
            <form id="form">
              
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" ><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br>
                <br>
                <input type="submit" value="Login">
                <p>Don't have an account? <a href="tcregis.php">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>