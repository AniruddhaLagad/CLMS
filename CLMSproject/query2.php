<!DOCTYPE html>
<html>
<head>
  <title>Check Lab Availability!!!</title>
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

    h2 {
        margin-top: 0;
        color:red;
        
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
  <h2>Check Lab Availability!!!</h2>
  <form method="post">
    <input type="text" name="labInput" placeholder="Enter Lab Number or Name" required>
    <input type="submit" name="submit" value="Check Availability">
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
