<html>
<head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content-wrapper {
    display: start-flex;
    width:400px;
    height:400px;
    margin:30px auto;
   
    
}

.login-form {
    width: 300px;
    padding: 20px;
    background-color: #f2b374;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 20px; /* Adjust as needed */
    margin-top: 20px;
    height: auto; /* Adjust height as needed */
    max-height: 400px; /* Maximum height */
    
}

/* Style the form labels */
.login-form label {
    display: block;
    margin-bottom: 5px;
}

/* Style the form inputs */
.login-form input[type="text"],
.login-form input[type="password"],
.login-form input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Style the submit button */
.login-form input[type="submit"] {
    background-color: #37b53f;
    color: white;
    cursor: pointer;
}

/* Change button color on hover */
.login-form input[type="submit"]:hover {
    background-color: #37b53f;
}

/* Style the forgot password and register links */
.login-form a {
    display: block;
    margin-top: 10px;
    text-align: right;
    text-decoration: none;
    color: #333;
}

/* Change link color on hover */
.login-form a:hover {
    color: #555;
}
</style>
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
            <form action="registerpage.php" method="post">
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
