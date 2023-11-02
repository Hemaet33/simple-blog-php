<?php include("./components/Header.php") ?>
<?php
if(isset($_GET['action'])=='delete' && isset($_GET['id'])){
  $id = $_GET['id'];
  $db->deleteCategory($id);
}
?>
  <div class="main">
   <div class="home">
   <?php include('./components/Sidebar.php'); ?>
    <div class="cats">
      <h1>Categories</h1>
      <a href="addCategory.php" class="add_cat">Add category</a>
      <table>
        <thead>
          <tr>
            <th width="30%">ID</th>
            <th width="70%">Category</th>
            <th width="30%">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $categories = $db->getCategories();
          if($categories){
            while($category=$categories->fetch_assoc()){
        ?>
          <tr>
            <td><?php echo $category['id'] ?></td>
            <td><?php echo $category['category'] ?></td>
            <td><a href="updateCategory.php?id=<?php echo $category['id']; ?>" class="edit">Edit</a><a href="?action=delete&id=<?php echo $category['id']; ?>" class="delete">Delete</a></td>
          </tr>
          <?php }} ?>
        </tbody>
      </table>
    </div>
   </div>
  </div>
  <?php include('./components/Footer.php') ?>
 