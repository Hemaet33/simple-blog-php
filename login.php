<!DOCTYPE html>
<html lang="en">
  <?php 
  include('session.php');
  $session= new Session();
  include('queries.php');
  $db= new Database();
  ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>Document</title>
</head>
<body>
  <div class="login">
    <form action="" class="login-form" method="POST">
      <?php 
      if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['login'])){
        $email=$db->connection->real_escape_string($_POST['email']);
        $password=$db->connection->real_escape_string($_POST['password']);
         if($email=="" or $password==""){
          echo "<span class='failure'>No field should be empty!</span>";
         }else{
          $q = "SELECT * FROM users WHERE email='$email' LIMIT 1";
          $res=$db->select($q);
          $hashed=$res['password'];
          $check = password_verify($password, $hashed);
          if($res){
            if($check){
              $session::init();
              $session::set('loggedIn',true);
              $session::set('id',$res['id']);
              $session::set('name',$res['name']);
              $session::set('email',$res['email']);
              $session::set('description',$res['description']);
              $session::set('profilePic',$res['profilePic']);

              header('Location:index.php');
            }else{
              echo "<span class='failure'>Password did not match!</ span>";
            }
          }else{
            echo "<span class='failure'>User not found!</ span>";
          }
         }
      }
      ?>
      <input type="email" placeholder="Email" name="email" />
      <input type="password" placeholder="Password" name="password" />
      <button name="login">Login</button>
      <a href="register.php">Don't have an account?</a>
    </form>
  </div>
</body>
</html>