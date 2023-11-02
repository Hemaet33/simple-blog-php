<?php include("./components/Header.php") ?>
  <?php
  if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['add_cat'])){
    $category = $db->connection->real_escape_string($_POST['category']);
    $res = $db->addCategory($category);
  }
  ?>
  <div class="main">
   <div class="home">
    <?php include('./components/Sidebar.php'); ?>
    <div class="addcats">
      <h1>Add category</h1>
      <?php 
      if(isset($res)){
        echo $res;
      }
      ?>
      <a href="categories.php" class="gocats">Categories</a>
      <form action="" method="POST">
        <label for="category">Category name</label>
        <input type="text" name="category" id="category">
        <button name = "add_cat">Add</button>
      </form>
    </div>
   </div>
  </div>
  <?php include('./components/Footer.php') ?>
 