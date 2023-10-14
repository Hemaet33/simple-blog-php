<?php include('./components/Header.php') ?>
<div class="main">
<div class="edit-profile">
   <h2>Hemayet, change what you want</h2>
   <form action="" class="edit">
    <label>Name</label><input type="text" name="name">
    <label>Description</label><textarea name="description"></textarea>
    <label>Facebook</label><input type="text" name="facebok">
    <label>Linked In</label><input type="text" name="linkedin">
    <label>Instagram</label><input type="text" name="instagram">
    <button>Update</button>
   </form>
   </div>
   <?php include('./components/LatestPosts.php') ?>
  </div>
<?php include('./components/Footer.php') ?>