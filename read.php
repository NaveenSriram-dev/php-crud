<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,"3306");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id ,firstname, lastname,email FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows> 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID:".$row["id"]." ; "." Name: " . $row["firstname"]. " " . $row["lastname"]. " ; Email: ".$row["email"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
