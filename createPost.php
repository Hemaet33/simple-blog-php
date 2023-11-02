<?php include("./components/Header.php") ?>
  <?php
  if(isset($_GET['action'])=='delete' && isset($_GET['id'])){
    $id = $_GET['id'];
    $q = "SELECT image from posts WHERE id='$id'";
    $image=$db->select($q);
    if($image){
      unlink($image['image']);
    }
    $query = "DELETE FROM posts WHERE id='$id'";
    $db->delete($query);
  }
  ?>
  <div class="main">
   <div class="home">
   <?php include('./components/Sidebar.php'); ?>
    <div class="posts">
    <?php include('./components/Post.php'); ?>
    </div>
   </div>
  </div>
  <?php include('./components/Footer.php') ?>