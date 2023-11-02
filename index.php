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
      <table class="post-table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $posts = $db->getAllPosts();
          if($posts){
            while($post=$posts->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $post['title']; ?></td>
            <td><?php echo $post['description']; ?></td>
            <td><img src="<?php echo $post['image']; ?>" alt="post image"></td>
            <td><?php echo $post['category']; ?></td>
            <td><a href="post.php?id=<?php echo $post['id']; ?>" class="view">View</a><a href="editPost.php?id=<?php echo $post['id']; ?>" class="edit">Edit</a><a href="?action=delete&id=<?php echo $post['id']; ?>" class="delete">Delete</a></td>
          </tr>
          <?php }} ?>
        </tbody>
      </table>
     <!-- <?php
        if($session::get('id')==$post['userId']){ ?>
          <div class="post-footer">
            <a href="?action=delete&id=<?php echo $post['id']; ?>" class="delete-post">Delete</a>
            <a href="editPost.php?id=<?php echo $post['id']; ?>" class="edit-post">Edit</a>
          </div>
       <?php } ?> -->
    </div>
   </div>
  </div>
  <?php include('./components/Footer.php') ?>