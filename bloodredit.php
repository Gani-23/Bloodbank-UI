<?php
$servername ="localhost";
$username="root";
$password = "";
$database ="blood_db";
$conn = new mysqli($servername,$username,$password,$database);

$id = "";
$name = "";
$blood_type = "";
$phone = "";
$address ="";
$errorMessage ="";
$successMessage="";

if($_SERVER["REQUEST_METHOD"]=="GET"){

    if(!isset($_GET["id"])){
        header("location:bloodredit.php");
        exit;
    }
        $id = $_GET["id"];

        $sql = "SELECT * FROM blood_form WHERE id= $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        if(!$row){
            header("location:bloodredit.php");
            exit;
        }
        $name = $row["name"];
        $blood_type = $row["blood_type"];
        $phone = $row["phone"];
        $address =$row["address"];

    }else{
        $id = $_POST["id"];
        $name = $_POST["name"];
        $blood_type = $_POST["blood_type"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        
        do{
            if(empty($name) ||empty($blood_type) ||empty($phone) ||empty($address)){
                $errorMessage = " All fields are required";
                break;
            }
            $sql = "UPDATE blood_form" ." SET name = '$name', blood_type = '$blood_type', phone= '$phone', address = '$address' " . "WHERE id = $id";
            $result = $conn->query($sql);
            if(!$result){
                $errorMessage = "Invalid Query". $conn->error;
            }
            $successMessage="Details updated.";
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
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></script>

</head>
<body>
    <div class="container my=5"> 
    <h2>RE EDITING</h2>


    <?php
    if(!empty($errorMessage)){
        echo"
        <div class = 'alert alert-warning alert-dismissible' role='alert'>
        <strong>$errorMessage<strong>
        <button type ='button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label='Close'></button></div>";
    }?>

    <form method ="post">
    <input type = "hidden" name= "id" value="<?php echo $id ?>">
    <div class = "row mb-3">

    <label class= "col-sm-3 col-form-label">Name</label>
    <div class= "col-sm-6">
        <input type = "text" class= "form-control" name ="name" value="<?php echo $name ?>">
    </div>
    </div>

    
    <div class = "row mb-3">
    <label class= "col-sm-3 col-form-label">Blood Type</label>
    <div class= "col-sm-6">
        <input type = "text" class= "form-control" name ="blood_type" value="<?php echo $blood_type ?>">
    </div>
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
        <a class="btn btn-outline-primary" href="admin_bloodedit.php" role="button">Cancel</a>
    </div>
    </div>









</form>
    </div>

</body>
</html>