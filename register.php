<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script>
        function validateForm() {
            // Get the form being submitted
            var form = document.activeElement.form;

            // Get form field values for student and teacher
            var name = form.querySelector('[id$="name"]').value; // Either sname or tname
            var rollnoOrId = form.querySelector('[id$="rollno"], [id$="id"]').value; // srollno or tid
            var email = form.querySelector('[id$="email"]').value; // semail or temail
            var phone = form.querySelector('[id$="phone"], [id$="pthone"]').value; // sphone or pthone
            var password = form.querySelector('[id$="password"]').value; // spassword or tpassword

            // Name validation
            var namePattern = /^[a-zA-Z ]+$/;
            if (!namePattern.test(name)) {
                alert("Error: Name should contain only letters and spaces.");
                return false;
            }

            // Roll number / ID validation (student roll number or teacher ID)
            var idPattern = /^[0-9]+$/;
            if (!idPattern.test(rollnoOrId)) {
                alert("Error: ID should contain only numbers.");
                return false;
            }

            // Email validation
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(email)) {
                alert("Error: Invalid email format.");
                return false;
            }

            // Phone number validation (10 digits)
            var phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                alert("Error: Phone number should be exactly 10 digits.");
                return false;
            }

            // Password length validation
            if (password.length < 4) {
                alert("Error: Password must be at least 4 characters long.");
                return false;
            }

            // If all validations pass, return true to submit the form
            return true;
        }

    </script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Student Registration</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form" onsubmit="return validateForm()">
                <label for="sname">Name:</label><br>
                <input type="text" id="sname" name="sname" required><br>

                <label for="srollno">Roll No:</label><br>
                <input type="text" id="srollno" name="srollno" required><br>

                <label for="scourse">Course:</label><br>
                <!-- <input type="text" id="scourse" name="scourse" required><br> -->
                <select id="scourse" name="scourse" required>
                    <option value="">Select your course</option>
                    <option value="MSc-CA">Master of Computer Applications</option>
                    <option value="MSc-CS">Master of Computer Science</option>
                    <option value="BCA">Bachelor Computer Applications</option>
                    <option value="BCS">Bachelor Computer Science</option>
                </select><br>

                <label for="sclass">Class:</label><br>
                <!-- <input type="text" id="sclass" name="sclass" required><br> -->
                <select id="sclass" name="sclass" required>
                    <option value="">Select your class</option>
                    <option value="MSc-CA(Part I)">MSc-CA(Part I)</option>
                    <option value="MSc-CA(Part II)">MSc-CA(Part II)</option>
                    <option value="MSc-CS(Part I)">MSc-CS(Part I)</option>
                    <option value="MSc-CS(Part II)">MSc-CS(Part II)</option>
                    <option value="FYBCA">FYBCA</option>
                    <option value="SYBCA">SYBCA</option>
                    <option value="TYBCA">TYBCA</option>
                    <option value="FYBCS">FYBCS</option>
                    <option value="SYBCS">SYBCS</option>
                    <option value="TYBCS">TYBCS</option>
                </select><br>

                <label for="sbatch">Batch:</label><br>
                <select id="sbatch" name="sbatch" required>
                    <option value="">Select your batch</option>
                    <!-- Batches will be populated here dynamically -->
                </select><br>

