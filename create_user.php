<?php

$localhost = "localhost:3307";
$root = "root";
$password = "";
$database = "mydb";

// Include the file containing your database connection details
include 'connection.php';

// Create a new mysqli connection
$connections = new mysqli($localhost, $root, $password, $database);

// Check if the connection was successful
if($connections->connect_error)
    die("Connection failed: ".$connections->connect_error);

// Retrieve values from the form submitted via POST method
$Lastname = $_POST['Lastname'];
$Firstname = $_POST['Firstname'];
$Age = $_POST['Age'];
$Gender = $_POST['Gender'];
$EmailAddress = $_POST['EmailAddress'];
$PhoneNumber = $_POST['PhoneNumber'];
$StatusofApplication = $_POST['StatusofApplication'];

// SQL query to insert data into the database table
$sql = "INSERT INTO create_tbl (Lastname, Firstname, Age, Gender, EmailAddress, PhoneNumber, StatusofApplication) 
        VALUES ('$Lastname', '$Firstname', '$Age', '$Gender', '$EmailAddress', '$PhoneNumber', '$StatusofApplication')";

// Execute the query
if ($connections->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connections->error;
}

// Close the database connection
$connections->close();
?>
