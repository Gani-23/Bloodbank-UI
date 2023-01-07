<?php 
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $servername ="localhost";
    $username="root";
    $password = "";
    $database ="blood_db";
    $conn = new mysqli($servername,$username,$password,$database);

    $sql = "DELETE FROM blood_form where id=$id";
    $conn->query($sql);

}
header("location:enquiry.php");
exit;


?>