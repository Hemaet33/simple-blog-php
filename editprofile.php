<?php include('./components/Header.php') ?>
<?php
include('queries.php');
$db=new Database();
if(!$session::chechLoggedIn()){
  header('Location:login.php');
}
?>
<div class="main">
<div class="edit-profile">
  <?php if(isset($_GET['id'])){ 
    $id=$_GET['id'];
    $user = $db->getAUser($id);
  }
   if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
    $name=$db->connection->real_escape_string($_POST['name']);
    $description=$db->connection->real_escape_string($_POST['description']);
    $facebook=$db->connection->real_escape_string($_POST['facebook']);
    $linkedin=$db->connection->real_escape_string($_POST['linkedin']);
    $instagram=$db->connection->real_escape_string($_POST['instagram']);

    if($_FILES['image']['name']){
      $prev_pic=$session::get('profilePic');
      if(is_dir($prev_pic)){
        unlink($prev_pic);
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
      $query = "UPDATE users SET profilePic='$uploaded_image' WHERE id='$id'";
      $db->connection->query($query);
      $session::set('profilePic',$uploaded_image);
      }else{
        echo "<span class='failure'>File extention should be ".implode(',',$permitted)."</span>";
      }
    }

    $msg = $db->updateUser($name,$description,$facebook,$linkedin,$instagram,$id);
    $session::set('facebook',$facebook);
    $session::set('linkedin',$linkedin);
    $session::set('instagram',$instagram);
    echo $msg;
    $user = $db->getAUser($id);
   }

  if($user){
    ?>
   <h2><?php echo $user['name']; ?>, change what you want</h2>
   <form action="" class="edit" method="POST" enctype="multipart/form-data">



    <div class="edit-image">
      <input type="file" id="image" name="image"/>
      <?php if($user['profilePic']){ ?>
        <label for="image"><img src="<?php echo $user['profilePic']; ?>" alt=""><i class="fa-regular fa-pen-to-square icon"></i></label>
      <?php }else{ ?>
        <label for="image"><img src="./images/no_avatar.png" alt=""><i class="fa-regular fa-pen-to-square icon"></i></label>
      <?php } ?>
      
    </div>
    <label>Name</label><input type="text" value="<?php echo $user['name'];?>" name="name">
    <label>Description</label><textarea name="description"><?php echo $user['description']; ?></textarea>
    <label>Facebook</label><input type="text"  value="<?php echo $user['facebook']; ?>" name="facebook">
    <label>Linked In</label><input type="text"  value="<?php echo $user['linkedin']; ?>" name="linkedin">
    <label>Instagram</label><input type="text"  value="<?php echo $user['instagram']; ?>" name="instagram">
    <button name="update">Update</button>
   </form>
   <?php } ?>
   </div>
   <?php include('./components/LatestPosts.php') ?>
  </div>
<?php include('./components/Footer.php') ?>