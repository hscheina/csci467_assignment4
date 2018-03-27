<?php

$dbservername = "courses";
$dbusername = "z1802435";
$dbpassword = "1994Jul22";
$dbname = "z1802435";

$conn = new PDO("mysql:host=courses;dbname=z1802435","z1802435","1994Jul22");

$harisConn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

try
{
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  echo 'ERROR: ' . $e->getMessage();
}
?>

