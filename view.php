<?php
$conn = new mysqli('127.0.0.1:3308', 'root', '', 'patientdata');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM patienttable";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
        <div class="Header">
        <h1 class="text-center my-4">Patient Records</h1>
         <a href="patient.html" class="btn btn-primary mb-3"> + Add New Patient</a>
        </div>

        <table class="table table-bordered">
          <thead>
           <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Gender</th>
            <th style="text-align: center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['FirstName']}</td>
                    <td>{$row['LastName']}</td>
                    <td>{$row['PhoneNumber']}</td>
                    <td>{$row['Date_of_Birth']}</td>
                    <td>{$row['Age']}</td>
                    <td>{$row['Gender']}</td>
                    <td>
                        <div style='display: flex'>
                            <a href='read.php?id={$row['id']}' class='btn btn-primary btn-sm'>View</a>
                            <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            <a onclick='printData({$row['id']})' class='btn btn-success btn-sm'>Print</a>
                        </div>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='20' class='text-center'>No Records Found</td></tr>";
        }
        ?>
    </tbody>
</table>

</div>
</body>
<script>
    function printData(id) {
        const url = `patientForm.php?id=${id}`;
        const printWindow = window.open(url, '', '');
        printWindow.onload = function () {
                printWindow.print();
            }
            
        }

</script>

</html>

<?php
$conn->close();
?>
