<div class="createPost">
<?php if($session::chechLoggedIn()){ ?>
      
      <form class="create-post" action="" method="POST" enctype="multipart/form-data">
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
            // header('Location:posts.php');
          }
        } 
      ?>
        <input type="text" class="title" placeholder="Title" name="title">
        <textarea name="description" class="description" placeholder="Description"></textarea>
        <div class="actions">
        <label title="Upload image" for="postImage"><i class="fa-regular fa-image" style="color: #fff;font-size:25px;"></i></label>
        <input type="file" name="postImage" id="postImage">
        <select name="category" class="category">
        <?php
          $categories = $db->getCategories();
          if($categories){
            while($category=$categories->fetch_assoc()){
        ?>
          <option value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
          <?php }} ?>
        </select>
        <button name="createPost">Post</button>
        </div>
      </form>
      <?php }else{ ?>
        <div class="create-post">
        <h1 class="notLoggedIn">Login to be able to post</h1>
      </div>
     <?php } ?>
      </div>