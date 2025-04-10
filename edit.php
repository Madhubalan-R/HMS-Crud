<?php
$conn = new mysqli('127.0.0.1:3308', 'root', '', 'patientdata');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM patienttable WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found!";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Date_of_Birth = $_POST['Date_of_Birth'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Name_of_Decease = $_POST['Name_of_Decease'];
    $Date_of_illness = $_POST['DateOfillness'];
    $City = $_POST['City'];
    $District = $_POST['District'];
    $State = $_POST['State'];
    $Country = $_POST['Country'];
    $Maritial_Status = $_POST['Maritial_Status'];
    $Parents_Name = $_POST['Parents_Name'];
    $Parent_Phone_Number = $_POST['Parent_Phone_number'];
    $Emergency_Contact_Person = $_POST['Emergency_Contact_Person'];
    $Relationship = $_POST['Relationship'];
    $Contact_Number = $_POST['Contact_Number'];

    $sql = "UPDATE patienttable SET 
        FirstName='$FirstName', 
        LastName='$LastName', 
        PhoneNumber='$PhoneNumber', 
        Date_of_Birth='$Date_of_Birth', 
        Age='$Age',
        Gender='$Gender',
        Name_of_Decease='$Name_of_Decease', 
        DateOfillness='$Date_of_illness', 
        City='$City', 
        District='$District', 
        State='$State',
        Country='$Country', 
        Maritial_Status='$Maritial_Status', 
        Parents_Name='$Parents_Name', 
        Parent_Phone_Number='$Parent_Phone_Number', 
        Emergency_Contact_Person='$Emergency_Contact_Person' ,
        Relationship='$Relationship', 
        Contact_Number='$Contact_Number' 
        WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully!'); window.location.href = 'view.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Edit Patient Record</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="FirstName" value="<?php echo $row['FirstName']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="LastName" value="<?php echo $row['LastName']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="PhoneNumber" maxlength="10" value="<?php echo $row['PhoneNumber']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="Date_of_Birth" value="<?php echo $row['Date_of_Birth']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" name="Age" value="<?php echo $row['Age']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select class="form-select" name="Gender" required>
                    <option value="Male" <?php if ($row['Gender'] == 'Male') echo "selected"; ?>>Male</option>
                    <option value="Female" <?php if ($row['Gender'] == 'Female') echo "selected"; ?>>Female</option>
                    <option value="Other" <?php if ($row['Gender'] == 'Other') echo "selected"; ?>>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Name of Decease</label>
                <input type="text" class="form-control" name="Name_of_Decease" value="<?php echo $row['Name_of_Decease']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of illness</label>
                <input type="date" class="form-control" name="DateOfillness" value="<?php echo $row['DateOfillness']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" class="form-control" name="City" value="<?php echo $row['City']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">District</label>
                <input type="text" class="form-control" name="District" value="<?php echo $row['District']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">State</label>
                <input type="text" class="form-control" name="State" value="<?php echo $row['State']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Country</label>
                <input type="text" class="form-control" name="Country" value="<?php echo $row['Country']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Maritial Status</label>
                <select class="form-select" name="Maritial_Status" required>
                    <option value="Married" <?php if ($row['Maritial_Status'] == 'Married') echo "selected"; ?>>Married</option>
                    <option value="Single" <?php if ($row['Maritial_Status'] == 'Single') echo "selected"; ?>>Single</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Parents Name</label>
                <input type="text" class="form-control" name="Parents_Name" value="<?php echo $row['Parents_Name']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">phone number</label>
                <input type="tel" class="form-control" name="Parent_Phone_number" maxlength="10" value="<?php echo $row['Parent_Phone_number']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Emergency Contact Person</label>
                <input type="text" class="form-control" name="Emergency_Contact_Person" value="<?php echo $row['Emergency_Contact_Person']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">relationship</label>
                <input type="text" class="form-control" name="Relationship" value="<?php echo $row['Relationship']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Number</label>
                <input type="tel" class="form-control" name="Contact_Number" maxlength="10" value="<?php echo $row['Contact_Number']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
