<!DOCTYPE html>
<html>
<head>
    <title>Left Join SQL Results</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php

include 'db_conn.php';

// SQL query
$sql = "SELECT bookregister.Fullname, users.username
        FROM bookregister
        LEFT JOIN users ON bookregister.id = users.id
        ORDER BY bookregister.Fullname";

// Execute query
$result = $conn->query($sql);

// Display results in HTML table
if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>Fullname</th>
    <th>Username</th>
    </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Fullname"]."</td><td>".$row["username"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

</body>
</html>
