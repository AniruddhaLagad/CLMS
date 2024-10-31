<!DOCTYPE html>
<html>
<head>
    <title>Timetable</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            border: 4px double black;
            height:140px;
            padding: 20px;
            text-align: center;
            margin-top: 180px;
            background-color:#FEFE52 ;

        }

        h1 {
            margin-top: 0;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 200px;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Check Your Practical Schedule!!!</h1>
        <form action="query1.php" method="POST">
            <label for="srollno">Enter Your Roll Number:</label>
            <input type="text" id="srollno" name="srollno" required>
            <input type="hidden" name="action" value="download_timetable"> <!-- Include action parameter -->
            <button type="submit">Download</button>
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $_POST["srollno"];

    // Check roll number range and display timetable accordingly
    if (1001 <= $roll_number && $roll_number <= 1160) {
        header("Location: TIMETABLES/FYBCA.txt");
        exit;
    } elseif (1161 <= $roll_number && $roll_number <= 1320) {
        header("Location: TIMETABLES/SYBCA.txt");
        exit;
    } elseif (1321 <= $roll_number && $roll_number <= 1480) {
        header("Location: TIMETABLES/TYBCA.txt");
        exit;
    } elseif (2001 <= $roll_number && $roll_number <= 2160) {
        header("Location: TIMETABLES/FYBCS.txt");
        exit;
    } elseif (2161 <= $roll_number && $roll_number <= 2320) {
        header("Location: TIMETABLES/SYBCS.txt");
        exit;
    } elseif (2321 <= $roll_number && $roll_number <= 2480) {
        header("Location: TIMETABLES/TYBCS.txt");
        exit;
    } elseif (3001 <= $roll_number && $roll_number <= 3060) {
        header("Location: TIMETABLES/FYMCA.txt");
        exit;
    } elseif (3061 <= $roll_number && $roll_number <= 3120) {
        header("Location: TIMETABLES/SYMCA.txt");
        exit;
    } elseif (4001 <= $roll_number && $roll_number <= 4060) {
        header("Location: TIMETABLES/FYMCS.txt");
        exit;
    } elseif (4061 <= $roll_number && $roll_number <= 4120) {
        header("Location: TIMETABLES/SYMCS.txt");
        exit;
    } else {
        $timetable = "Roll number out of range";
        echo "<div class='container'><h2>$timetable</h2></div>";
    }
}
?>
