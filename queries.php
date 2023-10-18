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
}
?>