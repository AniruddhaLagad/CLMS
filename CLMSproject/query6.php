<?php
// Define teacher data
$teachers = array(
    // FYBCA
    array('name' => 'Pawar N.P', 'category' => 'FYBCA', 'subjects' => 'SEM1-C Prg, SEM2-Advanced C'),
    array('name' => 'Shinde S.S', 'category' => 'FYBCA', 'subjects' => 'SEM1-FOC, SEM2-CO'),
    array('name' => 'Rewaskar P.D', 'category' => 'FYBCA', 'subjects' => 'SEM1-Applied Maths, SEM2-DBMS-I'),

    // FYBCS
    array('name' => 'Jadhav M.K', 'category' => 'FYBCS', 'subjects' => 'SEM-I Mathematics, SEM-II Basic Physics'),
    array('name' => 'Misal M.R', 'category' => 'FYBCS', 'subjects' => 'SEM-I Programming in C, SEM-II Communication skills'),
    array('name' => 'Patil M.B', 'category' => 'FYBCS', 'subjects' => 'SEM-II Digital Electronics, SEM-I Computer Fundamentals'),

    // SYBCA
    array('name' => 'Lohar S.P', 'category' => 'SYBCA', 'subjects' => 'SEM-I WebTech, SEM-II PHP'),
    array('name' => 'Jadhav S.D', 'category' => 'SYBCA', 'subjects' => 'SEM-I CN, SEM-II C++'),
    array('name' => 'Mokashi R.D', 'category' => 'SYBCA', 'subjects' => 'SEM-I DS, SEM-II Python'),

    // SYBCS
    array('name' => 'Thube D.H', 'category' => 'SYBCS', 'subjects' => 'SEM-I Advanced C Programming, SEM-II Data Structure'),
    array('name' => 'Sathe A.P', 'category' => 'SYBCS', 'subjects' => 'SEM-I Computer Orgainization, SEM-II Operating system'),
    array('name' => 'Bahirat P.B', 'category' => 'SYBCS', 'subjects' => 'SEM-I Basic Electronics, SEM-II Programming Laboratory'),

    // TYBCA
    array('name' => 'Meher D.P', 'category' => 'TYBCA', 'subjects' => 'SEM-I Data Mining, SEM-II Go Prg'),
    array('name' => 'Jabade M.D', 'category' => 'TYBCA', 'subjects' => 'SEM-I Java Prg, SEM-II Android Prg'),
    array('name' => 'Kale P.M', 'category' => 'TYBCA', 'subjects' => 'SEM-I Operating System, SEM-II Project Lab'),

    // TYBCS
    array('name' => 'Kanse P.B', 'category' => 'TYBCS', 'subjects' => 'SEM-1 Analysis of Algorithms, SEM-II Web Designing'),
    array('name' => 'Jagade T.Y', 'category' => 'TYBCS', 'subjects' => 'SEM-1 Software Engineering, SEM-II Data Science'),
    array('name' => 'Junnarkar B.S', 'category' => 'TYBCS', 'subjects' => 'SEM-1 Java Programming, SEM-II Rwsearch Project'),

    // FYMCA
    array('name' => 'Parage R.T', 'category' => 'FYMCA', 'subjects' => 'SEM-1 IoT, SEM-II AI'),
    array('name' => 'Waghmode D.M', 'category' => 'FYMCA', 'subjects' => 'SEM-1 MIS, SEM-II Data Science'),

    // FYMCS
    array('name' => 'Sawant P.D', 'category' => 'FYMCS', 'subjects' => 'SEM-I OOP, SEM-II Software Architecture'),
    array('name' => 'Kokare A.B', 'category' => 'FYMCS', 'subjects' => 'SEM-I NLP, SEM-II ML and DL'),

    // SYMCA
    array('name' => 'Bhor P.E', 'category' => 'SYMCA', 'subjects' => 'SEM-I Software Automation, SEM-II DS using Java'),
    array('name' => 'Ingulakar U.S', 'category' => 'SYMCA', 'subjects' => 'SEM-I ML DS AI, SEM-II Big Data'),

    // SYMCS
    array('name' => 'Raykar P.O', 'category' => 'SYMCS', 'subjects' => 'SEM-I Big Data, SEM-II Adavanced Python'),
    array('name' => 'Darekar M.J', 'category' => 'SYMCS', 'subjects' => 'SEM-I Computer Graphics, SEM-II Data Networking')
);

// Define time slot availability for each teacher category
$availability = array(
    'FYBCA' => array('8 am to 10 am' => 'Busy in lab', '11 am to 1 pm' => 'Lectures', '2 pm to 4 pm' => 'Free'),
    'FYBCS' => array('8 am to 10 am' => 'Busy in lab', '11 am to 1 pm' => 'Lectures', '2 pm to 4 pm' => 'Free'),
    'SYBCA' => array('8 am to 10 am' => 'Lectures', '11 am to 1 pm' => 'Busy in lab', '2 pm to 4 pm' => 'Free'),
    'SYBCS' => array('8 am to 10 am' => 'Lectures', '11 am to 1 pm' => 'Busy in lab', '2 pm to 4 pm' => 'Free'),
    'TYBCA' => array('8 am to 10 am' => 'Free', '11 am to 1 pm' => 'Lectures', '2 pm to 4 pm' => 'Busy in lab'),
    'TYBCS' => array('8 am to 10 am' => 'Free', '11 am to 1 pm' => 'Lectures', '2 pm to 4 pm' => 'Busy in lab'),
    'FYMCA' => array('8 am to 10 am' => 'Busy in lab', '11 am to 1 pm' => 'Lectures', '2 pm to 4 pm' => 'Free'),
    'FYMCS' => array('8 am to 10 am' => 'Busy in lab', '11 am to 1 pm' => 'Lectures', '2 pm to 4 pm' => 'Free'),
    'SYMCA' => array('8 am to 10 am' => 'Free', '11 am to 1 pm' => 'Busy in lab', '2 pm to 4 pm' => 'Free'),
    'SYMCS' => array('8 am to 10 am' => 'Free', '11 am to 1 pm' => 'Busy in lab', '2 pm to 4 pm' => 'Free'),
);

// Function to get availability for a given time slot and category
function getAvailability($category, $timeSlot) {
    global $availability;
    return isset($availability[$category][$timeSlot]) ? $availability[$category][$timeSlot] : 'N/A';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Schedule</title>
    <style>
        h2{
            text-align:center;
            font-family:algerian;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            background-color:#c6f8f6
        }
        th{
            background-color: #6ef8f6;
        }
        
    </style>
</head>
<body>
    <h2>Teacher Schedule</h2>
    <table>
        <tr>
            <th>Teacher Name</th>
            <th>8 am to 10 am</th>
            <th>11 am to 1 pm</th>
            <th>2 pm to 4 pm</th>
        </tr>
        <?php foreach ($teachers as $teacher): ?>
        <tr>
            <td>Prof. <?php echo $teacher['name']; ?></td>
            <td><?php echo getAvailability($teacher['category'], '8 am to 10 am'); ?></td>
            <td><?php echo getAvailability($teacher['category'], '11 am to 1 pm'); ?></td>
            <td><?php echo getAvailability($teacher['category'], '2 pm to 4 pm'); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
