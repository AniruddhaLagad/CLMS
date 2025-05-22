<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(to bottom, white 0%, #87CEEB 50%, white 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: #333;
    }



        .container {
            background-color:rgb(251, 203, 161);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 100%;
            max-width: 500px;
            margin-top: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color:rgb(14, 14, 14);
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            font-size: 18px;
            color: #e74c3c;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
                margin-top: 20px;
            }

            h1 {
                font-size: 20px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Check Your Practical Schedule!!!</h1>
        <form action="query1.php" method="POST">
            <label for="srollno">Enter Your Roll Number:</label>
            <input type="text" id="srollno" name="srollno" required>
            <input type="hidden" name="action" value="download_timetable">
            <button type="submit">Download</button>
        </form>
    </div>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $_POST["srollno"];

    // Check roll number range and display timetable accordingly
    if       (1001 <= $roll_number && $roll_number <= 1200) {
        header("Location: TIMETABLES/FYBCA.txt");
        exit;
    } elseif (1201 <= $roll_number && $roll_number <= 1400) {
        header("Location: TIMETABLES/SYBCA.txt");
        exit;
    } elseif (1401 <= $roll_number && $roll_number <= 1600) {
        header("Location: TIMETABLES/TYBCA.txt");
        exit;
    } elseif (2001 <= $roll_number && $roll_number <= 2200) {
        header("Location: TIMETABLES/FYBCS.txt");
        exit;
    } elseif (2201 <= $roll_number && $roll_number <= 2400) {
        header("Location: TIMETABLES/SYBCS.txt");
        exit;
    } elseif (2401 <= $roll_number && $roll_number <= 2600) {
        header("Location: TIMETABLES/TYBCS.txt");
        exit;
    } elseif (3001 <= $roll_number && $roll_number <= 3200) {
        header("Location: TIMETABLES/FYMCA.txt");
        exit;
    } elseif (3201 <= $roll_number && $roll_number <= 3400) {
        header("Location: TIMETABLES/SYMCA.txt");
        exit;
    } elseif (4001 <= $roll_number && $roll_number <= 4200) {
        header("Location: TIMETABLES/FYMCS.txt");
        exit;
    } elseif (4201 <= $roll_number && $roll_number <= 4400) {
        header("Location: TIMETABLES/SYMCS.txt");
        exit;
    } else {
        echo "<div class='container message'>Roll number out of range</div>";
    }
}
?>
