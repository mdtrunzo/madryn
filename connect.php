<?php
$fname = $_POST["name"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];

$conn = new mysqli('localhost:8889', 'root', '', 'madryn');

$sql = "INSERT INTO users(fname,lname,email) 
        VALUES('$fname', '$lastName', '$email')";

if($conn -> query($sql) === TRUE) {
  echo 'Data inserted';
}
else {
  echo "Error:".$sql."<br>".$conn->error;
}

?>