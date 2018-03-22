<?PHP
/*$host = 'localhost';
$user = '';
$password='';
$db = 'basketball'; */
$conn = new PDO("mysql:host=courses;dbname=z1802435","z1802435","1994Jul22");
try
{
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  echo 'ERROR: ' . $e->getMessage();
}
?>

