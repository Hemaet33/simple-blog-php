<!DOCTYPE html>
<html lang="en">
  <?php
  include('session.php');
  $session=new Session();
  $session::init();
  ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Simple Blog PHP</title>
</head>
<body>

<?php 
if(isset($_GET['action']) && $_GET['action']=='logout'){
  $session::destroy();
}
?>

<div class="header">
    <nav>
      <div class="left">
        <a href="index.php" class="logo">Blog</a>
      </div>
      <ul class="right">
      <?php if(!$session::chechLoggedIn()){ ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <?php }else{ ?>
        <li><a href="?action=logout">Logout</a></li>
        <?php } ?>
      </ul>

      <?php if($session::chechLoggedIn()){ ?>
      <span class="profile-avatar">
        <?php if($session::get('profilePic')){ ?>
        <img src="<?php echo $session::get('profilePic'); ?>" alt="profile-avatar">
        <?php }else{ ?>
          <img src="./images/no_avatar.png" alt="profile-avatar">
        <?php } ?>
        <span><?php echo $session::get('name'); ?></span>
      </span>
      <?php } ?>
    </nav>
  <!-- Profile -->
  <div id="profile" data="invisible">
        <span class="cancel">x</span>
        <?php if($session::get('profilePic')){ ?>
        <img src="<?php echo $session::get('profilePic'); ?>" alt="profile-avatar">
        <?php }else{ ?>
          <img src="./images/no_avatar.png" alt="profile-avatar">
        <?php } ?>
        <div class="profile-info">
          <span class="name"><?php echo $session::get('name'); ?></span>
          <p class="description"><?php echo $session::get('description'); ?></p>
          <div class="social">
          <a target="_blank" href="<?php echo $session::get('facebook'); ?>"><i class="fa-brands fa-facebook-f"></i></a>
          <a target="_blank" href="<?php echo $session::get('linkedin'); ?>"><i class="fa-brands fa-linkedin"></i></a>
          <a target="_blank" href="<?php echo $session::get('instagram'); ?>"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
        <a href="./editprofile.php?id=<?php echo $session::get('id'); ?>" class="edit-profile">Edit profile</a>
      </div>
  </div>