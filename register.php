<!DOCTYPE html>
<html lang="en">
<?php include('queries.php'); 
$db = new Database();
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>Document</title>
</head>
<body>
  <div class="register">
   
    <form action="" class="register-form" method="POST">
    <?php 
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['register'])){
      $name=$db->connection->real_escape_string($_POST['name']);
      $email=$db->connection->real_escape_string($_POST['email']);
      $password=$db->connection->real_escape_string($_POST['password']);
      if($name=="" or $email=="" or $password==""){
        echo "<span class='failure'>No field should be empty!</span>";
      
      }else{
        $password=password_hash($password,PASSWORD_BCRYPT);
        $query="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
        $res = $db->insertUser($query);
        echo $res;
      }
    }
    ?>
      <input type="text" placeholder="Name" name="name" />
      <input type="email" placeholder="Email" name="email" />
      <input type="password" placeholder="Password" name="password" />
      <button name="register">Register</button>
      <a href="login.php">Already have an account?</a>
    </form>
  </div>
</body>
</html>