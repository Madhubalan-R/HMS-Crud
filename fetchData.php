<?php
// Get the search query from the request
$query = isset($_GET['query']) ? $_GET['query'] : false;

if ($query) {
    // Database connection
    $conn = new mysqli('127.0.0.1:3308', 'root', '', 'patientdata');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Secure the query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM patienttable WHERE FirstName LIKE CONCAT(?, '%') ORDER BY FirstName ASC");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();

    // Prepare response
    $suggestions = [];
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['FirstName']; // Assuming 'fname' is the column for first names
        $data[] = $row['Phone_number']; // Adjust this to match your table's columns
    }
    $response = [
        'query' => $query,
        'suggestions' => $suggestions,
        'data' => $data,
    ];

    // Return as JSON
    echo json_encode($response);

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="text" name="" id="box" placeholder="Search for patient..." />




</body>
</html>