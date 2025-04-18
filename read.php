<?php
$conn = new mysqli('127.0.0.1:3308', 'root', '', 'patientdata');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$query = "SELECT * FROM patienttable WHERE id = $id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "No data found for ID: $id";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    h1{
        text-align: center;
        padding: 20px;
    }
</style>

<body>
    <h1>View the Selected Patient Details</h1>
    <div class="container">
            <div class="form">
                <div class="row">
                    <div class="mb-1 col">
                        <div class="row">
                        <div class="col"><strong>Patient First Name:</strong></div>
                        <div class="col"><p><?php echo $row['FirstName']; ?></p></div>
                        </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>LastName:</strong></div>
                        <div class="col"><p><?php echo $row['LastName']; ?></p></div>
                        </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Phone Number:</strong></div>
                        <div class="col"><p><?php echo $row['PhoneNumber']; ?></p></div>
                        </div>
                     </div>
                </div>
                <div class="row">
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Date of Birth:</strong></div>
                        <div class="col"><p><?php echo $row['Date_of_Birth']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Age:</strong></div>
                        <div class="col"><p><?php echo $row['Age']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Gender:</strong></div>
                        <div class="col"><p><?php echo $row['Gender']; ?></p></div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Name of Decease:</strong></div>
                        <div class="col"><p><?php echo $row['Name_of_Decease']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Date of illness:</strong></div>
                        <div class="col"><p><?php echo $row['DateOfillness']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>City:</strong></div>
                        <div class="col"><p><?php echo $row['City']; ?></p></div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>District:</strong></div>
                        <div class="col"><p><?php echo $row['District']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>State:</strong></div>
                        <div class="col"><p><?php echo $row['State']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Country:</strong></div>
                        <div class="col"><p><?php echo $row['Country']; ?></p></div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Maritial Status:</strong></div>
                        <div class="col"><p><?php echo $row['Maritial_Status']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Parents Name:</strong></div>
                        <div class="col"><p><?php echo $row['Parents_Name']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>phone number:</strong></div>
                        <div class="col"><p><?php echo $row['Parent_Phone_number']; ?></p></div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Emergency Contact Person:</strong></div>
                        <div class="col"><p><?php echo $row['Emergency_Contact_Person']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>relationship:</strong></div>
                        <div class="col"><p><?php echo $row['Relationship']; ?></p></div>
                    </div>
                    </div>
                    <div class="mb-1 col">
                    <div class="row">
                        <div class="col"><strong>Contact Number:</strong></div>
                        <div class="col"><p><?php echo $row['Contact_Number']; ?></p></div>
                    </div>
                    </div>
                </div>
            <div class="row">
                <div class="col text-center">
                    <a href="http://localhost:8080/Hospital%20Management/HMS-Crud/view.php"><button type="submit" class="btn btn-primary mt-3"><- Back</button></a>
                </div>
            </div>
    </div>

</body>

</html>