<?php include("./components/Header.php") ?>

  <div class="main">
   <div class="home">
    <?php include('./components/Sidebar.php'); ?>
    <div class="addcats">
      <h1>Update category</h1>
      <?php 
      if(isset($res)){
        echo $res;
      }
      ?>
      <a href="categories.php" class="gocats">Categories</a>
      
      <?php
      if(isset($_GET['id'])){
        $id=$_GET['id'];
        $cat = $db->getCategory($id);
      }

  if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['update_cat'])){
    $category = $db->connection->real_escape_string($_POST['category']);
    $res = $db->updateCategory($id, $category);
    if($res){
      header('Location:categories.php');
    }
  }
  ?>
      <form action="" method="POST">
      <?php if($cat){ ?>
        <label for="category">Category name</label>
        <input type="text" name="category" id="category" value="<?php echo $cat['category']; ?>">
        <button name = "update_cat">Update</button>
        <?php } ?>
      </form>
    </div>
   </div>
  </div>
  <?php include('./components/Footer.php') ?>
 