<!-- signin_signup.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Gym Dashboard - Sign In / Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 300px;
        }

        h2 {
            color: #3498db;
        }

        h3 {
            color: #e74c3c;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"]
        {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            background-color: #444;
            color: #fff;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #2980b9;
        }

        .signup-form {
            display: none;
        }
    </style>
    <script>
        function toggleForm() {
            var signinForm = document.getElementById("signin-form");
            var signupForm = document.getElementById("signup-form");

            if (signinForm.style.display === "block") {
                signinForm.style.display = "none";
                signupForm.style.display = "block";
            } else {
                signinForm.style.display = "block";
                signupForm.style.display = "none";
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Welcome to the Gym Dashboard</h2>


        <form id="signin-form" action="process_signin.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Sign In">
            <input type="button" value="Sign Up" onclick="toggleForm()">
            <p ><a style="color:white" href="forgot_password.php">Forgot Password?</a></p>
        </form>


        <form id="signup-form" action="process_signup.php" method="POST" style="display: none;">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Sign Up">
            <input type="button" value="Sign In" onclick="toggleForm()">
            <p ><a style="color:white" href="forgot_password.php">Forgot Password?</a></p>
        </form>
    </div>
</body>

</html>