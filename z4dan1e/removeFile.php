<?php

$conn = new mysqli('localhost', 'root','','user_data');

$sql = "SELECT COUNT(1) FROM data WHERE filename = ?;";

$file = $_GET['rm'];

$query = $conn->prepare($sql);
$query->bind_param('s', $file);
$query->execute();
$result = $query -> get_result();
$result = $result -> fetch_row();

if($result[0] == 1){
    $sql = "DELETE FROM data WHERE filename = ?;";
    $query = $conn->prepare($sql);
    $query->bind_param('s', $file);
    $query->execute();
    echo 1;
}else{
    echo 0;
}

if (file_exists('../uploads/'.$file)){
    unlink('../uploads/'.$file);
    echo 1;
}else{
    echo 0;
}

?>