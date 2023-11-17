<?php
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'Buy books', 'Please buy books', current_timestamp());

    $servername = "localhost";
    $username="root";
    $password="";
    $database="notes";

    $insert = false;

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_GET['delete'])) {
      $sno = $_GET['delete'];
      $sql = "DELETE FROM `notes ` WHERE `notes`.`sno` = $sno";
      $result = mysqli_query($conn, $sql);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if(isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleedit'];
        $description = $_POST['descriptionedit'];

        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno;";

        $result = mysqli_query($conn, $sql);
      } else{

      
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";

        $result = mysqli_query($conn, $sql);

        if($result) {
          $insert = true;
        }
      }
    }

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <title>PHP - CRUD</title>


</head>

<body>
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
  Launch demo modal
</button> -->

  <!-- Modal -->
  <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodallabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editmodallabel">Edit Noteedit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/myproj/crud/index.php" method="post">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group mb-3">
              <label for="title" class="form-label">Note title</label>
              <input type="text" class="form-control" id="titleedit" name="titleedit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Note description</label>
              <textarea class="form-control" id="descriptionedit" style="height: 100px" type="text"
                name="descriptionedit"></textarea>

            </div>
            <button type="submit" class="btn btn-primary my-3">Update note</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PHP CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>

        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php
  if($insert) {
    echo "<div class='alert alert-success' role='alert'>
  Record inserted 
</div>";
  }
?>

  <div class="container my-4">
    <h2>Add a note</h2>
    <form action="/myproj/crud/index.php" method="post">
      <div class="form-group mb-3">
        <label for="title" class="form-label">Note title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="desc">Note description</label>
        <textarea class="form-control" id="description" style="height: 100px" type="text" name="description"></textarea>

      </div>
      <button type="submit" class="btn btn-primary my-3">Add note</button>
    </form>
  </div>

  <div class="container">

    <table class="table my-4" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.no</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        <?php
            $sql = "SELECT * FROM `notes`";
            $result=mysqli_query($conn, $sql);
            $sno=0;
            while($row = mysqli_fetch_assoc($result)){
              $sno = $sno+1;
              echo "            <tr>
              <th scope='row'>".$sno."</th>
              <td>".$row['title']."</td>
              <td>".$row['description']."</td>
              <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button></td>
            </tr>";
            }

           
            
        ?>
      </tbody>
    </table>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script>
    let table = new DataTable('#myTable');

  </script>

  <script>
    edits = document.getElementsByClassName('edit');
    console.log(Array.from(edits))
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", () => {
        console.log("edit", element)
        tr = element.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[0].innerText;
        description = tr.getElementsByTagName('td')[1].innerText;
        snoEdit.value = element.id
        console.log(snoEdit.value)
        descriptionedit.value = description;
        titleedit.value = title;
        console.log(title, " ", description)
        var myModal = new bootstrap.Modal(document.getElementById('editmodal'), {
          keyboard: false
        })
        myModal.toggle()
      })
    })
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", () => {
        console.log(element.id)
        sno = element.id.slice(1); // Use slice(1) to remove the first character
        console.log(sno);
        tr = element.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[0].innerText;
        description = tr.getElementsByTagName('td')[1].innerText;
        if (confirm("Press a button")) {
          window.location = `/myproj/crud/index.php?delete=${sno}`;
        }
      });
    });

  </script>
</body>

</html>