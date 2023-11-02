<?php include("./components/Header.php") ?>
<?php 
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $post=$db->getAPost($id);
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['post_comment'])){
  $comment=$db->connection->real_escape_string($_POST['comment']);
  $userId = $session::get('id');
  $name = $session::get('name');
  $profilePic = $session::get('profilePic');
  $db->addComment($id,$userId,$name,$profilePic,$comment);
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['post_reply'])){
  $reply=$db->connection->real_escape_string($_POST['reply']);
  $userId = $session::get('id');
  $name = $session::get('name');
  $profilePic = $session::get('profilePic');
  $commentId=$_POST['commentId'];
  $db->addReply($commentId,$userId,$name,$profilePic,$reply);
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
    <div class="post-comments">
     <?php if($session::chechLoggedIn()) { ?>
    <h1>Comments</h1>
    <form action="" class="comment" method="POST">
      <input type="text" name="comment" placeholder="Write a comment">
      <button name="post_comment">Add</button>
    </form>
    <div class="comments">
      <?php 
      $comments = $db->getComments($id);
      if($comments){
        while($comment=$comments->fetch_assoc()){
      ?>
      <div class="single-comment">
      <div class="user-info">
        <?php if($comment['profilePic']){ ?>
          <a href="profile.php?id=<?php echo $comment['userId']; ?>" class="avatar"><img src="<?php echo $comment['profilePic']; ?>" alt=""></a>
          <?php }else{ ?>
            <a href="profile.php?id=<?php echo $comment['userId']; ?>" class="avatar"><img src="./images/no_avatar.png" alt=""></a>
          <?php } ?>
        <a href="profile.php?id=<?php echo $comment['userId']; ?>" class="name"><?php echo $comment['name']; ?></a>
      </div>
      <span class="comment"><?php echo $comment['comment']; ?></span>
      <span class="reply" data="closed">Reply</span>
      <form action="" class="reply" method="POST">
      <input type="text" name="reply" placeholder="Write a reply">
      <input type="hidden" name="commentId" value="<?php echo $comment['id']; ?>">
      <button name="post_reply">Reply</button>
    </form>
    <div class="replies">
      <?php
      $comment_id = $comment['id'];
      $replies = $db->getReplies($comment_id);
      if($replies){
        while($reply=$replies->fetch_assoc()){
      ?>
      <?php if($reply['commentId']==$comment['id']){ ?>
      <div class="single-reply">
        <span class="bullet"></span>
        <div class="reply-body">
        <div class="user-info-reply">
          <?php if($reply['profilePic']){ ?>
            <a href="" class="avatar"><img src="<?php echo $reply['profilePic']; ?>" alt=""></a>
          <?php }else{ ?>
            <a href="" class="avatar"><img src="./images/no_avatar.png" alt=""></a>
          <?php } ?>
          <a href="" class="name"><?php echo $reply['name']; ?></a>
        </div>
        <span class="thereply"><?php echo $reply['reply']; ?></span>
        </div>
      </div>
      <?php } ?>
      <?php }} ?>
    </div>
      </div>
      <?php }}else{ ?>
        <h3>No posts yet</h3>
      <?php } ?>
    </div>
    <?php }else{ ?>
      <h2>Login to comment</h2>
    <?php } ?>
   </div>
   </div>
    <?php include('./components/LatestPosts.php') ?>
  </div>
  <?php include('./components/Footer.php') ?>