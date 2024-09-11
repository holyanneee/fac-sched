<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;

        }

        .container {
            max-width: 400px;
            margin: 95px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .register-form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
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

        h2 {
            text-align: center;
        }

        .error-message {
            color: red;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-form">
            <h2>Register</h2>
            <form id="registerForm">
                <label for="email">Email:</label>  
                <input type="email" id="email" name="email" required><br>

                <label for="username">Create Username:</label>
                <input type="text" id="username" name="username" required><br>

                <label for="password">Create Password:</label>
                <input type="password" id="password" name="password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$">
                <span id="password-error" class="error-message">Password must contain at least one lowercase letter, one uppercase letter, one number, and be at least 8 characters long.</span><br>

                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <span id="confirmPassword-error" class="error-message">Passwords do not match.</span><br>

                <input type="submit" value="Register">
            </form>
        </div>
    </div>

    <script>
        const registerForm = document.getElementById('registerForm');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordError = document.getElementById('password-error');
        const confirmPasswordError = document.getElementById('confirmPassword-error');

        registerForm.addEventListener('submit', (e) => {
            const passwordValue = passwordInput.value;
            const confirmPasswordValue = confirmPasswordInput.value;

            // Regex pattern to enforce password rules
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

            let isValid = true;

            // Validate password strength
            if (!passwordRegex.test(passwordValue)) {
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                passwordError.style.display = 'none';
            }

            // Check if passwords match
            if (passwordValue !== confirmPasswordValue) {
                confirmPasswordError.style.display = 'block';
                isValid = false;
            } else {
                confirmPasswordError.style.display = 'none';
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
