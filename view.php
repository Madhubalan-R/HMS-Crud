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
        <div class="searchFields">
        <a href="patient.html" class="btn btn-primary mb-3"> + Add New Patient</a>
        <input type="search" id="searchBox" placeholder="Search here..." onkeyup="filterTable()">
        </div>
        
        </div>

        <table class="table table-bordered" id="patientTable">
          <thead>
          <tr>
                    <th onclick="sortTable(0)">ID &#x21C5;</th>
                    <th onclick="sortTable(1)">First Name &#x21C5;</th>
                    <th onclick="sortTable(2)">Last Name &#x21C5;</th>
                    <th onclick="sortTable(3)">Phone Number &#x21C5;</th>
                    <th onclick="sortTable(4)">Date of Birth &#x21C5;</th>
                    <th onclick="sortTable(5)">Age &#x21C5;</th>
                    <th onclick="sortTable(6)">Gender &#x21C5;</th>
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
            echo "<tr><td colspan='8' class='text-center'>No Records Found</td></tr>";
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

    function filterTable() {
        const input = document.getElementById("searchBox").value.toUpperCase();
        const table = document.getElementById("patientTable");
        const tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
            const tdArray = tr[i].getElementsByTagName("td");
            let match = false;

            for (let j = 0; j < tdArray.length; j++) {
                if (tdArray[j] && tdArray[j].innerText.toUpperCase().indexOf(input) > -1) {
                    match = true;
                    break;
                }
                
            }

            tr[i].style.display = match ? "" : "none";
        }
    }

    function sortTable(columnIndex) {
        const table = document.getElementById("patientTable");
        const rows = Array.from(table.rows).slice(1); // Exclude the header row
        const isAscending = table.getAttribute("data-sort-order") !== "asc";

        rows.sort((a, b) => {
            const valA = a.cells[columnIndex].innerText.trim();
            const valB = b.cells[columnIndex].innerText.trim();

            return isAscending ? valA.localeCompare(valB) : valB.localeCompare(valA);
        });

        rows.forEach(row => table.tBodies[0].appendChild(row));
        table.setAttribute("data-sort-order", isAscending ? "asc" : "desc");
    }
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
