<?php
include 'db.php';
$sql = " INSERT INTO MyGuests (firstname,lastname,email)
VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."') ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header('location:index2.php');
$conn->close();
?>
