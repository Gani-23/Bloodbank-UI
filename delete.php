<?php 
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $servername ="localhost";
    $username="root";
    $password = "";
    $database ="user_db";
    $conn = new mysqli($servername,$username,$password,$database);

    $sql = "DELETE FROM user_form where id=$id";
    $conn->query($sql);

}
header("location:admin_edit.php");
exit;


?>