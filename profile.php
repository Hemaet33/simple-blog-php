<?php include("./components/Header.php") ?>
<?php 
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $author=$db->getAUser($id);
}
?>
<div class="main">
  <div class="single-profile">
    <div class="profile">
        <div class="profile-body">
          <?php if($author){ 
            if($author['profilePic']) {
            ?>
            <img src="<?php echo $author['profilePic']; ?>" alt="">
            <?php }else{ ?>
              <img src="./images/no_avatar.png" alt="">
            <?php } ?>
              <h1><?php echo $author['name']; ?></h1>
        </div>
          <p><?php echo $author['description']; ?></p>
        <?php } ?>
        <div class="social">
          <a target="_blank" href="<?php echo $author['facebook']; ?>"><i class="fa-brands fa-facebook-f"></i></a>
          <a target="_blank" href="<?php echo $author['linkedin']; ?>"><i class="fa-brands fa-linkedin"></i></a>
          <a target="_blank" href="<?php echo $author['instagram']; ?>"><i class="fa-brands fa-instagram"></i></a>
          </div>
    </div>
  </div>
<?php include('./components/LatestPosts.php') ?>
</div>
<?php include('./components/Footer.php') ?>