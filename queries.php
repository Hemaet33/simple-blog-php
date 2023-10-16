<?php 
$server = "localhost";
$user = "root";
$password = "";

$conn = mysqli_connect($server, $user, $password);
if($conn) {
  echo "Connect successful";
} else {
  die(mysqli_connect_error());
}

?>