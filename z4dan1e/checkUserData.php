<?php

$conn = new mysqli('localhost', 'root','','user_data');

$name = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];

$sql = "SELECT file, filename FROM data WHERE fname = ? AND lname = ? AND email = ?;";
$query = $conn->prepare($sql);
$query->bind_param('sss', $name, $lname, $email);
$query->execute();
$result = $query -> get_result();


while ($row = $result -> fetch_assoc()){
    $json['file'][] = $row['file'];
    $json['filename'][] = $row['filename'];
}
$conn -> close();
echo json_encode($json);

?>
