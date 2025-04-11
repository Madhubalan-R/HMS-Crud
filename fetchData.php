<?php
header('Content-Type: application/json'); // Ensure the response is JSON
$conn = new mysqli('127.0.0.1:3308', 'root', '', 'patientdata');

if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

if (isset($_POST['searchTerm']) && !empty($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    $stmt = $conn->prepare("SELECT * FROM patienttable WHERE FirstName LIKE ? OR LastName LIKE ?");
    $likeTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("ss", $likeTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $patients = [];

    while ($row = $result->fetch_assoc()) {
        $patients[] = $row; // Add each row to the patients array
    }

    echo json_encode($patients); // Return as JSON
} else {
    echo json_encode(['error' => 'No search term provided']);
}

$stmt->close();
$conn->close();
?>
