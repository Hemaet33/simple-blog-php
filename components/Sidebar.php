<div class="sidebar">
      <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li class="choose" data="narrowed">Choose by category <i class="arrow fa-solid fa-angle-down"></i></li>
        <div class="cats">
        <?php 
        $categories = $db->getCategories();
        if($categories){
          while($cat=$categories->fetch_assoc()){ ?>
        <li><a href="posts.php?category=<?php echo $cat['category']; ?>" class="cat"><?php echo ucfirst($cat['category']); ?></a></li>
        <?php }} ?>
        </div>
        <li><a href="categories.php">Categories</a></li>
        <li class="latest"><a href="latestPosts.php">Latest posts</a></li>

        <li class="create"><a href="createPost.php">Create post</a></li>
        <li><a href="posts.php" class="post">Posts</a></li>
      </ul>
    </div>