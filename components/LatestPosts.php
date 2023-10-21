<div class="latest-posts">
  <div class="posts">
      <h1>Latest Posts</h1>
    <?php 
    $query = "SELECT * FROM posts ORDER BY createdAt ASC LIMIT 5";
    $posts = $db->getPosts($query);
    if($posts){
      while($post = $posts->fetch_assoc()){
        $userId = $post['userId'];
        $q = "SELECT name FROM users WHERE id='$userId'";
        $author = $db->connection->query($q);
        if($author->num_rows>0){
        $author = $author->fetch_assoc();
        }
    ?>
    <div class="post">
      <div class="post-info">
        <a href="post.php?id=<?php echo $post['id']; ?>">
        <?php if($post['image']){ ?>
        <img src="<?php echo $post['image']; ?>" alt="">
        <?php }else{ ?>
        <img src="./images/post_place.png" alt="">
        <?php } ?>
      </a>
        <div class="post-title">
        <a href="post.php?id=<?php echo $post['id']; ?>" class="title"><?php echo $post['title']; ?></a>
        <a href="profile.php?id=<?php echo $post['userId']; ?>" class="author"><?php echo $author['name']; ?></a>
        </div>
      </div>
      <p class="body"><?php echo substr($post['description'],0,200); ?> ...</p>
    </div>
    <?php }} ?>
  </div>
</div>