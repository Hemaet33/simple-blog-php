<?php include('./components/Header.php') ?>
<?php
if(!$session::chechLoggedIn()){
  header('Location:login.php');
}
?>
<div class="main">
<div class="edit-profile">
  <?php if(isset($_GET['id'])){ 
    $id=$_GET['id'];
    $post = $db->getAPost($id);
  }
   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
    $title=$db->connection->real_escape_string($_POST['title']);
    $description=$db->connection->real_escape_string($_POST['description']);
    $category=$db->connection->real_escape_string($_POST['category']);
    $category=strtolower($category);
    
    if($_FILES['image']['name']){
      if($post['image']){
      if(is_dir($post['image'])){
        unlink($post['image']);
      }
    }
      $file_name = $_FILES['image']['name'];
      $file_tmp = $_FILES['image']['tmp_name'];

      $permitted = array('jpg','jpeg','png','gif');

      $file_parts = explode('.',$file_name);
      $file_ext = strtolower(end($file_parts));
      if(in_array($file_ext,$permitted)){
        
      $image_name=substr(md5(time()),0,10).'.'.$file_ext;

      $uploaded_image = './images/'.$image_name;

      move_uploaded_file($file_tmp,$uploaded_image);
      $query = "UPDATE posts SET image='$uploaded_image' WHERE id='$id'";
      $db->connection->query($query);
      }else{
        echo "<span class='failure'>File extention should be ".implode(',',$permitted)."</span>";
      }
    }

    $msg = $db->updatePost($title,$description,$category,$id);
    echo $msg;
    $post = $db->getAPost($id);
   }

  if($post){
    ?>
   <h2>Update Post</h2>
   <form action="" class="edit" method="POST" enctype="multipart/form-data">
    <div class="edit-image">
      <input type="file" id="image" name="image"/>
      <?php if($post['image']){ ?>
        <label for="image"><img src="<?php echo $post['image']; ?>" alt=""><i class="fa-regular fa-pen-to-square icon"></i></label>
      <?php }else{ ?>
        <label for="image"><img src="./images/post_place.png" alt=""><i class="fa-regular fa-pen-to-square icon"></i></label>
      <?php } ?>
      
    </div>
    <label>Title</label><input type="text" value="<?php echo $post['title'];?>" name="title">
    <label>Description</label><textarea name="description"><?php echo $post['description']; ?></textarea>
    <label>Category</label><input type="text" value="<?php echo $post['category'];?>" name="category">
    <button name="update">Update</button>
   </form>
   <?php } ?>
   </div>
   <?php include('./components/LatestPosts.php') ?>
  </div>
<?php include('./components/Footer.php') ?>