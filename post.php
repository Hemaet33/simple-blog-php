<?php include("./components/Header.php") ?>
<?php 
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $post=$db->getAPost($id);
}
?>
  <div class="main">
   <div class="single-post">
    <div class="post">
      <?php if($post){ 
        if($post['image']){
      ?>
      <img src="<?php echo $post['image']; ?>" alt="">
      <?php }else{ ?>
      <img src="./images/post_place.png" alt="">
      <?php } ?>
      <div class="post-body">
        <h2><?php echo $post['title']; ?></h2>
        <p><?php echo $post['description']; ?></p>
      </div>
      <?php } ?>
    </div>
   </div>
    <?php include('./components/LatestPosts.php') ?>
  </div>
  <?php include('./components/Footer.php') ?>