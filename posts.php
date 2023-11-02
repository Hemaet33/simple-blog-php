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
      while($post = $posts->fetch_assoc()){ 
        $userId = $post['userId'];
        $q = "SELECT name FROM users WHERE id='$userId'";
        $author = $db->connection->query($q);
        if($author->num_rows>0){
        $author = $author->fetch_assoc();
        }  
      ?>
      <div class="post">
        <a href="post.php?id=<?php echo $post['id']; ?>"><?php
        if($post['image']){ ?>
        <img src="<?php echo $post['image']; ?>" alt="">
       <?php }else{ ?>
        <img src="./images/post_place.png" alt="">
      <?php } ?></a>
        <div class="post-body">
          <a href="post.php?id=<?php echo $post['id']; ?>"><h3 class="title"><?php echo $post['title']; ?></h3></a>
          <a href="profile.php?id=<?php echo $post['userId']; ?>" class="author"><?php echo $author['name']; ?></a>
          <p class="description"><?php echo substr($post['description'],0,150).' ...'; ?></p>
        </div>
        
      </div>
      <?php }}else{ ?>
        <h1>No posts to show.</h1>
     <?php } ?>
    </div>
   </div>
  </div>
  <?php include('./components/Footer.php') ?>