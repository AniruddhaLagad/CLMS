<?php
session_start();

$error_message = ""; // Default empty message

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
            $error_message = "Database query error.";
        } else {
            if (pg_num_rows($result_student) > 0 || pg_num_rows($result_teacher) > 0) {
                if (pg_num_rows($result_student) > 0) {
                    $user_row = pg_fetch_assoc($result_student);
                    $actual_password = $user_row['spassword'];
                } elseif (pg_num_rows($result_teacher) > 0) {
                    $user_row = pg_fetch_assoc($result_teacher);
                    $actual_password = $user_row['tpassword'];
                }

                if ($password === $actual_password) {
                    $_SESSION["username"] = $username;
                    header("Location: main.php");
                    exit();
                } else {
                    $error_message = "Invalid password. Please try again.";
                }
            } else {
                $error_message = "User does not exist. Please register.";
            }
        }
        pg_close($db);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="content-wrapper">
    <div class="login-form">
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login" name="submit"><br>

            <!-- ✅ Error Message Display -->
            <?php if (!empty($error_message)) : ?>
                <p style="color: red; font-weight: bold;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <a href="forgot_password.php">Forgot Password?</a>
            <a href="forgot_username.php">Forgot Username?</a>
            <a href="register.php">New User? Register Here</a>
        </form>
    </div>
</div>
</body>
</html>
