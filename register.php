<?php
$username = $_POST['username'];
$password = $_POST['password']; 

//Database connection
$conn = new mysqli ('localhost','root','','user_db');
if ($conn->connect_error){
    die ('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(username, password)values(?,?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    header("Location: loginr.html");
    $stmt->close();
    $conn->close();
}
?>