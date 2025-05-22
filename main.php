<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Laboratory Management System</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('Images/mainpage.JPG'); /* Add the URL of your background image here */
            background-size: cover;
            background-repeat: no-repeat;
            position: relative; /* Set position relative for absolute positioning of child elements */
        }

        .container {
            margin-top: 40px;
            max-width: 800px; /* Increased container width */
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7); /* Add a semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #333;
            position: relative; /* Set position relative for absolute positioning of child elements */
        }

        .title {
            text-align: center;
            color: #333;
            margin-top: 20px; /* Adjust margin to move the heading above the container */
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
           /* background-color: rgba(255, 255, 255, 0.7); /* Match container background color */
            padding: 10px 20px; /* Add padding to make the heading more visible */
            border-radius: 10px; /* Add border radius to match container */
            z-index: 1; /* Ensure the heading appears above other elements */
            font-family: Algerian, serif; /* Use Algerian font for the heading */
        }

        /* Link styles */
        .container a {
            display: block;
            padding: 10px 20px;
            margin-bottom: 10px;
            color: #333;
            font-family: "times New Roman";
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s;
            border: 2px solid #333;
            position: relative; /* Set position relative to allow z-index to work */
            z-index: 2; /* Ensure links appear above the container background */
        }

        /* Hover effect */
        .container a:hover {
            
            color: red ;
            
        }

        /* Highlighting */
        .highlight {
            background-color: #87CEFA; /* Sky blue */
            color: #fff;
        }

        .alternate {
            background-color: #ffb6c1; /* Baby pink */
            color: #333;
        }

        /* Additional styling */
        .important {
            font-weight: bold;
            color: #ff5733; /* Giant orange */
        }
    </style>
</head>
<body>
<div class="title">Computer Laboratory Management System</div>
    <div class="container">
       
       <b> <a href="query1.php" class="highlight">Check Your Practical Schedule</a>
        <a href="query2.php" class="alternate">Check Lab Availability</a>
        <a href="query3.php" class="highlight">Download Timetables Here</a>
        <a href="query4.php" class="alternate">See Free Labs for this week</a>
        <a href="query5.php" class="highlight">Batch Practical Days/Student's Availability</a>
        <a href="query6.php" class="alternate">Teacher's Work/Availability</a>
        <a href="query7.php" class="highlight">PCs Availability</a>
        <a href="query8.php" class="alternate">Notice: Labbook Submission & Certification</a>
        <a href="query9.php" class="highlight">Download Labbooks</a>
      <a href="https://www.moderncollegegk.org/Gallery_Images.php?id=37" class="alternate">Interaction</a> </b>
    </div>
</body>
</html>
