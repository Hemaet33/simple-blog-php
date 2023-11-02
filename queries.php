<?php 
class Database{
  private $server = "localhost";
  private $user = "root";
  private $password = "";
  private $db = "simple-blog";

  public $connection;

  public function __construct(){
    $this->connect();
  }

  public function connect(){
    $this->connection = new mysqli($this->server, $this->user, $this->password, $this->db);
    if(!$this->connection){
       die($this->connection->connect_error.__LINE__);
    }
  }

  public function select($query){
    $data = $this->connection->query($query) or die($this->connect->connect_error.__LINE__);
    if($data->num_rows > 0){
      return $data->fetch_assoc();
    }else{
      return false;
    }
  }

  public function insertUser($query){
    $data = $this->connection->query($query);
    if($data){
      return "<span class='success'>You created an account.</span>";
    }else{
      return false;
    }
  }
  public function loginUser($query){
    $data = $this->connection->query($query);
    if($data){
      return "<span class='success'>You created an account.</span>";
    }else{
      return false;
    }
  }

  public function getAUser($id){
    $query="SELECT * FROM users WHERE id='$id'";
    $data = $this->connection->query($query);
    if($data->num_rows > 0){
      return $data->fetch_assoc();
    }else{
      return false;
    }
  }

  public function getAPost($id){
    $query="SELECT * FROM posts WHERE id='$id'";
    $data = $this->connection->query($query);
    if($data->num_rows > 0){
      return $data->fetch_assoc();
    }else{
      return false;
    }
  }

  public function updateUser($name,$description,$facebook,$linkedin,$instagram,$id){
    $query="UPDATE users SET name='$name', description='$description', facebook='$facebook', linkedin='$linkedin', instagram='$instagram' WHERE id='$id'";
    $data = $this->connection->query($query);
    if($data){
      return "<span class='success'>You updated successfully.</span>";
    }else{
      return false;
    }
  }

  public function updatePost($title,$description,$category,$id){
    $query="UPDATE posts SET title='$title', description='$description',category='$category' WHERE id='$id'";
    $data = $this->connection->query($query);
    if($data){
      return "<span class='success'>You updated successfully.</span>";
    }else{
      return false;
    }
  }

  public function createPost($query){ 
    $data = $this->connection->query($query);
    if($data){
      return "<span class='success'>You added a post.</span>";
    }else{
      return false;
    }
  }
  public function getPosts($query){
    $data = $this->connection->query($query);
    if($data->num_rows>0){
      return $data;
    }else{
      return false;
    }
  }
  public function delete($query){
    $data = $this->connection->query($query);
    if($data){
      return true;
    }else{
      return false;
    }
  }
  public function getCategories(){
    $query = "SELECT DISTINCT category FROM posts";
    $data = $this->connection->query($query);
    if($data->num_rows>0){
      return $data;
    }else{
      return false;
    }
  }

  public function addComment($postId,$userId,$name,$profilePic,$comment){
    $query="INSERT INTO comments(postId, userId,name,profilePic,comment) VALUES('$postId','$userId','$name','$profilePic','$comment')";
    $data = $this->connection->query($query);
    if($data){
      return true;
    }else{
      return false;
    }
  }
  public function addReply($commentId,$userId,$name,$profilePic,$reply){
    $query="INSERT INTO replies(commentId, userId,name,profilePic,reply) VALUES('$commentId','$userId','$name','$profilePic','$reply')";
    $data = $this->connection->query($query);
    if($data){
      return true;
    }else{
      return false;
    }
  }
  public function getComments($postId){
    $query="SELECT * FROM comments WHERE postId='$postId'";
    $data = $this->connection->query($query);
    if($data->num_rows > 0){
      return $data;
    }else{
      return false;
    }
  }
  public function getReplies($commentId){
    $query="SELECT * FROM replies WHERE commentId='$commentId'";
    $data = $this->connection->query($query);
    if($data->num_rows > 0){
      return $data;
    }else{
      return false;
    }
  }
}
?>