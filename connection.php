<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$host ="localhost";
$servername = "root";
$username = "hotel_client";
$password = "fatima1234567";

try{
// Create connection
$conn = new PDO("mysql:host=$host; dbname=$username",$servername, $password);
}
catch(PDOException $e){
  die("imposible de se connecter à la base se sonnées $username:".$e->getMessage());
}

?>
</body>
</html>