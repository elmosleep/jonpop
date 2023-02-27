<?php
  require_once("db_connect.php");

  class summary extends db{
    // 参照
    public function findALL(){
      $stmt = $this->connect->prepare($sql = "SELECT * FROM sample_contact");
      $stmt->execute();
      $result =$stmt->fetchAll();
      return $result;
    }

    public function findREG($al){
      $stmt = $this->connect->prepare("INSERT INTO sample_contact VALUES (:id, :name, :tel, :email, :content)");
      $params = array(
        ':id' => NULL,
        ':name' => $al['name'],
        ':tel' => $al['tel'],
        ':email' => $al['email'],
        ':content' => $al['content']
       );
      $stmt->execute($params);
    }

    public function findADD($id){

      $stmt = $this->connect->prepare('SELECT * FROM sample_contact WHERE id = :id');
      $params = array(':id' => $id);
      $stmt-> execute($params);
      $result =$stmt->fetch();
      return $result;
    }

    public function findUPD($arr){

      $stmt = $this->connect->prepare('UPDATE sample_contact SET name = :name, tel = :tel , email = :email , content = :content WHERE id = :id');
      $params = array(
        ':name' => $arr["name"],
        ':tel' => $arr["tel"],
        ':email' => $arr["email"],
        ':content' => $arr["content"],
        ':id' => $arr["id"]
      );
      $stmt-> execute($params);
    }

    public function findDEL($id = NULL){
      if(isset($id)){
        $stmt = $this->connect->prepare("DELETE FROM sample_contact WHERE id = :id");
        $params = array(':id' => $id);
        $stmt-> execute($params);
      }
    }

  }


 ?>