<script>
// JavaScript to handle dynamic batch population
const batches = {
    "MSc-CA(Part I)": ["MSc-CA(Part I)-B1", "MSc-CA(Part I)-B2", "MSc-CA(Part I)-B3", "MSc-CA(Part I)-B4"],
    "MSc-CA(Part II)": ["MSc-CA(Part II)-B1", "MSc-CA(Part II)-B2", "MSc-CA(Part II)-B3", "MSc-CA(Part II)-B4"],
    "MSc-CS(Part I)": ["MSc-CS(Part I)-B1", "MSc-CS(Part I)-B2", "MSc-CS(Part I)-B3", "MSc-CS(Part I)-B4"],
    "MSc-CS(Part II)": ["MSc-CS(Part II)-B1", "MSc-CS(Part II)-B2", "MSc-CS(Part II)-B3", "MSc-CS(Part II)-B4"],
    "FYBCA": ["FYBCA-B1", "FYBCA-B2", "FYBCA-B3", "FYBCA-B4", "FYBCA-B5", "FYBCA-B6", "FYBCA-B7", "FYBCA-B8"],
    "SYBCA": ["SYBCA-B1", "SYBCA-B2", "SYBCA-B3", "SYBCA-B4", "SYBCA-B5", "SYBCA-B6", "SYBCA-B7", "SYBCA-B8"],
    "TYBCA": ["TYBCA-B1", "TYBCA-B2", "TYBCA-B3", "TYBCA-B4", "TYBCA-B5", "TYBCA-B6", "TYBCA-B7", "TYBCA-B8"],
    "FYBCS": ["FYBCS-B1", "FYBCS-B2", "FYBCS-B3", "FYBCS-B4", "FYBCS-B5", "FYBCS-B6", "FYBCS-B7", "FYBCS-B8"],
    "SYBCS": ["SYBCS-B1", "SYBCS-B2", "SYBCS-B3", "SYBCS-B4", "SYBCS-B5", "SYBCS-B6", "SYBCS-B7", "SYBCS-B8"],
    "TYBCS": ["TYBCS-B1", "TYBCS-B2", "TYBCS-B3", "TYBCS-B4", "TYBCS-B5", "TYBCS-B6", "TYBCS-B7", "TYBCS-B8"]
};

const classSelect = document.getElementById('sclass');
const batchSelect = document.getElementById('sbatch');

// Update batch dropdown based on selected class
classSelect.addEventListener('change', function() {
    const selectedClass = this.value;
    const batchOptions = batches[selectedClass] || [];

    // Clear current batch options
    batchSelect.innerHTML = '<option value="">Select your batch</option>';

    // Add new options based on selected class
    batchOptions.forEach(function(batch) {
        const option = document.createElement('option');
        option.value = batch;
        option.textContent = batch;
        batchSelect.appendChild(option);
    });
});

// Trigger change event to populate batch options on page load
classSelect.dispatchEvent(new Event('change'));
</script>

                <label for="sdob">Date of Birth:</label><br>
                <input type="date" id="sdob" name="sdob" required><br>

                <label for="sphone">Phone:</label><br>
                <input type="text" id="sphone" name="sphone" maxlength="10" required><br>

                <label for="semail">Email:</label><br>
                <input type="email" id="semail" name="semail" required><br>

                <label for="susername">Username:</label><br>
                <input type="text" id="susername" name="susername" required><br>

                <label for="spassword">Password:</label><br>
                <input type="password" id="spassword" name="spassword" required><br>

                <label for="saddress">Address:</label><br>
                <textarea id="saddress" name="saddress" required></textarea><br>

                <input type="submit" name="student_submit" value="Register">
            </form>
        </div>

        <div class="form-container">
            <h2>Teacher Registration</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form" onsubmit="return validateForm()">
                <label for="tname">Name:</label><br>
                <input type="text" id="tname" name="tname" required><br>

                <label for="tid">ID:</label><br>
                <input type="text" id="tid" name="tid" required><br>

                <label for="tdob">Date of Birth:</label><br>
                <input type="date" id="tdob" name="tdob" required><br>

                <label for="teachingexp">Teaching Experience:</label><br>
                <input type="text" id="teachingexp" name="teachingexp" required><br>
                
                <label for="subjectstaught">Subjects Taught (separated by whitespace):</label><br>
                <input type="text" id="subjectstaught" name="subjectstaught" required><br>

                <label for="classestaught">Classes Taught (separated by whitespace):</label><br>
                <input type="text" id="classestaught" name="classestaught" required><br>

                <label for="batchestaught">Batches Taught (separated by whitespace):</label><br>
                <input type="text" id="batchestaught" name="batchestaught" required><br>

                <label for="pthone">Phone:</label><br>
                <input type="text" id="pthone" name="pthone" maxlength="10" required><br>

                <label for="temail">Email:</label><br>
                <input type="email" id="temail" name="temail" required><br>

                <label for="tusername">Username:</label><br>
                <input type="text" id="tusername" name="tusername" required><br>

                <label for="tpassword">Password:</label><br>
                <input type="password" id="tpassword" name="tpassword" required><br>

                <label for="taddress">Address:</label><br>
                <textarea id="taddress" name="taddress" required></textarea><br>

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
    label[for]::after {
    content: " *";
    color: red;
}

</style>
