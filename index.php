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
    <div class="categories">
      <h3>Categories</h3> 
      <ul>
        <?php 
        $categories = $db->getCategories();
        if($categories){
          while($cat=$categories->fetch_assoc()){ ?>
        <li><a href="index.php?category=<?php echo $cat['category']; ?>" class="cat"><?php echo ucfirst($cat['category']); ?></a></li>
        <?php }} ?>
      </ul>
    </div>
    <div class="posts">
      <?php if($session::chechLoggedIn()){ ?>
      
      <form class="create-post" action="" method="POST" enctype="multipart/form-data">
      <h1 class="loggedIn">Create post</h1>
      <?php
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['createPost'])){
          $userId=$session::get('id');
          $title = $db->connection->real_escape_string($_POST['title']);
          $description = $db->connection->real_escape_string($_POST['description']);
          $category = $db->connection->real_escape_string($_POST['category']);
          $category=strtolower($category);
          if($title=="" or $description=="" or $category==""){
            echo "<span class='failure'>No field should be empty!</span>";
          }else{

            if($_FILES['postImage']['name']){
            $permitted = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['postImage']['name'];
            $file_tmp = $_FILES['postImage']['tmp_name'];
            
            $file_parts = explode('.',$file_name);
            $file_ext = end($file_parts);
            $image_name = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = './images/'.$image_name;
            move_uploaded_file($file_tmp,$uploaded_image);
            $query = "INSERT INTO posts (title, description, userId,image,category) VALUES('$title','$description','$userId','$uploaded_image','$category')";
            $res = $db->createPost($query);
            if($res){
              echo $res;
            }
            }else{
              $query = "INSERT INTO posts (title, description, userId,category) VALUES('$title','$description','$userId','$category')";
              $res = $db->createPost($query);
              if($res){
                echo $res;
              }
            }
          }
        } 
      ?>
        <input type="text" class="title" placeholder="Title" name="title">
        <textarea name="description" class="description" placeholder="Description"></textarea>
        <div class="actions">
        <label title="Upload image" for="postImage"><i class="fa-regular fa-image" style="color: #fff;font-size:25px;"></i></label>
        <input type="file" name="postImage" id="postImage">
        <input type="text" class="category" name="category" placeholder="Category">
        <button name="createPost">Post</button>
        </div>
      </form>
      <?php }else{ ?>
        <div class="create-post">
        <h1 class="notLoggedIn">Login to be able to post</h1>
      </div>
     <?php } ?>
     <?php 
     if(isset($_GET['category'])){
      $cat = $_GET['category'];
      $query = "SELECT * FROM posts WHERE category='$cat' ORDER BY RAND()";
      $posts = $db->getPosts($query); ?>
      <h2 class="cat-header">'<?php echo ucfirst($cat); ?>' posts</h2>
     <?php }else{
      $query = "SELECT * FROM posts  ORDER BY RAND()";
      $posts = $db->getPosts($query);
     }
     if($posts){
      while($post = $posts->fetch_assoc()){ ?>
      <div class="post">
        <a href="post.php?id=<?php echo $post['id']; ?>"><?php
        if($post['image']){ ?>
        <img src="<?php echo $post['image']; ?>" alt="">
       <?php }else{ ?>
        <img src="./images/post_place.png" alt="">
      <?php } ?></a>
        <div class="post-body">
          <a href="post.php?id=<?php echo $post['id']; ?>"><h3 class="title"><?php echo $post['title']; ?></h3></a>
          <p class="description"><?php echo substr($post['description'],0,150).' ...'; ?></p>
        </div>
        <?php
        if($session::get('id')==$post['userId']){ ?>
          <div class="post-footer">
            <a href="?action=delete&id=<?php echo $post['id']; ?>" class="delete-post">Delete</a>
            <a href="editPost.php?id=<?php echo $post['id']; ?>" class="edit-post">Edit</a>
          </div>
       <?php } ?>
      </div>
      <?php }}else{ ?>
        <h1>No posts to show.</h1>
     <?php } ?>
    </div>
   </div>
    <?php include('./components/LatestPosts.php') ?>
  </div>
  <?php include('./components/Footer.php') ?>