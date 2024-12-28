<!DOCTYPE html>
<html>
<head>
    <title>New Enquiry</title>
    <style>
        /* Styling for table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50; /* Green background for header */
            color: white; /* White text color */
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9; /* Light gray background for cells */
        }

        h2 {
            color: #4CAF50; /* Green color for the title */
            text-align: center;
            margin-bottom: 20px;
        }

        /* Styling for the table and headers */
        .table-container {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #4CAF50; /* Green border for the whole table */
            padding: 20px;
            border-radius: 8px;
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <h2>Student Enquiry Details</h2>
        <table>
            <tr>
                <th>Name</th>
                <td>{{ $data['name'] }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th>Course</th>
                <td>{{ $data['subject'] }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $data['number'] }}</td>
            </tr>
            <tr>
                <th>Message</th>
                <td>{{ $data['message'] }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
