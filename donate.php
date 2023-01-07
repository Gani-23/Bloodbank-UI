<?php
    $servername ="localhost";
    $username="root";
    $password = "";
    $database ="blood_db";
    $conn = new mysqli($servername,$username,$password,$database);


    $name="";
    $blood_type="";
    $phone="";
    $address="";
    $errorMessage ="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $name=$_POST["name"];
        $blood_type=$_POST['blood_type'];;
        $phone=$_POST["phone"];

        $address=$_POST["address"];
        $errorMessage ="";
        $successMessage="";

        do{
            if(empty($name) || empty($blood_type) || empty($phone) || empty($address)){
                $errorMessage = "All fields are required";
                break;
            }

            $sql = "INSERT INTO blood_form (name,phone,blood_type,address) value(\"$name\",\"$phone\",\"$blood_type\",\"$address\");";
            $result = $conn->query($sql);
            if(!$result){
                $errorMessage = "Invalid Query" .$conn->error;
                break;
            }
            $name="";
            $blood_type="";
            $phone="";
            $address="";
            $errorMessage ="";
            $successMessage="Donor details added sucessfully";
            header("location:enquiry.php");
            exit;

        }while(false);
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <style>
body {
  background-image: url('https://wallpapercave.com/wp/wp11825072.jpg');
  background-repeat: no-repeat;
}
</style>
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
    <div class="container my=5"> 
      <br>
    <h2 align = "center">DONOR DETAILS </h2>

<br>
<br>
    <?php
    if(!empty($errorMessage)){
        echo"
        <div class = 'alert alert-warning alert-dismissible' role='alert'>
        <strong>$errorMessage<strong>
        <button type ='button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label='Close'></button></div>";
    }?>

    <form method ="post">

    <div class = "row mb-3">

    <label class= "col-sm-3 col-form-label">Name</label>
    <div class= "col-sm-6">
        <input type = "text" class= "form-control" name ="name" value="<?php echo $name ?>">
    </div>
    </div>

    
    <div class = "row mb-3">
    <label class= "col-sm-3 col-form-label">Blood Type</label>
    <select class = "mb-6 col-sm-5"name="blood_type">
         <option value="A +VE">A +VE</option>
         <option value="A -VE">A -VE</option>
         <option value="B +VE">B +VE</option>
         <option value="B -VE">B -VE</option>
         <option value="AB +VE">AB +VE</option>
         <option value="AB -VE">AB -VE</option>
         <option value="O +VE">O +VE</option>
         <option value="O -VE">O -VE</option>
      </select>
   </div>


   
    
    
    
    <div class = "row mb-3">

    <label class= "col-sm-3 col-form-label">Phone</label>
    <div class= "col-sm-6">
        <input type = "text" class= "form-control" name ="phone" value="<?php echo $phone ?>">
    </div>
    </div>



    <div class = "row mb-3">
    <label class= "col-sm-3 col-form-label">Address</label>
    <div class= "col-sm-6">
        <input type = "text" class= "form-control" name ="address" value="<?php echo $address ?>">
    </div>
    </div>
    
    <?php
    if(!empty($successMessage)){
        echo"
        <div class = 'row mb-3'>
        <div class = 'offset-sm-3 col-sm-6'>
        <div class = 'alert alert-success alert-dismissible' role='alert'>
        <strong>$successMessage<strong>
        <button type ='button' class = 'btn-close' data-bs-dismiss ='alert' aria-label='Close'></button></div></div></div>";
    }

?>



    <div class = "row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type ="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class= "col-sm-3 d-grid">
        <a class="btn btn-outline-primary" href="user_page.php" role="button">Cancel</a>
    </div>
    </div>









</form>
    </div>

</body>
</html>



















