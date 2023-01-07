<?php 

include "bloodconfig.php";

$sql = "SELECT * FROM blood_form";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Enquiry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<style>
body {
  background-image: url('https://wallpapercave.com/wp/wp11825072.jpg');
  background-repeat: no-repeat;
}
</style>

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
          <a class="nav-link active" aria-current="page" href="user_page.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donate.php">Donate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="enquiry.php">Enquiry</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="importance.php">Importance</a>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Comaptability
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="agroups.php">A - Groups</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="bgroups.php">B - Groups</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="abgroups.php">AB - Groups</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="ogroups.php">O - Groups</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About us</a>
        </li>
      </ul>

    </div>
  </div>
</nav>
<br>
    <div class="container">

      <h2 align = "center">DETAILS</h2>    
        <br>
    <table class="table">
    <thead>
        <tr>
        <th>Name</th>
        <th>Blood Type</th>
        <th>Phone</th>
        <th>Address</th>
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
                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 


    
</body>

</html>

