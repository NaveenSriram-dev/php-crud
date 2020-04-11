<?php
    include 'db.php';
    $sql = "SELECT id ,firstname, lastname,email FROM MyGuests";
    $result = $conn->query($sql);
    echo'
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Firstname</th>
              <th scope="col">lastname</th>
              <th scope="col">Email</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead></table>';
    if ($result->num_rows> 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo '
          <table class="table">
          <tbody>
                <tr>
                  <th scope="row">'.$row["id"].'</th>
                  <td>'.$row["firstname"].'</td>
                  <td>'.$row["lastname"].'</td>
                  <td>'.$row["email"].'</td>
                  <td> <a href="#">edit</a> </td>
                  <td> <a href="#">delete</a> </td>
                </tr>
          </tbody>
          </table>';
          }
    }

    $conn->close();
 ?>
