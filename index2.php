<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PROJ CRUD</title>
    </head>
    <body>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <div class="jumbotron">
            <h1 class="display-4">PROJ CRUD</h1>
            <p class="lead">A simple script to learn php and sql.</p>
        </div>

<! The table code!>
        <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Firstname</th>
                  <th scope="col">lastname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  include 'db.php';
                  $sql = "SELECT id ,firstname, lastname,email FROM MyGuests";
                  $result = $conn->query($sql);
                  if ($result->num_rows> 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                      echo'<tr>
                      <th scope="row">'.$row["id"].'</th>';
                      echo ' <td>'.$row["firstname"].'</td>';
                      echo ' <td>'.$row["lastname"].'</td>';
                      echo ' <td>'.$row["email"].'</td>';
// The edit icon code
                      echo ' <td><form action="update.php" method="post" >
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"><input type="hidden" name="id" value="'.$row["id"].'"></span></button>
                      </form> </td>';
                      echo ' <td> <span class="glyphicon glyphicon-trash"></span> </td>';
                      echo '</tr>';
                      }
                  }
                  ?>
              </tbody>
              </table>

<!The insert button code!>

          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ins">Insert</button>
            <div class="modal fade" id="ins" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <form action="insert.php" method="post">
                          <div class="form-group form-row">
                            <div class="col">
                              <input type="text" class="form-control" placeholder="First name"name="firstname">
                            </div>
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Last name" name="lastname">
                            </div>
                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                          </div>
                          <button type="submit" class="btn btn-primary">Insert</button>
                        </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
            </div>
    </body>
</html>
