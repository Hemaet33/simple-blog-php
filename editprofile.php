<?php include('./components/Header.php') ?>
<div class="main">
<div class="edit-profile">
   <h2>Hemayet, change what you want</h2>
   <form action="" class="edit">
    <div class="edit-image">
      <input type="file" id="image" name="image"/>
      <label for="image"><img src="./images/person1.jpg" alt=""><i class="fa-regular fa-pen-to-square icon"></i></label>
      
    </div>
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