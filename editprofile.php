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
  }
  $user = $db->getAUser($id);
  if($user){
    ?>
   <h2><?php echo $user['name']; ?>, change what you want</h2>
   <form action="" class="edit">
    <div class="edit-image">
      <input type="file" id="image" name="image"/>
      <?php if($user['profilePic']){ ?>
        <label for="image"><img src="<?php echo $user['profilePic']; ?>" alt=""><i class="fa-regular fa-pen-to-square icon"></i></label>
      <?php }else{ ?>
        <label for="image"><img src="./images/no_avatar.png" alt=""><i class="fa-regular fa-pen-to-square icon"></i></label>
      <?php } ?>
      
    </div>
    <label>Name</label><input type="text" value="<?php echo $user['name'];?>" name="name">
    <label>Description</label><textarea name="description"  value="<?php echo $user['description']; ?>" ></textarea>
    <label>Facebook</label><input type="text"  value="<?php echo $user['facebook']; ?>" name="facebook">
    <label>Linked In</label><input type="text"  value="<?php echo $user['linkedin']; ?>" name="linkedin">
    <label>Instagram</label><input type="text"  value="<?php echo $user['instagram']; ?>" name="instagram">
    <button>Update</button>
   </form>
   <?php } ?>
   </div>
   <?php include('./components/LatestPosts.php') ?>
  </div>
<?php include('./components/Footer.php') ?>