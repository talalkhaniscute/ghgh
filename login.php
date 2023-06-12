<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    label, input[type="text"], input[type="password"], input[type="submit"] {
      display: block;
      width: 100%;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    input[type="text"], input[type="password"] {
      height: 30px;
      padding: 5px;
      font-size: 16px;
    }

    input[type="submit"] {
      height: 40px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      <input type="submit" value="Login">
    </form>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the submitted username and password
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Validate the username and password (you can add your own validation logic here)
        if ($username == "admin" && $password == "talal") {
            // Username and password are correct, redirect to a success page
            header("Location: Dashboard.html");
            exit;
        } else {
            // Invalid username or password, display an error message
            echo '<p style="color: red;">Invalid username or password</p>';
        }
    }
    ?>
  </div>
</body>
</html>