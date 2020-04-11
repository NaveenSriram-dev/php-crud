<html>
<body>
<?php

include 'db.php';
$sql = "SELECT id ,firstname, lastname,email FROM MyGuests WHERE id=".$_POST["id"]." ";
$result = $conn->query($sql);

if ($result->num_rows> 0) {
    echo'
    <form>
    <div class="form-group form-row">
      <div class="col">
        <input type="text" class="form-control" placeholder="'.$row['firstname'].'" name="firstname">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="'.$row['lastname'].'" name="lastname">
      </div>
    </div>
    <div class="form-group">
      <input type="email" class="form-control" value="'.$row['email'].'" name="email">
    </div>
    <button type="submit" class="btn btn-primary">Insert</button>
  </form>
  ';
}
$sql = "UPDATE MyGuests SET firstname='".$firstname."',lastname='".$lastname."',email='".$email."' WHERE id=".$_POST['id']." ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
</body></html>
