<?php
include 'db.php';
$sql = "DELETE FROM MyGuests WHERE id=".$_POST["id"]." " ;

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('location:index.php');
 ?>
