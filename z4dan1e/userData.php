<?php 
$conn = new mysqli('localhost', 'root','','user_data');

$name = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];


$filename = time() . basename($_FILES['file']['name']) ;
$file = basename($_FILES['file']['name']);

if (!(move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/'.$filename))) {
    echo 'эммм?';
}

$sql = 'INSERT INTO data(fname,lname,email, file, filename) VALUES(?,?,?,?,?)';
$query = $conn->prepare($sql);
$query->bind_param("sssss", $name, $lname,$email, $file, $filename);
$query->execute();
$conn->close();

?>
