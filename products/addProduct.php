<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "Products";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection faile
    d: " . $conn->connect_error);
}

$sql = "INSERT INTO Stock (id, name, category, price)
VALUES (150, 'Rubbish bag', 'Plastic' , 13)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
