<?php
    $servername ="localhost";
    $username="root";
    $password = "";
    $database ="user_db";
    $conn = new mysqli($servername,$username,$password,$database);


    $name="";
    $email="";
    $password="";
    $user_type="";
    $errorMessage ="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $user_type=$_POST["user_type"];

        do{
            if(empty($name) || empty($email) || empty($password)){
                $errorMessage = "All fields are required";
                break;
            }

            $sql = "INSERT INTO user_form (name,email,password,user_type) value(\"$name\",\"$email\",\"$password\",\"$user_type\");";
            $result = $conn->query($sql);
            if(!$result){
                $errorMessage = "Invalid Query" .$conn->error;
                break;
            }
            $name="";
            $email="";
            $password="";
            $errorMessage ="";
            $user_type ="";
            $successMessage="Member added correctly";
            header("location: admin_edit.php");
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
    <title>Core</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></script>

</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
    <div class="container my=5"> 
    <h2>UPDATE </h2>


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