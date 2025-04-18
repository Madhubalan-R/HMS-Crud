
<?php

$conn = new mysqli('127.0.0.1:3308', 'root', '', 'patientdata');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstName = $_POST['fname'];
    $LastName = $_POST['lname'];
    $PhoneNumber = $_POST['Phone_number'];
    $Date_of_Birth = $_POST['DOB'];
    $Age = $_POST['Age'];
    $Gender = $_POST['select'];
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

    $sql = "INSERT INTO patienttable (
       FirstName, LastName, PhoneNumber, Date_of_Birth, Age, Gender, Name_of_Decease,
DateOfillness, City, District, State, Country, Maritial_Status,
Parents_Name, Parent_Phone_Number, Emergency_Contact_Person, Relationship, Contact_Number

    ) 
    VALUES (
        '$FirstName', '$LastName', '$PhoneNumber', '$Date_of_Birth', '$Age', '$Gender', '$Name_of_Decease',
        '$Date_of_illness', '$City', '$District', '$State', '$Country', '$Maritial_Status',
        '$Parents_Name', '$Parent_Phone_Number', '$Emergency_Contact_Person', '$Relationship', '$Contact_Number'
    )";
    if ($conn->query($sql) === TRUE) {
        header("Location: view.php"); 
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
