<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical Exam Timetables</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2{
            text-align:center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr {
            background-color: #f2f2f2; /* Background color for all rows */
        }

        .pdf-link {
            text-decoration: none;
            color: blue;
        }

        .pdf-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h2>Practical EXamination Timetable</h2>
<table>
    <thead>
        <tr>
            <th>Course</th>
            <th>Class</th>
            <th>PDF</th>
        </tr>
    </thead>
    <tbody>
        <!-- Rows for BCA FY, SY, TY -->
        <tr>
            <td rowspan="3">BCA</td>
            <td>FYBCA</td>
            <td><a class="pdf-link" href="path_to_fybca_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <tr>
            <td>SYBCA</td>
            <td><a class="pdf-link" href="path_to_sybca_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <tr>
            <td>TYBCA</td>
            <td><a class="pdf-link" href="path_to_tybca_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <!-- Rows for BCS FY, SY, TY -->
        <tr>
            <td rowspan="3">BCS</td>
            <td>FYBCS</td>
            <td><a class="pdf-link" href="path_to_fybcs_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <tr>
            <td>SYBCS</td>
            <td><a class="pdf-link" href="path_to_sybcs_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <tr>
            <td>TYBCS</td>
            <td><a class="pdf-link" href="path_to_tybcs_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <!-- Rows for MCA FY, SY -->
        <tr>
            <td rowspan="2">MCA</td>
            <td>FYMCA</td>
            <td><a class="pdf-link" href="path_to_fymca_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <tr>
            <td>SYMCA</td>
            <td><a class="pdf-link" href="path_to_symca_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <!-- Rows for MCS FY, SY -->
        <tr>
            <td rowspan="2">MCS</td>
            <td>FYMCS</td>
            <td><a class="pdf-link" href="path_to_fymcs_timetable.pdf" target="_blank">Download</a></td>
        </tr>
        <tr>
            <td>SYMCS</td>
            <td><a class="pdf-link" href="path_to_symcs_timetable.pdf" target="_blank">Download</a></td>
        </tr>
    </tbody>
</table>

</body>
</html>
