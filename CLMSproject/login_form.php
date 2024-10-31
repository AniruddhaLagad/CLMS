<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content-wrapper">
        <div class="login-form">
            <form action="login_form.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login" name="submit"><br>

                <a href="forgot_password.php">Forgot Password?</a>
                <a href="forgot_username.php">Forgot Username?</a>
                <a href="register.php">New User? Register Here</a>
            </form>
        </div>
    </div>
    <?php
if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $db = pg_connect("host=localhost port=5432 dbname=CLMSDB user=postgres password=2003");

        $query_student = "SELECT * FROM STUDENT WHERE susername = '$username'";
        $result_student = pg_query($db, $query_student);

        $query_teacher = "SELECT * FROM TEACHER WHERE tusername = '$username'";
        $result_teacher = pg_query($db, $query_teacher);

        if (!$result_student || !$result_teacher) {
            echo "An error occurred.\n";
            exit;
        }

        // Check if the user exists
        if (pg_num_rows($result_student) > 0 || pg_num_rows($result_teacher) > 0) {
            // User exists, attempt authentication
            if (pg_num_rows($result_student) > 0) {
                $user_row = pg_fetch_assoc($result_student);
                $actual_password = $user_row['spassword'];
            } elseif (pg_num_rows($result_teacher) > 0) {
                $user_row = pg_fetch_assoc($result_teacher);
                $actual_password = $user_row['tpassword'];
            }

            if ($password === $actual_password) {
                // Authentication successful
                // Start a session
                session_start();
                // Store username in session for future reference if needed
                $_SESSION["username"] = $username;
                // Redirect user to main.php
                header("Location: main.php");
                exit();
            } else {
                // Authentication failed, display error message
                echo "<p style='color: red;'>Invalid username or password. Please try again.</p>";
            }
        } else {
            // User does not exist, display error message
            echo "<p style='color: red;'>User does not exist. Please register.</p>";
        }

        // Close the database connection
        pg_close($db);
    }
}
?>
</body>
</html>
