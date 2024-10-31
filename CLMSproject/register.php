<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Student Registration</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                <label for="sname">Name:</label><br>
                <input type="text" id="sname" name="sname"><br>
                <label for="srollno">Roll No:</label><br>
                <input type="text" id="srollno" name="srollno"><br>
                <label for="scourse">Course:</label><br>
                <input type="text" id="scourse" name="scourse"><br>
                <label for="sclass">Class:</label><br>
                <input type="text" id="sclass" name="sclass"><br>
                <label for="sbatch">Batch:</label><br>
                <input type="text" id="sbatch" name="sbatch"><br>
                <label for="sdob">Date of Birth:</label><br>
                <input type="date" id="sdob" name="sdob"><br>
                <label for="sphone">Phone:</label><br>
                <input type="text" id="sphone" name="sphone"><br>
                <label for="semail">Email:</label><br>
                <input type="email" id="semail" name="semail"><br>
                <label for="susername">Username:</label><br>
                <input type="text" id="susername" name="susername"><br>
                <label for="spassword">Password:</label><br>
                <input type="password" id="spassword" name="spassword"><br>
                <label for="saddress">Address:</label><br>
                <textarea id="saddress" name="saddress"></textarea><br>

                <input type="submit" name="student_submit" value="Register">
            </form>
        </div>

        <div class="form-container">
            <h2>Teacher Registration</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                <label for="tname">Name:</label><br>
                <input type="text" id="tname" name="tname"><br>
                <label for="tid">ID:</label><br>
                <input type="text" id="tid" name="tid"><br>
                <label for="tdob">Date of Birth:</label><br>
                <input type="date" id="tdob" name="tdob"><br>
                <label for="teachingexp">Teaching Experience:</label><br>
                <input type="text" id="teachingexp" name="teachingexp"><br>
                
                <label for="subjectstaught">Subjects Taught (separated by whitespace):</label><br>
                <input type="text" id="subjectstaught" name="subjectstaught" required><br>

                <label for="classestaught">Classes Taught (separated by whitespace):</label><br>
                <input type="text" id="classestaught" name="classestaught" required><br>

                <label for="batchestaught">Batches Taught (separated by whitespace):</label><br>
                <input type="text" id="batchestaught" name="batchestaught" required><br>

                <label for="pthone">Phone:</label><br>
                <input type="text" id="pthone" name="pthone"><br>
                <label for="temail">Email:</label><br>
                <input type="email" id="temail" name="temail"><br>
                <label for="tusername">Username:</label><br>
                <input type="text" id="tusername" name="tusername"><br>
                <label for="tpassword">Password:</label><br>
                <input type="password" id="tpassword" name="tpassword"><br>
                <label for="taddress">Address:</label><br>
                <textarea id="taddress" name="taddress"></textarea><br>

                <input type="submit" name="teacher_submit" value="Register">
            </form>
        </div>
    </div>
</body>
</html>

<?php
// Database credentials
$host = "localhost";
$port = "5432"; // Default port for PostgreSQL
$dbname = "CLMSDB";
$user = "postgres";
$password = "2003";

// Connect to PostgreSQL database
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which form is submitted
    if (isset($_POST['student_submit'])) {
        // Process student registration
        $sname = $_POST['sname'];
        $srollno = $_POST['srollno'];
        $scourse = $_POST['scourse'];
        $sclass = $_POST['sclass'];
        $sbatch = $_POST['sbatch'];
        $sdob = $_POST['sdob'];
        $sphone = $_POST['sphone'];
        $semail = $_POST['semail'];
        $susername = $_POST['susername'];
        $spassword = $_POST['spassword'];
        $saddress = $_POST['saddress'];

        // Insert into student table
        $sql = "INSERT INTO student (sname, srollno, scourse, sclass, sbatch, sdob, sphone, semail, susername, spassword, saddress) 
                VALUES ('$sname', '$srollno', '$scourse', '$sclass', '$sbatch', '$sdob', '$sphone', '$semail', '$susername', '$spassword', '$saddress')";
        $result = pg_query($conn, $sql);
        if (!$result) {
            echo "Error: " . pg_last_error($conn);
        } else {
            echo "<script>alert('Student registered successfully!');</script>";
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['teacher_submit'])) {
        // Process teacher registration
        $tname = $_POST['tname'];
        $tid = $_POST['tid'];
        $tdob = $_POST['tdob'];
        $teachingexp = $_POST['teachingexp'];
        $subjectstaught = isset($_POST['subjectstaught']) ? explode(' ', $_POST['subjectstaught']) : array();
    $classestaught = isset($_POST['classestaught']) ? explode(' ', $_POST['classestaught']) : array();
    $batchestaught = isset($_POST['batchestaught']) ? explode(' ', $_POST['batchestaught']) : array();
    
        $pthone = $_POST['pthone'];
        $temail = $_POST['temail'];
        $tusername = $_POST['tusername'];
        $tpassword = $_POST['tpassword'];
        $taddress = $_POST['taddress'];
    
        // Convert arrays to comma-separated strings
        $subjectstaught_str = implode(' ', $subjectstaught);
        $classestaught_str = implode(' ', $classestaught);
        $batchestaught_str = implode(' ', $batchestaught);
    
        // Validate input data
        if (empty($tname) || empty($tid) || empty($tdob) || empty($teachingexp) || empty($pthone) || empty($temail) || empty($tusername) || empty($tpassword) || empty($taddress)) {
            echo "Error: All fields are required.";
        } else {
            // Insert into teacher table
            $sql = "INSERT INTO teacher (tname, tid, tdob, teachingexp, subjectstaught, classestaught, batchestaught, pthone, temail, tusername, tpassword, taddress) 
                    VALUES ('$tname', '$tid', '$tdob', '$teachingexp', '$subjectstaught_str', '$classestaught_str', '$batchestaught_str', '$pthone', '$temail', '$tusername', '$tpassword', '$taddress')";
            
            $result = pg_query($conn, $sql);
            if (!$result) {
                echo "Error: " . pg_last_error($conn);
            } else {
                echo "<script>alert('Teacher registered successfully!');</script>";
            }
        }
    }
    }

// Close database connection
pg_close($conn);
?>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        width: 100%;
        gap: 20px;
        margin-top: 20px;
    }

    .form-container {
        width: 40%; /* Adjusted width */
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 15px; /* Reduced padding */
        margin: 20px;
    }

    .form-container h2 {
        color: #333;
        text-align: center;
        margin-top: 0;
        margin-bottom: 15px; /* Reduced margin */
    }

    .form-container .form {
        margin-top: 15px; /* Reduced margin */
    }

    .form-container .form label {
        display: block;
        margin-bottom: 4px; /* Reduced margin */
        font-weight: bold;
    }

    .form-container .form input[type="text"],
    .form-container .form input[type="password"],
    .form-container .form input[type="email"],
    .form-container .form textarea,
    .form-container .form select {
        width: calc(100% - 16px); /* Adjusted width */
        padding: 6px; /* Reduced padding */
        margin-bottom: 8px; /* Reduced margin */
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-container .form input[type="submit"] {
        width: auto;
        padding: 8px 16px; /* Reduced padding */
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .form-container .form input[type="submit"]:hover {
        background-color: #45a049;
    }

</style>
