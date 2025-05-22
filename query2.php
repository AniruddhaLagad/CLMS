<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Lab Availability!!!</title>
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
            background-color: rgb(251, 203, 161);
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
            color: rgb(14, 14, 14);
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

        select, input[type="text"] {
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
        <h1>Check Lab Availability!!!</h1>
        <form method="post">
            <label for="labInput">Select Lab:</label>
            <select name="labInput" id="labInput" required>
                <option value="BCA LAB-I">BCA Lab-I</option>
                <option value="BCA LAB-II">BCA Lab-II</option>
                <option value="BCA LAB-III">BCA Lab-III</option>
                <option value="BCS LAB-I">BCS Lab-I</option>
                <option value="BCS LAB-II">BCS Lab-II</option>
                <option value="BCS LAB-III">BCS Lab-III</option>
                <option value="MCA LAB-I">MCA Lab-I</option>
                <option value="MCA LAB-II">MCA Lab-II</option>
                <option value="MCS LAB-I">MCS Lab-I</option>
                <option value="MCS LAB-II">MCS Lab-II</option>
            </select>
            <button type="submit" name="submit">Check Availability</button>
        </form>
        <p>
            <?php
            if(isset($_POST['submit'])){
                $labInput = strtoupper($_POST['labInput']);
                $labsNeverFree = array("BCA LAB-I", "BCA LAB-II", "BCA LAB-III", "BCS LAB-I", "BCS LAB-II", "BCS LAB-III");
                $mcaLab1FreeDays = array("FRIDAY", "SATURDAY");
                $mcaLab2FreeDays = array("SATURDAY", "MONDAY");
                $mcsLab1FreeDays = array("FRIDAY", "SATURDAY");
                $mcsLab2FreeDays = array("SATURDAY", "MONDAY");

                if (in_array($labInput, $labsNeverFree)) {
                    echo "Sorry, this lab is never available for extra student practicals on weekdays.";
                } else if ($labInput === "MCA LAB-I") {
                    $today = strtoupper(date('l'));
                    echo "Today is: " . $today . "<br>";
                    echo "Free days for MCA LAB-I: " . implode(", ", $mcaLab1FreeDays);
                } else if ($labInput === "MCA LAB-II") {
                    $today = strtoupper(date('l'));
                    echo "Today is: " . $today . "<br>";
                    echo "Free days for MCA LAB-II: " . implode(", ", $mcaLab2FreeDays);
                } else if ($labInput === "MCS LAB-I") {
                    $today = strtoupper(date('l'));
                    echo "Today is: " . $today . "<br>";
                    echo "Free days for MCS LAB-I: " . implode(", ", $mcsLab1FreeDays);
                } else if ($labInput === "MCS LAB-II") {
                    $today = strtoupper(date('l'));
                    echo "Today is: " . $today . "<br>";
                    echo "Free days for MCS LAB-II: " . implode(", ", $mcsLab2FreeDays);
                } else {
                    echo "Invalid lab number or name.";
                }
            }
            ?>
        </p>
    </div>

</body>
</html>
