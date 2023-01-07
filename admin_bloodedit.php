<?php 

include "bloodconfig.php";

$sql = "SELECT * FROM blood_form";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Enquiry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
  


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bloodbank-UI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin_page.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_edit.php">Permissions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_bloodedit.php">Blood-Updates</a>
        </li>

      </ul>
      
    </div>
  </div>
</nav>
<br>
    <div class="container">

        <h2 align="center">DETAILS</h2>    
        <br>
    <table class="table">
    <thead>
        <tr>
        <th>Name</th>
        <th>blood_type</th>
        <th>phone</th>
        <th>address</th>
    </tr>
    </thead>
    <tbody> 
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['blood_type']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><a class="btn btn-info" href="bloodredit.php?id=<?php echo $row['id']; ?>">EDIT</a>&nbsp;<a class="btn btn-danger" href="deleteblood.php?id=<?php echo $row['id']; ?>">DELETE</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>
<a  class ="btn btn-primary" href="admin_page.php" role="button">BACK</a>

    </div> 


    
</body>

</html>

