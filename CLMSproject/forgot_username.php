<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Username</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #F5FA95;
        }

        .box-container {
            max-width: 400px;
            border: 3px solid;
            padding: 20px;
            text-align: center;
            border-radius: 7px;
            background-color: #6ef8f6;
        }

        h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="box-container">
        <h2>Forgot Username</h2>
        <form action="forgot_username.php" method="POST">
            <label for="phone">Enter Your Phone Number:</label><br>
            <input type="text" id="phone" name="phone" required><br>
            <input type="submit" value="Retrieve Username">
        </form>
    </div>
</body>
</html>

<?php
$host = "localhost";
$port = "5432"; 
$dbname = "CLMSDB";
$user = "postgres";
$password = "2003";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];

    // Query to retrieve student username based on phone number
    $sql_student = "SELECT susername FROM student WHERE sphone = '$phone'";
    $result_student = pg_query($conn, $sql_student);

    // Query to retrieve teacher username based on phone number
    $sql_teacher = "SELECT tusername FROM teacher WHERE pthone = '$phone'";
    $result_teacher = pg_query($conn, $sql_teacher);

    if (!$result_student || !$result_teacher) {
        echo "Error: " . pg_last_error($conn);
    } else {
        // Check if a username is retrieved for students
        if (pg_num_rows($result_student) > 0) {
            $row_student = pg_fetch_assoc($result_student);
            $username_student = $row_student['susername'];
            echo "Student username is: " . $username_student;
        } 
        // Check if a username is retrieved for teachers
        elseif (pg_num_rows($result_teacher) > 0) {
            $row_teacher = pg_fetch_assoc($result_teacher);
            $username_teacher = $row_teacher['tusername'];
            echo "Teacher username is: " . $username_teacher;
        } 
        // If no user found with the provided phone number
        else {
            echo "No user found with the provided phone number.";
        }
    }
}
?>
