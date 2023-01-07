<?php
$servername ="localhost";
$username="root";
$password = "";
$database ="user_db";
$conn = new mysqli($servername,$username,$password,$database);



$id = "";
$name = "";
$user_type = "";
$email = "";
$password ="";

$errorMessage ="";
$successMessage="";

if($_SERVER["REQUEST_METHOD"]=="GET"){

    if(!isset($_GET["id"])){
        header("location:admin_edit.php");
        exit;
    }
        $id = $_GET["id"];

        $sql = "SELECT * FROM user_form WHERE id= $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        if(!$row){
            header("location:admin_edit.php");
            exit;
        }
        $name = $row["name"];
        $user_type = $row["user_type"];
        $email = $row["email"];
        $password =$row["password"];
}else{
        $id = $_POST["id"];   
        $name = $_POST["name"];
        $user_type = $_POST["user_type"];
        $email = $_POST["email"];
        $password =$_POST["password"];

        do{
            if(empty($id) || empty($name) || empty($email) || empty($password)){
                $errorMessage = "All fields are required";
                break;
            }

            $sql = "UPDATE user_form" ." SET name = '$name', email = '$email', password= '$password', user_type = '$user_type' " . "WHERE id = $id";
            $result = $conn->query($sql);
           
            if(!$result){
                $errorMessage = "Invalid Query".$conn->error;
            }
            $successMessage = "Client updated correctly";
            header("location:admin_edit.php");
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
    <label class= "col-sm-3 col-form-label">user_type</label>
    <div class= "col-sm-6">
        <input type = "text" class= "form-control" name ="user_type" value="<?php echo $user_type ?>">
    </div>
    </div>
    
    
    
    <div class = "row mb-3">

    <label class= "col-sm-3 col-form-label">Email</label>
    <div class= "col-sm-6">
        <input type = "text" class= "form-control" name ="email" value="<?php echo $email ?>">
    </div>
    </div>

    

    <div class = "row mb-3">
    <label class= "col-sm-3 col-form-label">password</label>
    <div class= "col-sm-6">
        <input type = "text" class= "form-control" name ="password" value="<?php echo $password ?>">
    </div>
    </div>
    
    <p> Please do convert your password to md5 and put it here! </p>
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
        <a class="btn btn-outline-primary" href="admin_edit.php" role="button">Cancel</a>
    </div>
    </div>









</form>
    </div>

</body>
</html>