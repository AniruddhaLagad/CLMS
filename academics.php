<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academics</title>
    <link rel="stylesheet" href="navigation.css">
</head>
<body>

<div class="content">
    <div id="courseInfo">
        <h3>Academic Courses</h3>
        <table>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Quota (FY)</th>
                <th>Quota (SY)</th>
                <th>Quota (TY)</th>
                <th>Total Quota</th>
            </tr>
            <?php
            $courses = array(
                "BCA" => array("name" => "Bachelor of Computer Applications", "classes" => array("FY" => 160, "SY" => 160, "TY" => 160)),
                "BCS" => array("name" => "Bachelor of Computer Science", "classes" => array("FY" => 160, "SY" => 160, "TY" => 160)),
                "MCA" => array("name" => "Master of Computer Applications", "classes" => array("FY" => 80, "SY" => 80)),
                "MCS" => array("name" => "Master of Computer Science", "classes" => array("FY" => 80, "SY" => 80))
            );

            foreach ($courses as $courseCode => $course) {
                echo "<tr>";
                echo "<td>$courseCode</td>";
                echo "<td>{$course['name']}</td>";
                if (in_array($courseCode, array("BCA", "BCS"))) {
                    echo "<td>{$course['classes']['FY']}</td>";
                    echo "<td>{$course['classes']['SY']}</td>";
                    echo "<td>{$course['classes']['TY']}</td>";
                    $totalQuota = $course['classes']['FY'] + $course['classes']['SY'] + $course['classes']['TY'];
                } else {
                    echo "<td>{$course['classes']['FY']}</td>";
                    echo "<td>{$course['classes']['SY']}</td>";
                    echo "<td>-</td>";
                    $totalQuota = $course['classes']['FY'] + $course['classes']['SY'];
                }
                echo "<td>$totalQuota</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
