<meta charset="utf-8">
<?php

require_once("db_summary.php");
require_once("config.php");

   if($_POST){
     $id = $_POST["id"];
     $name = $_POST["name"];
     $tel = $_POST["tel"];
     $email = $_POST["email"];
     $content = $_POST["content"];
   }
   else{
     include("../jobpop/contact.php");
   exit;
   }

   try{
     $pdo = new summary($host,$dbname,$user,$pass);
     $pdo ->connectDB();

     if(isset($id)){
       if($_POST){
         $pdo->findUPD($_POST);
       }
      }
   }
   catch(PDOExeption $e){
     exit("データ失敗".$e->getMessage());
   }

    echo "情報を更新しました。";
?>
    <a href="index.php"><p>トップに戻る</p></a>
