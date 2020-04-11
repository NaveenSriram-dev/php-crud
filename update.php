<html>
<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <h3>EDIT DETAILS:</h3><br>
    <form method="post">
    <div class="form-group form-row">
      <div class="col">
          <?php
          include 'db.php';
          $sql = "SELECT id ,firstname, lastname,email FROM MyGuests WHERE id='".$_POST["id"]."' ";
          $result = $conn->query($sql);

          if ($result->num_rows> 0) {
              while($row = $result->fetch_assoc()) {
              echo'<input type="text" class="form-control" value="'.$row['firstname'].'" name="firstname">
            </div>
            <div class="col">
              <input type="text" class="form-control" value="'.$row['lastname'].'" name="lastname">
            </div>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" value="'.$row['email'].'" name="email">
          </div>
          <button type="submit" class="btn btn-primary" name="SubmitButton" >Insert<input type="hidden" name="id" value="'.$row["id"].'"></button>
            ';
              }
          }
          ?>
  </form>
</body>
</html>

<?php
if(isset($_POST['SubmitButton'])){
include 'db.php';
$sql = "UPDATE MyGuests SET firstname='".$_POST["firstname"]."',lastname='".$_POST["lastname"]."',email='".$_POST["email"]."' WHERE id='".$_POST["id"]."' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
header('location:index.php');
}
?>
